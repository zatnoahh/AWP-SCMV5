<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'studentNo', 'email'];
    
    public function subjects(){
        return $this->belongsToMany(Subject::class)
            ->withPivot('semester','timetable')
            ->withTimestamps();

    }
}
