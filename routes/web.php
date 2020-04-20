<?php

Route::get('/', 'FrontpageController@index')->name('home');

Route::resource('styleprof', 'StyleProfController');
// Route::get('/styleprof', 'StyleProfController@index')->name('styleprof.index');
// Route::post('/styleprof', 'StyleProfController@save')->name('styleprof.save');


Route::resource('/aboutyou', 'AboutyouController');
Route::resource('/priceshow', 'PriceshowController');
Route::resource('/choosespecial', 'ChoosespecialController');
Route::resource('/occasion', 'OccasionController');
Route::resource('/description', 'DescriptionController');
Route::resource('/userinfo', 'UserinfoController');

Auth::routes();

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin'],'as'=>'admin.'], function(){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::resource('freestyles','FreestyleController');
    Route::resource('workstyles','WorkstyleController');
    Route::resource('neverwears','NeverwearController');
    Route::resource('brands','BrandController');
    Route::resource('ages','AgeController');
    Route::resource('priceranges','PricerangeController');
});