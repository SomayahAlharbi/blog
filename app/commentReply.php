<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentReply extends Model
{
  protected $fillable = ['comment_id','author','email','body'];
  
}
