<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Fiscal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

    protected $fillable = [
        'company_id',
        'id_actividad',
        'prioridad',
        'status',
        'date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function actividad()
    {
        return $this->belongsTo(Fiscal::class, 'id_actividad');
    }
}
