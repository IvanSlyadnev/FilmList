<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function setMark(Request $request, Film $film) {
        $film->marks()->sync([$request->user()->id => ['value' => $request->mark]]);

        return redirect()->route('films.show', $film);
    }
}
