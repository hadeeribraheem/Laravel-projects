<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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



/****************************************************************************************************************************/

route::get('/', function () {
    return view('welcome');
});
/****************************************************************************************************************************/

// This route matches both GET and POST requests to the '/contact' URL.
// It's useful when you want the same URL to handle both displaying a form (GET) and processing form submission (POST).
//Route::match(['get', 'post'], '/contact', function (){});

// This route matches any type of HTTP request (GET, POST, PUT, DELETE, etc.) to the root URL '/'.
// It's useful when you want a single endpoint to respond to multiple types of requests.
//But specify endpoint for each request is the best
//Route::any('/',function (){});

/****************************************************************************************************************************/
// Define a route that listens for GET requests to '/products/{id}'
// The {id} is an optional route parameter. If the parameter is not provided in the URL, $id will default to null.
/*Route::get('/products/{id?}', function ($id = null) {
    // This closure will receive the value of {id} as the $id variable.
    // If no {id} is provided in the URL, $id will be null.
    echo $id;
})
    // Use the 'where' method to add a constraint on the {id} parameter.
    // The regular expression '[0-9]+' ensures that the {id} must be composed only of numeric characters (0-9).
    // This means the route will only match URLs where {id} is a number, e.g., '/products/123'.
    ->where('id', '[0-9]+');*/

/****************************************************************************************************************************/
/*
// Prefix all routes within the group with '/dashboard'
// This allows for easier management of routes that share a common prefix
Route::prefix('/dashboard')->group(function () {

    // Define a route that listens for GET requests to '/dashboard'
    Route::get('/', function (){
        // Output 'dashboard' when the route is accessed
        echo 'dashboard';
    });

    // Define a route that listens for GET requests to '/dashboard/orders'
    Route::get('/orders',function (){
        // Output 'dashboard orders' when the route is accessed
        echo 'dashboard orders';
    });

});*/

/****************************************************************************************************************************/

// -> to make middleware --------> 'PHP artisan make middleware CheckUser'
/*Route::middleware(['checkuser'])->group(function (){
    Route::prefix('/profile')->group(function (){
        Route::get('/', function (){
            echo 'profile';
        });
        Route::get('/settings', function (){
            echo 'settings';
        });
    });
});*/

// Grouping routes under the 'checkuser' middleware and 'profile' prefix
/*Route::group(['middleware' => 'checkuser', 'prefix' => '/profile'], function () {
    // Define your routes here. All routes within this group will be prefixed with '/profile'
    // and will go through the 'checkuser' middleware for additional checks or conditions.
});*/
/****************************************************************************************************************************/


/****************************************************************************************************************************/


/****************************************************************************************************************************/

Route::get('/about',[HomeController::class,'index']);

Route::prefix('/contact')->group(function(){
    Route::get('/',[ContactController::class,'index']);
    Route::post('/submit',[ContactController::class,'save'])
        ->name('contact.save');
});
