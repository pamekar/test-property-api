<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Http\Requests\StorePropertiesRequest;
use App\Http\Requests\UpdatePropertiesRequest;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

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
        $property = new Property();
        return view('properties.form', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(StorePropertiesRequest $request)
    {
        // Find similar property, or create new one
        $propertyType = PropertyType::query()
            ->firstOrCreate(['title' => $request->get('property_type_title')],
                ['description' => $request->get('property_type_description')]);

        $property = new Property();
        $property->property_type_id = $propertyType->id;
        $property->county = $request->get('county');
        $property->country = $request->get('country');
        $property->town = $request->get('town');
        $property->description = $request->get('description');
        $property->address = $request->get('address');
        $property->latitude = $request->get('latitude');
        $property->longitude = $request->get('longitude');
        $property->num_bedrooms = $request->get('num_bedrooms');
        $property->num_bathrooms = $request->get('num_bathrooms');
        $property->price = $request->get('price');
        $property->type = $request->get('type');

        $property->save();

        // Store image file
        $property->addMedia($request->file('image'))->withResponsiveImages()->toMediaCollection('default_images');
        $media = $property->getMedia('default_images')[0];
        $property->image_full = $media->getUrl();
        $property->image_thumbnail = collect($media->getResponsiveImageUrls())->last();

        $property->save();

        return redirect()->route('properties.index')->with(['success' => "New Property created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $property = Property::query()->findOrFail($id);
        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $property = Property::query()->findOrFail($id)->with('propertyTypes');
        return view('properties.show', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
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
