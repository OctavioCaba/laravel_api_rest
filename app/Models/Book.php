<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use HasFactory;

  protected $fillable = [
    'author_id',
    'title',
    'plot',
    'genre_id',
    'publication_year'
  ];

  public function author() {
    return $this->belongsTo('App\Models\Author');
  }

  public function genre() {
    return $this->belongsTo('App\Models\Genre');
  }
}
