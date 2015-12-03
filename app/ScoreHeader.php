<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreHeader extends Model
{
    protected $fillable = ['subject_id','sub_subject_id','exam_date','no_of_items','remarks'];
}
