<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public $directory = "images/";

  protected $fillable = ['title','body','image','user_id'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function getImageAttribute($value)
  {
    return $this->directory.$value;
  }
}
