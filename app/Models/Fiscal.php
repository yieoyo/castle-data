<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiscal extends Model
{
    use HasFactory;

    protected $table = 'fiscals';

    protected $fillable = [
        'fiscal_id',
        'description',
    ];
}
