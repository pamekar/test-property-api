@extends('layouts.app')
@section('content')
    <div class="form-group">
        <label for="county">{{ __('app.county') }}</label>
        <input class="form-control" type="text" name="county" value="{{old('county',$property->county)}}" disabled
               id="county">
    </div>
    <div class="form-group">
        <label for="country">{{ __('app.country') }}</label>
        <input class="form-control" type="text" name="country" value="{{old('country',$property->country)}}"
               disabled id="country">
    </div>
    <div class="form-group">
        <label for="town">{{ __('app.town') }}</label>
        <input class="form-control" type="text" name="town" value="{{old('town',$property->town)}}" disabled
               id="town">
    </div>
    <div class="form-group">
        <label for="description">{{ __('app.description') }}</label>
        <input class="form-control" type="text" name="description"
               value="{{old('description',$property->description)}}" disabled id="description">
    </div>
    <div class="form-group">
        <label for="address">{{ __('app.address') }}</label>
        <input class="form-control" type="text" name="address" value="{{old('address',$property->address)}}"
               disabled id="address">
    </div>
    <div class="form-group">
        <label for="image">{{ __('app.image') }}</label>
        <div class="img-fluid">
            <img src="{{$property->image_full}}" alt="{{$property->country}}">
        </div>
    </div>
    <div class="form-group">
        <label for="image">{{ __('app.image_thumbnail') }}</label>
        <div class="img-fluid">
            <img src="{{$property->image_thumbnail}}" alt="{{$property->country}}">
        </div>
    </div>
    <div class="form-group">
        <label for="latitude">{{ __('app.latitude') }}</label>
        <input class="form-control" type="text" name="latitude" value="{{old('latitude',$property->latitude)}}"
               disabled id="latitude">
    </div>
    <div class="form-group">
        <label for="longitude">{{ __('app.longitude') }}</label>
        <input class="form-control" type="text" name="longitude" value="{{old('longitude',$property->longitude)}}"
               disabled id="longitude">
    </div>
    <div class="form-group">
        <label for="num_bedrooms">{{ __('app.num_bedrooms') }}</label>
        <input class="form-control" type="text" name="num_bedrooms"
               value="{{old('num_bedrooms',$property->num_bedrooms)}}" disabled id="num_bedrooms">
    </div>
    <div class="form-group">
        <label for="num_bathrooms">{{ __('app.num_bathrooms') }}</label>
        <input class="form-control" type="text" name="num_bathrooms"
               value="{{old('num_bathrooms',$property->num_bathrooms)}}" disabled id="num_bathrooms">
    </div>
    <div class="form-group">
        <label for="price">{{ __('app.price') }}</label>
        <input class="form-control" type="text" name="price" value="{{old('price',$property->price)}}" disabled
               id="price">
    </div>
    <div class="form-group">
        <label for="type">{{ __('app.type') }}</label>
        <input class="form-control" type="text" name="type" value="{{old('type',$property->type)}}" disabled
               id="type">
    </div>
    <div class="form-group">
        <label for="property_type_title">{{ __('app.property_type_title') }}</label>
        <input class="form-control" type="text" name="property_type[title]"
               value="{{old('property_type_title',$property->propertyType->title)}}" disabled
               id="property_type_title">
    </div>
    <div class="form-group">
        <label for="property_type_description">{{ __('app.property_type_description') }}</label>
        <textarea class="form-control" type="text" name="property_type[description]"
                  disabled>{{old('property_type_description',$property->propertyType->description)}}</textarea>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
@endsection
