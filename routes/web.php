<?php


Route::get('/login', 'Backend\UserController@login')->name('login');
Route::post('/do_login', 'Backend\UserController@doLogin')->name('do.login');

Route::group(['namespace' => 'Backend', 'middleware' => 'auth'], function () {
    Route::get('/','DashboardController@index')->name('dashboard');


    //employee profile
    Route::get('/employee/profile/{id}', 'UserController@profile')->name('user.profile');
    Route::put('/employee/profile/update/{id}', 'UserController@profileUpdate')->name('profile.update');
    Route::put('/employee/password/update/{id}', 'UserController@updatePassword')->name('profile.password.update');


    Route::get('/logout', 'UserController@logout')->name('logout');
    Route::group(['middleware' => 'checkAdmin'], function () {
        Route::get('/user/list', 'UserController@index')->name('user.list');
        Route::get('/user/create', 'UserController@create')->name('user.create');
        Route::post('/registration/process','UserController@userAddProcess')->name('userAddProcess');
        Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::put('/user/update/{id}', 'UserController@update')->name('user.update');


        //resort
        Route::get('/resort/list','ResortController@list')->name('resort.list');
        Route::get('/resort/create','ResortController@create')->name('resort.create');
        Route::get('/resort/edit/{id}','ResortController@edit')->name('resort.edit');
        Route::put('/resort/update/{id}','ResortController@update')->name('resort.update');
        Route::post('/resort/create','ResortController@store')->name('resort.store');
        Route::get('/resort/delete/{id}','ResortController@delete')->name('resort.delete');

        //room
        Route::get('/room/create','RoomController@create')->name('room.create');
        Route::post('/room/create','RoomController@store')->name('room.store');
        Route::get('/room/edit/{id}','RoomController@edit')->name('room.edit');
        Route::put('/room/update/{id}','RoomController@update')->name('room.update');
        Route::get('/room/delete/{id}','RoomController@delete')->name('room.delete');

        Route::get('/location/thana','LocationController@thanaList')->name('thana.list');
        Route::get('/location/thana/create','LocationController@thanaCreate')->name('thana.create');
        Route::post('/location/thana/create','LocationController@thanaCreatePost')->name('thana.create');

//setting
        Route::get('/setting/edit/{id}','SettingController@edit')->name('setting.edit');
        Route::post('/setting/update/{id}','SettingController@update')->name('setting.update');


    });

    //booking
    Route::get('/booking/create','BookingController@create')->name('booking.create');
    Route::post('/booking/store','BookingController@store')->name('booking.store');
    Route::get('/booking/edit/{id}','BookingController@edit')->name('booking.edit');
    Route::get('/booking/show/{id}','BookingController@show')->name('booking.show');
    Route::put('/booking/update/{id}','BookingController@update')->name('booking.update');
    Route::get('/booking/delete/{id}','BookingController@delete')->name('booking.delete');
    Route::get('/booking/list','BookingController@list')->name('booking.list');
    Route::get('/booking/list/{fromDate}/{toDate}/{resort_id?}','BookingController@print')->name('booking.print');

    //room
    Route::get('/room/list','RoomController@list')->name('room.list');

});
