<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outpatient_clinics extends Model
{
    use HasFactory;
    protected $table='outpatient';
    protected $fillable=['patient','doctor','room'];
}
