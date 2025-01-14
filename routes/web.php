<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\PropertiesTypesController;
use App\Http\Controllers\ManageLike_WishlistController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Route::get('{Property_id}/Property_Details', function () {
//     return view('components.property_details');
// })->name('prop_details');

// Display Property details based on its id
Route::get('{Property_id}/Property_Details', [PropertiesController::class, 'show'])->name('prop_details');


// Route for the welcome page
Route::get('/', [PropertiesController::class, 'filter'])->name('filtering');

Route::middleware(['check.auth'])->group(function () {
    Route::post('/properties',           [PropertiesController::class, 'store'                 ])->name('store_property');
    Route::post('/like/{property_id}',   [ManageLike_WishlistController::class, 'storeLike'    ])->name('Like_property');
    Route::post('/wish/{property_id}',   [ManageLike_WishlistController::class, 'storeWishlist'])->name('wish_property');
    Route::get ('/wishlist',             [ManageLike_WishlistController::class, 'GetWishlists' ])->name('wishlist');
    Route::get ('/Myproperties',         [PropertiesController::class,          'UserProperty' ])->name('UserProperties');
    Route::get ('/', function () {return view('components.home');});
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
