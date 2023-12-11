<?php

namespace App\Http\Controllers;
use App\Models\movie;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function first(){
        $movies = movie::all();
        return view('welcome', compact('movies'));
    }

    public function create(){
        return view('createMovieArchive');
    }

    public function store(Request $request){
        movie::create([
            'title' => $request->title, 
            'publisher' => $request->publisher, 
            'director'=> $request->director, 
            'publicationDate'=> $request->publicationDate, 
            'length' => $request->length
        ]);

        return redirect(route ('first'));
    }


}
