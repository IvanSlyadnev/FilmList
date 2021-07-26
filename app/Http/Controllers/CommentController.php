<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Film;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Film $film) {
        $film->comments()->attach([$request->user()->id =>
            ['name' => $request->comment['name'], 'id' => rand(0, 1000000)]
        ]);
    }

    public function destroy(Request $request, Film $film, $id) {
        $film->comments()->wherePivot('id', $id)->detach();
    }
}
