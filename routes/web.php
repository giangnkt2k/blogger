<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\BlogController;


use App\Models\Multipic;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

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
    $brands =DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $categories = DB::table('categories')->get();
    $blogs = Blog::latest()->paginate(5);
    $images = Multipic::all();
    return view('home', compact('brands','abouts','images','categories','blogs'));
});

Route::get('/contact', [ContactController::class, 'index'])->name('tach');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');
Route::get('/user/logout',[BrandController::class,'Logout'])->name('user.logout');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
 //route controller category
 Route::get('/category/all',[CategoryController::class, 'AllCat'])->name('all.category');
 Route::post('/category/add',[CategoryController::class, 'AddCat'])->name('store.category');
 Route::get('/category/edit/{id}',[CategoryController::class, 'Edit']);
 Route::post('/category/update/{id}',[CategoryController::class, 'Update']);
 Route::get('/softdelete/category/{id}',[CategoryController::class, 'SoftDelete']);
 Route::get('/category/restore/{id}',[CategoryController::class, 'Restore']);
 Route::get('/pdelete/category/{id}',[CategoryController::class, 'Pdelete']);

//brand route
Route::get('/brand/all',[BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class, 'Edit']);
Route::post('/brand/update/{id}',[BrandController::class, 'Update']);
Route::get('/brand/delete/{id}',[BrandController::class, 'Delete']);
 // images
Route::get('/multi/image',[BrandController::class, 'Multpic'])->name('multi.image');
Route::post('/multi/add',[BrandController::class, 'StoreImage'])->name('store.image');
 //Admin

Route::get('/slider/home',[HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/slider/add',[HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/slider/store',[HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}',[HomeController::class, 'EditSlider'])->name('edit.slider');
Route::post('/slider/update/{id}',[HomeController::class, 'UpdateSlider'])->name('update.slider');
Route::get('/slider/delete/{id}',[HomeController::class, 'DeleteSlider'])->name('delete.slider');

// home about
Route::get('/about/home',[AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/about/add',[AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/about/store',[AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}',[AboutController::class, 'EditAbout'])->name('edit.about');
Route::post('/about/update/{id}',[AboutController::class, 'UpdateAbout'])->name('update.about');
Route::get('/about/delete/{id}',[AboutController::class, 'DeleteAbout'])->name('delete.about');

Route::get('/about/choice/{id}',[AboutController::class, 'ChoiceAbout'])->name('choice.about');



//protfolio
Route::get('/portfolio',[AboutController::class, 'Portfolio'])->name('portfolio');
//Admin contact page route

Route::get('/contact/admin',[ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/contact/add',[ContactController::class, 'AddContact'])->name('add.contact');
Route::post('/contact/store',[ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('/contact/edit/{id}',[ContactController::class, 'EditContact'])->name('edit.contact');
Route::post('/contact/update/{id}',[ContactController::class, 'UpdateContact'])->name('update.contact');
Route::get('/contact/delete/{id}',[ContactController::class, 'DeleteContact'])->name('delete.contact');

//Home contact page routes
Route::get('/contact',[ContactController::class, 'Contact'])->name('contact');
//Route contact form
Route::post('/contact/form',[ContactController::class, 'ContactForm'])->name('contact.form');
// admin contact messages
Route::get('/admin/message',[ContactController::class, 'AdminMessage'])->name('admin.message');
Route::get('/delete/message/{id}',[ContactController::class, 'DeleteMessage'])->name('delete.message');

// Chage Password
Route::get('/user/password',[ChangePass::class, 'ChangePassword'])->name('change.password');
Route::post('/update/password',[ChangePass::class, 'UpdatePassword'])->name('update.password');

// user profile
Route::get('/user/profile',[ChangePass::class, 'PUpdate'])->name('profile.update');
Route::post('/user/profile/update',[ChangePass::class, 'UpdateProfile'])->name('update.user.profile');

//Blog
Route::get('/admin/blog',[BlogController::class, 'AdminBlog'])->name('admin.blog');
Route::get('/add/blog',[BlogController::class, 'AddBlog'])->name('add.blog');
Route::post('/store/blog',[BlogController::class, 'StoreBlog'])->name('store.blog');
Route::get('/edit/blog/{id}',[BlogController::class, 'EditBlog'])->name('edit.blog');
Route::post('/update/blog/{id}',[BlogController::class, 'UpdateBlog'])->name('update.blog');
Route::get('/delete/blog/{id}',[BlogController::class, 'DeleteBlog'])->name('delete.blog');
// Blog layout
Route::get('/blog',[BlogController::class, 'BlogPage'])->name('blog');
// Route::get('/blog/{name}',[BlogController::class, 'BlogPageInsertByCategory'])->name('blog');
Route::get('/blog/{id}',[BlogController::class, 'SingleBlogPage'])->name('single.blog');





