<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentReply extends Model
{
  protected $table = 'comment_replies';
  protected $fillable = ['comment_id','author','email','body'];

}
