<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;

class PropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::query()->paginate(15);
        $data['properties'] = $properties;

        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  SearchPropertiesRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(SearchPropertiesRequest $request)
    {
        $query = Property::query();
        $term = $request->get('term');
        $field = $request->get('field');

        $properties = $query->search($term, $field)->paginate(15);
        $properties->withPath("/properties/search?field={$field}&term={$term}");
        $data['properties'] = $properties;

        return response()->json($data);
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
        Validator::validate(['id' => $id], [
            'id' => 'exists:properties'
        ]);
        $property = Property::query()->find($id);
        $property->delete();

        return response()->noContent();
    }
}
