<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Frontend\PagesController;

Route::get('index',[PagesController::class, 'index'])->name('index');
Route::get('contact',[PagesController::class, 'contact'])->name('contact');
Route::get('search',[PagesController::class, 'search'])->name('search');

//User Route

Route::group(['prefix' => 'user'], function() {
    
    Route::get('token/{token}',[App\Http\Controllers\Frontend\VarificationController::class, 'search'])->name('user.verification');  
    Route::get('/dashboard', [App\Http\Controllers\Frontend\UsersController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [App\Http\Controllers\Frontend\UsersController::class, 'userprofile'])->name('user.profile');
    Route::post('/profile/update', [App\Http\Controllers\Frontend\UsersController::class, 'profileupdate'])->name('user.profile.update');
    
});

//Cart Route

Route::group(['prefix' => 'cart'], function() {
    
    Route::get('/', [App\Http\Controllers\Frontend\CartsController::class, 'index'])->name('carts');
    Route::post('/store', [App\Http\Controllers\Frontend\CartsController::class, 'store'])->name('carts.store');
    Route::post('/update/{id}', [App\Http\Controllers\Frontend\CartsController::class, 'update'])->name('carts.update');
    Route::post('/delete/{id}', [App\Http\Controllers\Frontend\CartsController::class, 'delete'])->name('carts.delete');
    
});

//Chectout Route

Route::group(['prefix' => 'checkout'], function() {
    
    Route::get('/', [App\Http\Controllers\Frontend\CheckoutsController::class, 'index'])->name('checkouts');
    Route::post('/store', [App\Http\Controllers\Frontend\CheckoutsController::class, 'store'])->name('checkouts.store');
    
    
});



// Products Routes for frontend

use App\Http\Controllers\Frontend\ProductsController;

Route::group(['prefix' => 'products'], function() {
    Route::get('',[ProductsController::class, 'index'])->name('products');
    //Route::get('products/{slug}',[ProductsController::class, 'show'])->name('products.show');
    Route::get('/{id}',[ProductsController::class, 'show'])->name('products.show');
    
    //Category Routes
    Route::get('categories',[App\Http\Controllers\Frontend\CategoriesController::class, 'index'])->name('categories.index');
    Route::get('categories/{id}',[App\Http\Controllers\Frontend\CategoriesController::class, 'show'])->name('categories.show');


});





//Admin Routes
use App\Http\Controllers\Backend\PageController;
Route::group(['prefix' => 'admin'], function() {
    Route::get('',[PageController::class, 'index'])->name('admin.index');
    
   
//Products Routes
    Route::group(['prefix' => 'products'], function() {
        Route::get('/',[App\Http\Controllers\Backend\ProductsController::class, 'index'])->name('admin.products');
        Route::get('/create',[App\Http\Controllers\Backend\ProductsController::class, 'create'])->name('admin.product.create');
        Route::post('/create/store',[App\Http\Controllers\Backend\ProductsController::class, 'store'])->name('admin.product.create.store');
        Route::get('/edit/{id}',[App\Http\Controllers\Backend\ProductsController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update/{id}',[App\Http\Controllers\Backend\ProductsController::class, 'update'])->name('admin.product.update');
        Route::post('/delete/{id}',[App\Http\Controllers\Backend\ProductsController::class, 'delete'])->name('admin.product.delete');
    });

     //Oder Routes
     Route::group(['prefix' => 'orders'], function() {
        Route::get('/',[App\Http\Controllers\Backend\OrdersControllers::class, 'index'])->name('admin.orders');
        Route::get('/show/{id}',[App\Http\Controllers\Backend\OrdersControllers::class, 'show'])->name('admin.order.show');
        Route::post('/delete/{id}',[App\Http\Controllers\Backend\OrdersControllers::class, 'delete'])->name('admin.order.delete');
        Route::post('/completed/{id}',[App\Http\Controllers\Backend\OrdersControllers::class, 'completed'])->name('admin.order.completed');
        Route::post('/paid/{id}',[App\Http\Controllers\Backend\OrdersControllers::class, 'paid'])->name('admin.order.paid');

        Route::post('/charge-update/{id}',[App\Http\Controllers\Backend\OrdersControllers::class, 'chargeUpdate'])->name('admin.order.charge');
        Route::get('/invoice/{id}',[App\Http\Controllers\Backend\OrdersControllers::class, 'generateInvoice'])->name('admin.order.invoice');
    });

    //Categories Routes
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/',[App\Http\Controllers\Backend\CategoriesController::class, 'index'])->name('admin.categories');
        Route::get('/create',[App\Http\Controllers\Backend\CategoriesController::class, 'create'])->name('admin.category.create');
        Route::post('/create/store',[App\Http\Controllers\Backend\CategoriesController::class, 'store'])->name('admin.category.create.store');
        Route::get('/edit/{id}',[App\Http\Controllers\Backend\CategoriesController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update/{id}',[App\Http\Controllers\Backend\CategoriesController::class, 'update'])->name('admin.category.update');
        Route::post('/delete/{id}',[App\Http\Controllers\Backend\CategoriesController::class, 'delete'])->name('admin.category.delete');
    });

    
    //Brands Routes
    Route::group(['prefix' => 'brands'], function() {
        Route::get('/',[App\Http\Controllers\Backend\BrandsController::class, 'index'])->name('admin.brands');
        Route::get('/create',[App\Http\Controllers\Backend\BrandsController::class, 'create'])->name('admin.brand.create');
        Route::post('/create/store',[App\Http\Controllers\Backend\BrandsController::class, 'store'])->name('admin.brand.create.store');
        Route::get('/edit/{id}',[App\Http\Controllers\Backend\BrandsController::class, 'edit'])->name('admin.brand.edit');
        Route::post('/update/{id}',[App\Http\Controllers\Backend\BrandsController::class, 'update'])->name('admin.brand.update');
        Route::post('/delete/{id}',[App\Http\Controllers\Backend\BrandsController::class, 'delete'])->name('admin.brand.delete');
    });


    //Division Routes
    Route::group(['prefix' => 'divisions'], function() {
        Route::get('/',[App\Http\Controllers\Backend\DivisionsController::class, 'index'])->name('admin.divisions');
        Route::get('/create',[App\Http\Controllers\Backend\DivisionsController::class, 'create'])->name('admin.division.create');
        Route::post('/create/store',[App\Http\Controllers\Backend\DivisionsController::class, 'store'])->name('admin.division.create.store');
        Route::get('/edit/{id}',[App\Http\Controllers\Backend\DivisionsController::class, 'edit'])->name('admin.division.edit');
        Route::post('/update/{id}',[App\Http\Controllers\Backend\DivisionsController::class, 'update'])->name('admin.division.update');
        Route::post('/delete/{id}',[App\Http\Controllers\Backend\DivisionsController::class, 'delete'])->name('admin.division.delete');
    });


    //District Routes
    Route::group(['prefix' => 'districts'], function() {
        Route::get('/',[App\Http\Controllers\Backend\DistrictsController::class, 'index'])->name('admin.districts');
        Route::get('/create',[App\Http\Controllers\Backend\DistrictsController::class, 'create'])->name('admin.district.create');
        Route::post('/create/store',[App\Http\Controllers\Backend\DistrictsController::class, 'store'])->name('admin.district.create.store');
        Route::get('/edit/{id}',[App\Http\Controllers\Backend\DistrictsController::class, 'edit'])->name('admin.district.edit');
        Route::post('/update/{id}',[App\Http\Controllers\Backend\DistrictsController::class, 'update'])->name('admin.district.update');
        Route::post('/delete/{id}',[App\Http\Controllers\Backend\DistrictsController::class, 'delete'])->name('admin.district.delete');
    });

     //Slider Routes
     Route::group(['prefix' => 'sliders'], function() {
        Route::get('/',[App\Http\Controllers\Backend\SlidersController::class, 'index'])->name('admin.sliders');
        Route::post('/store',[App\Http\Controllers\Backend\SlidersController::class, 'store'])->name('admin.slider.store');
        Route::post('/update/{id}',[App\Http\Controllers\Backend\SlidersController::class, 'update'])->name('admin.slider.update');
        Route::post('/delete/{id}',[App\Http\Controllers\Backend\SlidersController::class, 'delete'])->name('admin.slider.delete');
    });
    
   
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Api Routes

Route::get('get-districts/{id}',function($id){
   return json_encode(App\Models\District::where('division_id', $id)->get());
});