<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invit extends Model
{
    use HasFactory;
    protected $table="invit";
    protected $fillable=['invit','email'];
}
