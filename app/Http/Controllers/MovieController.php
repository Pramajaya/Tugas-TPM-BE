<?php

namespace App\Http\Controllers;

use App\Models\movie;
use App\Models\Category;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function first(){
        $movies = movie::all();
        return view('welcome', compact('movies'));
    }

    public function create(){
        $categories = Category::all();
        return view('createMovieArchive', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:1',
            'publisher' => 'required|min:1',
            'director'=> 'required|min:1',
            'publicationDate'=> 'required|date',
            'length' => 'required|min:1',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $fileName = $request->title . '-' . $request->director . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('/public/image', $fileName);
        movie::create([
            'title' => $request->title,
            'publisher' => $request->publisher,
            'director'=> $request->director,
            'publicationDate'=> $request->publicationDate,
            'length' => $request->length,
            'image' => $fileName,
            'category_id' => $request->category_name
        ]);

        return redirect(route ('first'));
    }

    public function edit($id){
        $movies = movie::findOrFail($id);
        return view('editMovieArchive', compact('movies'));
    }

    public function update(Request $request, $id){
        $movies = movie::findOrFail($id);
        $movies->update([
            'title' => $request->title,
            'publisher' => $request->publisher,
            'director'=> $request->director,
            'publicationDate'=> $request->publicationDate,
            'length' => $request->length
        ]);
        return redirect(route('first'));
    }

    public function delete($id){
        movie::destroy($id);
        return redirect(route('first'));
    }



}
