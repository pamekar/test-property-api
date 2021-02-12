<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $properties = Property::query()->paginate(15);

        return view('properties.index', compact('properties'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     *
     * @return Application|Factory|View
     */
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
            'field'  => 'required|in:address,num_bedrooms,price,property_type,type'
        ]);
        $query = Property::query();

        $search = $request->get('search');
        $field = $request->get('field');
        switch ($field) {
            case 'address':
                $query->where('address', 'like', "%{$search}%");
                break;
            case 'property_type':
                $propertyTypes = PropertyType::query()->where('title', 'like', "%{$search}%")
                    ->pluck('id')->toArray();
                $query->whereIn('id', $propertyTypes);
                break;
            case 'num_bedrooms':
            case 'price':
            case 'type':
                $query->where($field, $search);
                break;
        }

        $properties = $query->paginate(15);
        $properties->withPath("/properties/search?field={$field}&search={$search}");

        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        return redirect()->route('properties.index')->with();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        return view('properties.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
