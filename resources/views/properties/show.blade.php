@extends('layouts.app')
@section('content')
    <form action="{{route('properties.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="county">county</label>
            <input class="form-control" type="text" name="county" value="{{old('county',$property->county)}}" disabled
                   id="county">
        </div>
        <div class="form-group">
            <label for="country">country</label>
            <input class="form-control" type="text" name="country" value="{{old('country',$property->country)}}"
                   disabled id="country">
        </div>
        <div class="form-group">
            <label for="town">town</label>
            <input class="form-control" type="text" name="town" value="{{old('town',$property->town)}}" disabled
                   id="town">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input class="form-control" type="text" name="description"
                   value="{{old('description',$property->description)}}" disabled id="description">
        </div>
        <div class="form-group">
            <label for="address">address</label>
            <input class="form-control" type="text" name="address" value="{{old('address',$property->address)}}"
                   disabled id="address">
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <div class="img-fluid">
                <img src="{{$property->image_full}}" alt="{{$property->country}}">
            </div>
        </div>
        <div class="form-group">
            <label for="latitude">latitude</label>
            <input class="form-control" type="text" name="latitude" value="{{old('latitude',$property->latitude)}}"
                   disabled id="latitude">
        </div>
        <div class="form-group">
            <label for="longitude">longitude</label>
            <input class="form-control" type="text" name="longitude" value="{{old('longitude',$property->longitude)}}"
                   disabled id="longitude">
        </div>
        <div class="form-group">
            <label for="num_bedrooms">num_bedrooms</label>
            <input class="form-control" type="text" name="num_bedrooms"
                   value="{{old('num_bedrooms',$property->num_bedrooms)}}" disabled id="num_bedrooms">
        </div>
        <div class="form-group">
            <label for="num_bathrooms">num_bathrooms</label>
            <input class="form-control" type="text" name="num_bathrooms"
                   value="{{old('num_bathrooms',$property->num_bathrooms)}}" disabled id="num_bathrooms">
        </div>
        <div class="form-group">
            <label for="price">price</label>
            <input class="form-control" type="text" name="price" value="{{old('price',$property->price)}}" disabled
                   id="price">
        </div>
        <div class="form-group">
            <label for="type">type</label>
            <input class="form-control" type="text" name="type" value="{{old('type',$property->type)}}" disabled
                   id="type">
        </div>
        <div class="form-group">
            <label for="property_type_title">property_type_title</label>
            <input class="form-control" type="text" name="property_type[title]"
                   value="{{old('property_type_title',$property->propertyType->title)}}" disabled
                   id="property_type_title">
        </div>
        <div class="form-group">
            <label for="property_type_description">property_type_description</label>
            <textarea class="form-control" type="text" name="property_type[description]"
                      disabled>{{old('property_type_description',$property->propertyType->description)}}</textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
