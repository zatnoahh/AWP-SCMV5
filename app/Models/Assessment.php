<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = ['name','type','percentage','subject_id','remarks'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }


    public function student(){
        return $this->belongsTo(Student::class);
    }
}
