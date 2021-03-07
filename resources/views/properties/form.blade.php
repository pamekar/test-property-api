@extends('layouts.app')
@section('content')
    @php($isEdit=request()->segment(3) === 'edit')
    <form action="{{$isEdit ? route('properties.update', ['property' => $property->id]) : route('properties.store')}}"
          method="post" enctype="multipart/form-data">
        @csrf
        @if($isEdit) @method('put') @endif
        <div class="form-group">
            <label for="county">{{ __('app.county') }}</label>
            <input class="form-control" type="text" name="county" value="{{old('county',$property->county)}}"
                   id="county">
        </div>
        <div class="form-group">
            <label for="country">{{ __('app.country') }}</label>
            <input class="form-control" type="text" name="country" value="{{old('country',$property->country)}}"
                   id="country">
        </div>
        <div class="form-group">
            <label for="town">{{ __('app.town') }}</label>
            <input class="form-control" type="text" name="town" value="{{old('town',$property->town)}}" id="town">
        </div>
        <div class="form-group">
            <label for="description">{{ __('app.description') }}</label>
            <textarea class="form-control" name="description"
                      id="description">{{old('description',$property->description)}}</textarea>
        </div>
        <div class="form-group">
            <label for="address">{{ __('app.address') }}</label>
            <input class="form-control" type="text" name="address" value="{{old('address',$property->address)}}"
                   id="address">
        </div>
        <div class="form-group">
            <label for="image">{{ __('app.image') }}</label>
            <input class="form-control" type="file" name="image" id="image">
            <div class="img-fluid">
                <img src="{{$property->image_full}}" alt="">
            </div>
        </div>
        <div class="form-group">
            <label for="latitude">{{ __('app.app.latitude') }}</label>
            <input class="form-control" type="text" name="latitude" value="{{old('latitude',$property->latitude)}}"
                   id="latitude">
        </div>
        <div class="form-group">
            <label for="longitude">{{ __('app.longitude') }}</label>
            <input class="form-control" type="text" name="longitude" value="{{old('longitude',$property->longitude)}}"
                   id="longitude">
        </div>
        <div class="form-group">
            <label for="num_bedrooms">{{ __('app.num_bedrooms') }}</label>
            <input class="form-control" type="text" name="num_bedrooms"
                   value="{{old('num_bedrooms',$property->num_bedrooms)}}" id="num_bedrooms">
        </div>
        <div class="form-group">
            <label for="num_bathrooms">{{ __('app.num_bathrooms') }}</label>
            <input class="form-control" type="text" name="num_bathrooms"
                   value="{{old('num_bathrooms',$property->num_bathrooms)}}" id="num_bathrooms">
        </div>
        <div class="form-group">
            <label for="price">{{ __('app.price') }}</label>
            <input class="form-control" type="text" name="price" value="{{old('price',$property->price)}}" id="price">
        </div>
        <div class="form-group">
            <label for="type">{{ __('app.type') }}</label>
            <input class="form-control" type="text" name="type" value="{{old('type',$property->type)}}" id="type">
        </div>
        <div class="form-group">
            <label for="property_type_title">{{ __('app.property_type_title') }}</label>
            <input class="form-control" type="text" name="property_type_title"
                   value="{{old('property_type_title',$property->propertyType->title ?? null)}}"
                   id="property_type_title">
        </div>
        <div class="form-group">
            <label for="property_type_description">{{ __('app.property_type_description') }}</label>
            <textarea class="form-control" type="text" id="property_type_description"
                      name="property_type_description">{{old('property_type_description',$property->propertyType->description ?? null)}}</textarea>
        </div>
        <div>
            @if($isEdit)
                <button type="submit" class="btn btn-outline-primary">Update</button>
            @else
                <button type="submit" class="btn btn-primary">Create</button>
            @endif
        </div>
    </form>
@endsection
