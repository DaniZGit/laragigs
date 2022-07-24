<?php

use App\Models\listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use function Symfony\Component\String\b;
use App\Http\Controllers\ListingController;

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

// All listings
Route::get('/', [ListingController::class, 'index']);

// show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])
->middleware('auth');

// store Listing Data
Route::post('/listings', [ListingController::class, 'store'])
->middleware('auth');

//Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])
->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])
->middleware('auth');

// delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])
->middleware('auth');

// Manage listings
Route::get('listings/manage', [ListingController::class, 'manage'])
->middleware('auth');

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show registation form
Route::get('/register', [UserController::class, 'create'])
->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])
->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])
->name('login')
->middleware('guest');

// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

/*
// isto kot zgoraj sam ni tok clean
Route::get('/listings/{id}', function ($id) {
    $listing = Listing::find($id);

    if($listing){
        return view('listing', [
            'listing' => Listing::find($id)
        ]);
    } else {
        abort('404');
    }
    
});*/