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
        return Inertia::render('CountryAdd');
    }

    public function store(Request $request)
    {
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
        return Inertia::render('CountryShowView', [
            'country' => collect($country)->only((new Country())->getFillable())->toArray()
        ]);
    }

    public function edit(Country $country)
    {
        return Inertia::render('CountryAddView', [
            'country' => collect($country)->only((new Country())->getFillable())->toArray()
        ]);
    }

    public function destroy(Country $country)
    {
        $country->delete();
    }
}
