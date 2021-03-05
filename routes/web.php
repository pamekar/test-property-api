<?php

use App\Http\Controllers\PropertiesController;
use App\Models\Property;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $properties = Property::query()->paginate(15);

    return view('properties.index', compact('properties'));
});

Route::get('properties/search', [PropertiesController::class, 'search'])->name('properties.search');

Route::resource('properties', PropertiesController::class);
