<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
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
     * @param SearchPropertiesRequest $request
     *
     * @return Application|Factory|View
     */
    public function search(SearchPropertiesRequest $request)
    {
        $query = Property::query();
        $term = $request->get('term');
        $field = $request->get('field');

        $properties = $query->search($term, $field)->paginate(15);
        $properties->withPath("/properties/search?field={$field}&term={$term}");

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
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Validator::validate(['id' => $id], [
            'id' => 'exists:properties'
        ]);
        $property = Property::query()->find($id);
        $property->delete();

        return redirect()->back()->with(['success' => "Property Deleted"]);
    }
}
