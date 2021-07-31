<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $genres = Genre::all();
    $genresArray = array();

    foreach ($genres as $genre) {
      $genresArray[] = ['Name' => $genre->name];
    }

    return response(json_encode($genresArray, 200));
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
      'name' => 'required'
    ]);

    Genre::create($request->all());
    return response()->json(['message' => 'Genre created successfully'], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $genre = Genre::find($id);

    if (is_null($genre)) {
      return response()->json(['message' => 'Genre could not be found'], 404);
    }

    return response(json_encode(['Name' => $genre->name], 200));
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
    $genre = Genre::find($id);

    if (is_null($genre)) {
      return response()->json(['message' => 'Genre could not be found'], 404);
    }

    $request->validate([
      'name' => 'required'
    ]);

    $genre->update($request->all());
    return response()->json(['message' => 'Genre updated successfully'], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $genre = Genre::find($id);

    if (is_null($genre)) {
      return response()->json(['message' => 'Genre could not be found'], 404);
    }

    $genre->delete();
    return response()->json(['message' => 'Genre deleted successfully'], 200);
  }
}
