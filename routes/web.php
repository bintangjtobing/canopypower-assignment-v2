<?php
Route::get('/login', function () {
    $tokens = bin2hex(openssl_random_pseudo_bytes(64));
    return Redirect::to('/login/' . $tokens);
})->name('login');
Route::get('/login/{tokens}', 'authController@index');
Route::post('/login/{tokens}', 'authController@loginProcess');

Route::get('/sign-out', function () {
    session()->flush();
    auth()->logout();
    return redirect('/');
});
Route::get('/generatepdf', 'apiController@generatepdf');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/{any}', function () {
        return view('layout');
    })->where('any', '.*');
});
