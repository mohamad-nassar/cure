<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table='appointment';
    protected $fillable=['department','doctor','new_old','date','name','email','phone','message'];

    public function departments()
    {
        return $this->hasOne(Department::class,'id','department');
    }
    public function doctors()
    {
        return $this->hasOne(Doctor::class,'id','doctor');
    }
}
