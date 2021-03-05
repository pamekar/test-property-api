@extends('layouts.app')
@section('content')
    <form action="{{route('properties.search')}}" method="get" class="pb-4">
        <div class="form-group">
            <label for="fields">Fields</label>
            <select class="form-control" id="fields" name="field" required>
                <option disabled selected>Select Field</option>
                <option value="address" {{request('field')==='address'?'selected':null}}>Address</option>
                <option value="num_bedrooms"{{request('field')==='num_bedrooms'?'selected':null}}>Number of Bedrooms
                </option>
                <option value="price" {{request('field')==='price'?'selected':null}}>Price</option>
                <option value="property_type" {{request('field')==='property_type'?'selected':null}}>Property Type
                </option>
                <option value="type" {{request('field')==='type'?'selected':null}}>For Sale / For Rent</option>

            </select>
        </div>
        <div class="form-group">
            <label for="term">Term</label>
            <input class="form-control" id="term" name="term" value="{{request('term')}}" required>
        </div>
        <button type="submit" class="btn btn-outline-secondary">Term</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>County</th>
            <th>Country</th>
            <th>Town</th>
            <th>Description</th>
            <th>Address</th>
            <th>Image Full</th>
            <th>Image thumbnail</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Num Bedrooms</th>
            <th>Num Bathrooms</th>
            <th>Price</th>
            <th>Type</th>
            <th>Property Type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($properties as $property)
            <tr>
                <td>{{ $property->county }}</td>
                <td>{{ $property->country }}</td>
                <td>{{ $property->town }}</td>
                <td>{{ Str::limit($property->description,50) }}</td>
                <td>{{ $property->address }}</td>
                <td>{{ $property->image_full }}</td>
                <td>{{ $property->image_thumbnail }}</td>
                <td>{{ $property->latitude }}</td>
                <td>{{ $property->longitude }}</td>
                <td>{{ $property->num_bedrooms }}</td>
                <td>{{ $property->num_bathrooms }}</td>
                <td>{{ $property->price/100 }}</td>
                <td>{{ $property->type }}</td>
                <td>{{ $property->propertyType->title }}</td>
                <td>
                    <div class="btn-group">

                        <a class="btn btn-sm btn-outline-primary mx-1"
                           href="{{route('properties.show',['property'=>$property->id])}}">
                            <span class="iconify" data-icon="simple-line-icons:eye" data-inline="false"></span>
                        </a>
                        <a class="btn btn-sm btn-outline-secondary mx-1"
                           href="{{route('properties.edit',['property'=>$property->id])}}">
                            <span class="iconify" data-icon="simple-line-icons:note" data-inline="false"></span>
                        </a>
                        <form action="{{route('properties.destroy',['property'=>$property->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger mx-1">
                                <span class="iconify" data-icon="simple-line-icons:close" data-inline="false"></span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$properties->onEachSide(5)->links()}}
@endsection

