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
    if ($value !=NULL)
    return $this->directory.$value;
    else
    return false;
  }

  public function comments(){
    return $this->hasMany('App\Comment')->latest();
  }
}
