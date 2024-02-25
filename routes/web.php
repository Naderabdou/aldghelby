<?php

use App\Http\Controllers\Dashboard\AuthController;
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

Route::prefix('admin')->namespace('Dashboard')->group(function () {

    /* Auth Routes */
    Route::get('login', 'AuthController@showLoginForm')->name('admin.login');
    Route::post('login', 'AuthController@login')->name('admin.login.post');
    Route::get('logout', 'AuthController@logout')->name('admin.logout');
    Route::get('reset-password', 'AuthController@reset')->name('admin.reset');
    Route::post('send-link', 'AuthController@sendLink')->name('admin.sendLink');
    Route::get('changePassword/{code}', 'AuthController@changePassword')->name('admin.resetPassword');
    Route::post('update/password/admin', 'AuthController@updatePassword')->name('admin.updatePassword');


    /* End Auth Routes */
});



Route::prefix('admin')->middleware('auth')->namespace('Dashboard')->name('admin.')->group(function () {

    Route::get('/', 'DashboardController@home')->name('home');


   // Route::post('sliders/status','SliderController@status')->name('sliders.status');
   // Route::Delete('sliders/bulk_delete', 'SliderController@bulk_delete')->name('sliders.bulk_delete');
    Route::resource('sliders', 'SliderController');

   // Route::post('sliders/status','SliderController@status')->name('sliders.status');
    // //Route::Delete('sliders/bulk_delete', 'SliderController@bulk_delete')->name('sliders.bulk_delete');
     Route::resource('features', 'FeatureController');
     Route::resource('values', 'OurValueController');
    // Route::resource('training', 'TrainingController');
     Route::resource('client', 'ClientController');

    // Route::post('servicesCategories/status','ServiceCategoryController@status')->name('servicesCategories.status');
    // Route::Delete('servicesCategories/bulk_delete', 'ServiceCategoryController@bulk_delete')->name('servicesCategories.bulk_delete');
    // Route::resource('servicesCategories', 'ServiceCategoryController');

    Route::post('services/status','ServiceController@status')->name('services.status');
    Route::Delete('services/bulk_delete', 'ServiceController@bulk_delete')->name('services.bulk_delete');
    Route::resource('services', 'ServiceController');
    Route::resource('blogs', 'BlogController');
    Route::resource('projects', 'ProjectController');
    Route::resource('project/gallary', 'ProjectGallaryController');


    Route::resource('orders', 'ServiceOrdersController');
    Route::resource('subscribe', 'SubscribeController');






    Route::resource('settings', 'SettingController');

    Route::get('contacts', 'ContactController@index')->name('contacts.index');

    Route::get('contacts/{id}', 'ContactController@show')->name('contacts.show');

    Route::get('contacts/{id}/reply', 'ContactController@showReplyForm')->name('contacts.reply');

    Route::post('contacts/send-reply', 'ContactController@sendReply')->name('contacts.sendReply');

    Route::delete('contacts/{id}', 'ContactController@deleteMsg')->name('contacts.deleteMsg');

    // Route::get('mail-list', 'MailListController@index')->name('mail.index');

    // Route::delete('mail-list/{id}', 'MailListController@deleteMail')->name('mail.deleteMail');

    Route::get('profile', 'ProfileController@getProfile')->name('profile');

    Route::post('update-profile', 'ProfileController@updateProfile')->name('update_profile');
    Route::post('update-password', 'ProfileController@updatePassword')->name('update_profile_password');
});

Route::namespace('Site')->name('site.')->middleware('lang')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

   Route::resource( 'service', 'ServiceController');
   Route::resource( 'aboutUs', 'AboutUsController');
   Route::resource( 'blog', 'BlogsController')->only('index', 'show');
    Route::resource( 'contactUs', 'ContactUsController')->only('index', 'store');






   Route::post('/service/order', 'HomeController@serviceOrder')->name('service-order');
    Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');
   Route::get('/lang/{lang}', 'HomeController@lang')->name('lang');


  //  Route::post('contact/send', 'ContactController@sendContact')->name('contact.sendContact');

    // Mail List Routes

    // search
//    Route::get('search', 'HomeController@search')->name('search');

});
