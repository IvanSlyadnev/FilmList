<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Film $film) {
        $film->comments()->attach([$request->user()->id =>
            ['name' => $request->comment['name'], 'id' => $request->comment['id']]
        ]);

        return redirect()->route('film.show', $film);
    }

    public function destroy(Request $request, Film $film, $id) {
        $film->comments()->wherePivot('id', $id)->detach();
    }
}
