<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Company;
use App\Models\Fiscal;

class ScrapController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function index()
    {
        return view('scrape');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // Handle the file upload
    public function upload(Request $request)
    {
        $urla = 'https://www.argentina.gob.ar/justicia/registro-nacional-sociedades?cuit=';
        $urlb = 'https://www.cuitonline.com/detalle/';
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:txt',
        ]);

        // Handle the file upload
        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = 'data.txt';
            $file->move(public_path('uploads'), $fileName);

            // You can process the file content here if needed

            $filePath = public_path('uploads') . '/' . $fileName;
            $fileContent = '';
            if ($handle = fopen($filePath, 'r')) {
                $pattern = '/\[(\d{2}\/\d{4})\]\s+(\d+)\s+-\s+(.*)/';
                while (($line = fgets($handle)) !== false) {
                    $cuid = substr($line, 0, 11);
                    $url1 = $urla.$cuid;
                    $url2 = $urlb.$cuid.'/';
                    $dom1 = new \DOMDocument();
                    $html1 = file_get_contents($url1);
                    @ $dom1->loadHtml($html1);
                    $v = $dom1->getElementById('show-data');
                    $strongs = $v->getElementsByTagName('strong');
                    $razonsocial = '';
                    $direccion = '';
                    $provincia = '';
                    $localidad = '';
                    $date = '';
                    $priority = '';
                    $fiscal_id = '';
                    $description = '';
                    foreach($strongs as $strong){
                        if($strong->textContent == "Razón social"){
                            $razonsocial = $strong->nextSibling->nextSibling->textContent;
                        }
                        if($strong->textContent == "Domicilio"){
                            $direccion = $strong->nextSibling->nextSibling->textContent;
                        }
                        if($strong->textContent == "Provincia"){
                            $provincia = $strong->nextSibling->nextSibling->textContent;
                        }
                        if($strong->textContent == "Localidad"){
                            $localidad = $strong->nextSibling->nextSibling->textContent;
                        }
                    }
                 
                    $dom2 = new \DOMDocument();
                    $html2 = @file_get_contents($url2);
                    if ($html2 !== false) {
                        @$dom2->loadHtml($html2);
                        $uls = $dom2->getElementsByTagName('ul');
                        foreach($uls as $ul){
                            if($ul->getAttribute('class') == 'p_info'){
                                $li = $ul->lastChild->previousSibling->previousSibling->previousSibling->textContent;
                                $parts = preg_split('/#\d+/', $li, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);                                 // Define the regular expression pattern
                                array_shift($parts);

                                // Reset array indices
                                $parts = array_values($parts);

                                foreach($parts as $key => $part){
                                       
                                    // Perform the regular expression match
                                    if (preg_match($pattern, $part, $matches)) {
                                        // Extract the desired parts
                                        $priority =  $key +1 ;
                                        $date = $matches[1];
                                        $fiscal_id = $matches[2];
                                        $description = $matches[3];
                                    }
                                }
                                break;
                            }
                        }
                    }
                    // company
                    $company = Company::where('cuit', $cuid)->first();
                    if ($company){
                        $company->update([
                            'cuit' => $cuid,
                            'razon_social' => $razonsocial,
                            'direccion' => $direccion,
                            'provincia' => $provincia,
                            'localidad' => $localidad,
                        ]);
                        echo "Company Update:"."</br>";
                        echo "CUID: ".$cuid."</br>";
                        echo "Razon Social: ".$razonsocial."</br>";
                        echo "Direccion: ".$direccion."</br>";
                        echo "Provincia: ".$provincia."</br>";
                        echo "Localidad: ".$localidad."</br>";
                        
                    }else {
                        $company = Company::create([
                            'cuit' => $cuid,
                            'razon_social' => $razonsocial,
                            'direccion' => $direccion,
                            'provincia' => $provincia,
                            'localidad' => $localidad,
                        ]);
                        echo "Company Created:"."</br>";
                        echo "CUID: ".$cuid."</br>";
                        echo "Razon Social: ".$razonsocial."</br>";
                        echo "Direccion: ".$direccion."</br>";
                        echo "Provincia: ".$provincia."</br>";
                        echo "Localidad: ".$localidad."</br>";
                    }

                    // fiscal
                    $fiscal = Fiscal::where('fiscal_id', $fiscal_id)->first();
                    if ($fiscal){
                        $fiscal->update([
                            'fiscal_id' => $fiscal_id,
                            'description' => $description,
                        ]);
                        echo "Fiscal Update:"."</br>";
                        echo "ID_Actividad: ".$fiscal_id."</br>";
                        echo "Description: ".$description."</br>";
                    }else {
                        $fiscal = Fiscal::create([
                            'fiscal_id' => $fiscal_id,
                            'description' => $description,
                        ]);
                        echo "Fiscal Created:"."</br>";
                        echo "ID_Actividad: ".$fiscal_id."</br>";
                        echo "Description: ".$description."</br>";
                    }

                    // activity
                    if($company && $fiscal){
                        $activity = Activity::where('company_id', $company->id)->where('id_actividad', $fiscal->id)->first();
                        if($activity){
                            $activity->update([
                                'company_id' => $company->id,
                                'id_actividad' => $fiscal->id,
                                'prioridad' => $priority,
                                'date' => $date,
                            ]);
                            echo "Company Activity Update:"."</br>";
                            echo "Company ID: ".$company->id."</br>";
                            echo "ID_Actividad: ".$fiscal_id."</br>";
                            echo "Prioridad: ".$priority."</br>";
                            echo "Date: ".$date."</br>";
                        }else {
                            Activity::create([
                                'company_id' => $company->id,
                                'id_actividad' => $fiscal->id,
                                'prioridad' => $priority,
                                'date' => $date,
                            ]);
                            echo "Company Activity Created:"."</br>";
                            echo "Company ID: ".$company->id."</br>";
                            echo "ID_Actividad: ".$fiscal_id."</br>";
                            echo "Prioridad: ".$priority."</br>";
                            echo "Date: ".$date."</br>";
                        }

                        echo "------------------------</br>";

                    }

                    usleep( 1 * 1000 );
                }
                fclose($handle);
                dd('ok');
            } else {
                return redirect()->back()->withErrors(['file' => 'Error reading the file.']);
            }
        }

        return redirect()->back()->withErrors(['file' => 'File upload failed.']);
    }
}
