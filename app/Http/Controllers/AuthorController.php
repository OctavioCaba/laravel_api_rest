<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $authors = Author::all();
    $authorsArray = array();

    foreach ($authors as $author) {
      $authorsArray[] = [
        'Name' => $author->first_name . ' ' . $author->last_name,
        'Country' => $author->country,
        'Age' => date('Y') - (int)$author->date_of_birth
      ];
    }

    return response(json_encode($authorsArray, 200));
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
      'first_name' => 'required',
      'last_name' => 'required',
      'country' => 'required',
      'date_of_birth' => 'required'
    ]);

    Author::create($request->all());
    return response()->json(['message' => 'Author added successfully'], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $author = Author::find($id);

    if (is_null($author)) {
      return response()->json(['message' => 'Could not find author'], 404);
    }

    return response(json_encode([
      'Name' => $author->first_name . ' ' . $author->last_name,
      'Country' => $author->country,
      'Age' => date('Y') - (int)$author->date_of_birth
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
    $author = Author::find($id);

    if (is_null($author)) {
      return response()->json(['message' => 'Author could not be updated'], 404);
    }

    $request->validate([
      'first_name' => 'required',
      'last_name' => 'required',
      'country' => 'required',
      'date_of_birth' => 'required'
    ]);

    $author->update($request->all());
    return response()->json(['message' => 'Author updated successfully'], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $author = Author::find($id);

    if (is_null($author)) {
      return response()->json(['message' => 'Author could not be deleted'], 404);
    }

    $author->delete();
    return response()->json(['message' => 'Author deleted successfully'], 200);
  }
}
