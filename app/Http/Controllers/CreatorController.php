<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Creator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Creator::class);
        if ($request->role) {
            $creators = Creator::whereHas('roles', function ($query) use ($request){
                $query->where('film_roles.id', $request->role);
            })->get();
        } else {
            $creators = Creator::all();
        }

        return Inertia::render('CreatorsListView', [
            'creators' => $creators->map(function ($creator) {
                return [
                    'id' => $creator->id,
                    'name' => $creator->name,
                    'photo' => $creator->photo,
                    'country' => $creator->country->name,
                    'age' => $creator->age
                ];
            })->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Creator::class);
        return Inertia::render('CreatorAdd', [
            'countries' => Country::mapAll(new Country())
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
        $this->authorize('create', Creator::class);
        if ($creator = Creator::find($request->creator['id'])) {
            $creator->update($request->creator);
        } else {
            $params = $request->creator;
            unset($params['id']);
            $creator = Creator::create($params);
        }
        return redirect()->route('creators.show', $creator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Creator $creator)
    {
        $this->authorize('view', $creator);
        return Inertia::render('CreatorShow', [
            'creator' => $creator->all,
            'countries' => Country::mapAll(new Country())
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Creator $creator)
    {
        $this->authorize('update', $creator);
        return Inertia::render('CreatorAdd', [
            'creator' => $creator->all,
            'countries' => Country::mapAll(new Country())
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creator $creator)
    {
        $this->authorize('delete', $creator);
        $creator->delete();
    }
}
