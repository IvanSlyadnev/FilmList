<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
        $this->authorize('create', Film::class);
        return Inertia::render('FilmAddEditView', [
            'genres' => Genre::mapAll(Genre::all()),
            'countries' => Country::mapAll(Country::all()),
            'creators'  => Creator::mapAll(Creator::all()),
            'film_roles' => FilmRole::mapAll(FilmRole::all()),
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
        $this->authorize('create', Film::class);
        $parametrs = collect($request->film)->only((new Film())->getFillable())->toArray();
        $parametrs['user_id'] = $request->user()->id;
        if ($film = Film::find($request->film['id'])) {
            $film->update($parametrs);
        } else {
            $film = Film::create($parametrs);
        }
        $film->creators()->detach();
        foreach ($request->film['creators'] as $creator) {
            foreach ($creator['roles'] as $role) {
                $film->creators()->attach([$creator['id']], ['film_role_id' => $role]);
            }
        }
        $film->genres()->sync($request->film['genres']);
        $film->countries()->sync($request->film['countries']);

        return response(['id' => $film->id]);
        //return redirect()->route('films.show', $film->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Film $film)
    {
        if ($request->user() && !$film->viewed()->where('user_id', $request->user()->id)->exists()) {
            $film->viewed()->sync($request->user()->id);
            $film->update(['views' => $film->views+1]);
        }

        return Inertia::render('FilmShowView', [
            'film' => $film->getAttributes(),
            'comments' => $film->comments->map(function ($comment) {
                return ['name'=>$comment->pivot->name, 'user'=>User::find($comment->pivot->user_id)->name];
            })->toArray(),
            'creators' => $film->roles->map(function ($role) use($film) {
                return ['name' => $role->name, 'creators' => $role->creators()->wherePivot('film_id', $film->id)->get()->map(function ($creator) {
                    return $creator->name;
                })->toArray()];
            })->toArray(),
            'mark' => $request->user()->marks()->where('film_id', 147)->first() ? $request->user()->marks()->where('film_id', $film->id)->first()->pivot->value : null,
            'genres' => Genre::mapAll($film->genres),
            'countries' => Genre::mapAll($film->countries),
            'can_edit' => $request->user() ? $request->user()->canEditFilm($film) : false
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
        return Inertia::render('FilmAddEditView', [
            'film' => $film->all,
            'genres' => Genre::mapAll(Genre::all()),
            'countries' => Country::mapAll(Country::all()),
            'creators'  => Creator::mapAll(Creator::all()),
            'film_roles' => FilmRole::mapAll(FilmRole::all()),
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
        $this->authorize('delete', $film);
        $film->delete();
        //return redirect()->route('films.index');
    }
}
