<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreDetail extends Model
{
   protected $fillable = ['student_info_id','subject_id','sub_subject_id','score'];
}
