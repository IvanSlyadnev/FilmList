<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function setMark(Request $request, Film $film) {
        $film->marks()->syncWithoutDetaching([$request->user()->id => ['value' => $request->mark]]);
        $film->update(['rate'=> $film->count_rate]);
        logger()->info($film->count_rate);

        return response(['id' => $film->id]);
    }
}
