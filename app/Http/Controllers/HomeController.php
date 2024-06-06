<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Notifications\Action;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Activity::with(['company', 'actividad'])->get();
        return view('home', compact('data'));
    }

    public function statusupdate($activityid, Request $request){
        $activity = Activity::findOrFail($activityid);
        $status = $request->input('status');
        $activity->update(['status' => $status]);
        return redirect()->route('home');
    }
}
