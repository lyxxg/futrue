<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionTag extends Model
{
    public $timestamps = false;
    function question(){
        return $this->belongsTo(Question::class);
    }
function tag(){
        return $this->belongsTo(Tag::class);
}

}
