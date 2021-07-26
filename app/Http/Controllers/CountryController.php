<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CountryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Country::class);
        return Inertia::render('CountryListView', [
            'countries' => Country::all()->map(function ($country) {
                return [
                    'name' => $country->name,
                    'flag' => $country->flag
                ];
            })
        ]);
    }

    public function create()
    {
        $this->authorize('create', Country::class);
        return Inertia::render('CountryAdd');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Country::class);
        $params = collect($request->country)->only((new Country())->getFillable())->toArray();
        if ($country = Country::find($request->country['id'])) {
            $country->update($params);
        } else {
            $country = Country::create($params);
        }

        return response(['id' => $country->id]);
    }

    public function show(Country $country)
    {
        $this->authorize('view', $country);
        return Inertia::render('CountryShowView', [
            'country' => collect($country)->only((new Country())->getFillable())->toArray()
        ]);
    }

    public function edit(Country $country)
    {
        $this->authorize('update', $country);
        return Inertia::render('CountryAddView', [
            'country' => collect($country)->only((new Country())->getFillable())->toArray()
        ]);
    }

    public function destroy(Country $country)
    {
        $this->authorize('delete', $country);
        $country->delete();
    }
}
