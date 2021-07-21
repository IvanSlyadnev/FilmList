<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Film;
use App\Models\Country;
use App\Models\Creator;
use App\Models\FilmRole;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('FilmListView', [
            'films' => Film::all()->map(function ($film) {
                return [
                    'id' => $film['id'],
                    'name' => $film['name'],
                    'photo' => $film['photo'],
                    'rate' => $film['rate'],
                    'views' => $film['views']
                ];
            }),
            'roles' => $request->user() ? $request->user()->roles : ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('FilmCreateEdit', [
            'countries' => Country::pluck('id', 'name')->toArray(),
            'creators'  => Creator::pluck('id', 'name')->toArray(),
            'film_roles' => FilmRole::pluck('id', 'name')->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parametrs = collect($request->film)->only((new Film())->getFillable())->toArray();
        $parametrs['user_id'] = $request->user()->id;
        if ($film = Film::find($request->film['id'])) {
            $film->update($parametrs);
        } else {
            $film = Film::create($parametrs);
        }
        $creator_ids = [];
        foreach ($request->film['creators'] as $creator) {
            $creator_ids []= $creator['id'];
            $film_creator = Creator::find($creator['id']);
            $film_creator->roles()->syncWithPivotValues($creator['roles'], ['film_id' => $film->id]);
        }
        $film->creators()->sync($creator_ids);
        $film->genres()->sync($request->film['genres']);
        $film->countries()->sync($request->film['countries']);

        return redirect()->route('film.show', $film);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return Inertia::render('FilmShow', [
            'film' => $film->getAttributes()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        return Inertia::render('FilmCreateEdit', [
            'film' => $film->getAttributes(),
            'countries' => Country::pluck('id', 'name')->toArray(),
            'creators'  => Creator::pluck('id', 'name')->toArray(),
            'film_roles' => FilmRole::pluck('id', 'name')->toArray()
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();
    }
}
