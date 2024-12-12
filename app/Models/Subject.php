<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['code', 'name', 'creditHours','lecturer_id'];

    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class)
        ->withPivot('semester', 'timetable')
        ->withTimestamps();;

    }

    public function assessments(){
        return $this->hasMany(Assessment::class);
    }
}
