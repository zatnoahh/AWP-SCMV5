<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
        // Follow framework to make sure the model is working properly
        protected $fillable = ['name', 'staffNo', 'email','subject_id']; // important, column that can be filled by HTTP POST request.
        //protected $table = "pensyarah"; // Table name in database
        //protected $primaryKey = "staffNo"; // Primary key of the table
        //protected $keyType = "string"; // Primary key data type
    
        public function subjects(){
            return $this->hasMany(Subject::class);
            
        }
}
