<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  use HasFactory;

  protected $fillable = [
    'first_name',
    'last_name',
    'country',
    'date_of_birth'
  ];

  public function books() {
    return $this->hasMany('App\Models\Book');
  }
}
