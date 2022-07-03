<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table='department';
    protected $fillable=['icon','title','text','image'];

    public function department()
    {
        return $this->hasMany(Appointment::class);
    }
}
