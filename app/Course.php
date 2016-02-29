<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table="courses";
    protected $primaryKey="course_id";
    protected $fillable=['course_code','course_title','course_credit'];
}
