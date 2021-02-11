@extends('layouts.app')
@section('content')

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
            <th>Property Type
            <th>
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
                <td>{{ $property->price }}</td>
                <td>{{ $property->type }}</td>
                <td>{{ $property->type }}</td>
                <td>{{ $property->property_type->title }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$properties->onEachSide(5)->links()}}
@endsection
