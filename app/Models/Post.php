<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;
  protected $perPage = 5;
  public $timestamps = true;

  function getUserName()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}