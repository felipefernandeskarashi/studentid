<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   protected $fillable = array('name', 'rg', 'voter_id', 'phone', 'address', 'course', 'institution', 'semester', 'city', 'period', 'days', 'study_begin', 'study_ends', 'profession', 'enterprise', 'photo');

   protected $guarded = ['id'];

   protected $dates = ['study_begin', 'study_ends'];
}
