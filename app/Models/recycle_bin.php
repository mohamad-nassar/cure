<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recycle_bin extends Model
{
    use HasFactory;
    protected $table='recycle_bin';
    protected $fillable=['table_name','data'];
}
