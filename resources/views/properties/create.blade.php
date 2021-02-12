@extends('layouts.app')
@section('content')
    <form action="{{route('properties.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="county">county</label>
            <input class="form-control" type="text" name="county" id="county">
        </div>
        <div class="form-group">
            <label for="country">country</label>
            <input class="form-control" type="text" name="country" id="country">
        </div>
        <div class="form-group">
            <label for="town">town</label>
            <input class="form-control" type="text" name="town" id="town">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input class="form-control" type="text" name="description" id="description">
        </div>
        <div class="form-group">
            <label for="address">address</label>
            <input class="form-control" type="text" name="address" id="address">
        </div>
        <div class="form-group">
            <label for="image_full">image_full</label>
            <input class="form-control" type="text" name="image_full" id="image_full">
        </div>
        <div class="form-group">
            <label for="image_thumbnail">image_thumbnail</label>
            <input class="form-control" type="text" name="image_thumbnail" id="image_thumbnail">
        </div>
        <div class="form-group">
            <label for="latitude">latitude</label>
            <input class="form-control" type="text" name="latitude" id="latitude">
        </div>
        <div class="form-group">
            <label for="longitude">longitude</label>
            <input class="form-control" type="text" name="longitude" id="longitude">
        </div>
        <div class="form-group">
            <label for="num_bedrooms">num_bedrooms</label>
            <input class="form-control" type="text" name="num_bedrooms" id="num_bedrooms">
        </div>
        <div class="form-group">
            <label for="num_bathrooms">num_bathrooms</label>
            <input class="form-control" type="text" name="num_bathrooms" id="num_bathrooms">
        </div>
        <div class="form-group">
            <label for="price">price</label>
            <input class="form-control" type="text" name="price" id="price">
        </div>
        <div class="form-group">
            <label for="type">type</label>
            <input class="form-control" type="text" name="type" id="type">
        </div>
        <div class="form-group">
            <label for="property_type_title">property_type_title</label>
            <input class="form-control" type="text" name="property_type[title]" id="property_type_title">
        </div>
        <div class="form-group">
            <label for="property_type_description">property_type_description</label>
            <input class="form-control" type="text" name="property_type[description]" id="property_type_description">
        </div>
    </form>
@endsection
