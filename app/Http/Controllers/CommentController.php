<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Film $film) {
        $film->comments()->attach([$request->user()->id =>
            ['name' => $request->comment['name'], 'id' => rand(0, 1000000)]
        ]);
        return redirect()->route('films.show', $film);
    }

    public function destroy(Request $request, Film $film, $id) {
        $film->comments()->wherePivot('id', $id)->detach();
    }
}
