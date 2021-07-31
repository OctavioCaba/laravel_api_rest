<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class BookController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $books = Book::all();
    $booksArray = array();
    
    foreach ($books as $book) {
      $author = Author::find($book->author_id);
      $authorName = $author->first_name . ' ' .  $author->last_name;

      $genre = Genre::find($book->genre_id);
      $genreName;
      is_null($genre) ? $genreName = NULL : $genreName = $genre->name;

      $booksArray[] = [
        'Title' => $book->title,
        'Plot' => $book->plot,
        'Author' => $authorName,
        'AuthorURL' => 'http://127.0.0.1:8000/api/authors/' . $book->author_id,
        'Genre' => $genreName,
        'GenreURL' => 'http://127.0.0.1:8000/api/genres/' . $book->genre_id,
        'Year' => $book->publication_year
      ];
    }

    return response(json_encode($booksArray, 200));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'author_id' => 'required',
      'title' => 'required',
      'plot' => 'required',
      'genre_id' => 'required',
      'publication_year' => 'required'
    ]);

    Book::create($request->all());
    return response()->json(['message' => 'Book added successfully'], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $book = Book::find($id);

    if (is_null($book)) {
      return response()->json(['message' => 'Could not find the book'], 404);
    }

    $author = Author::find($book->author_id);
    $authorName = $author->first_name . ' ' .  $author->last_name;

    $genre = Genre::find($book->genre_id);
    $genreName;
    is_null($genre) ? $genreName = NULL : $genreName = $genre->name;

    return response(json_encode([
      'Title' => $book->title,
      'Plot' => $book->plot,
      'Author' => $authorName,
      'AuthorURL' => 'http://127.0.0.1:8000/api/authors/' . $book->author_id,
      'Genre' => $genreName,
      'GenreURL' => 'http://127.0.0.1:8000/api/genres/' . $book->genre_id,
      'Year' => $book->publication_year
    ], 200));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $book = Book::find($id);

    if (is_null($book)) {
      return response()->json(['message' => 'Could not update the book'], 404);
    }

    $request->validate([
      'author_id' => 'required',
      'title' => 'required',
      'plot' => 'required',
      'genre_id' => 'required',
      'publication_year' => 'required'
    ]);

    $book->update($request->all());
    return response()->json(['message' => 'Book updated successfully'], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $book = Book::find($id);

    if (is_null($book)) {
      return response()->json(['message' => 'Could not delete the book'], 404);
    }

    $book->delete();
    return response()->json(['message' => 'Book deleted successfully'], 200);
  }
}
