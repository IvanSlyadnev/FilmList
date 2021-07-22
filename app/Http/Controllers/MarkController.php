<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function setMark(Request $request, Film $film) {
        $request->merge(['mark' => 4]);

        $film->marks()->syncWithPivot([$request->user()->id], [$request->mark]);
    }
}
