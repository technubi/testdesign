<?php
Route::get('', 'AboutController@index');
Route::get('/aboutus','AboutController@index');
Route::get('/work','WorkController@index');
Route::get('/team','TeamController@index');
Route::get('/contact','ContactController@index');

$a = 'auth.';

Route::get('/loginadmin',            ['as' => $a . 'loginadmin',          'uses' => 'Auth\AuthController@getLoginAdmin']);
Route::post('/loginadmin',            ['as' => $a . 'login-postadmin',          'uses' => 'Auth\AuthController@postLoginAdmin']);
Route::get('/addadmin',         ['as' => $a . 'addadmin',       'uses' => 'Auth\AuthController@getAddAdmin']);
Route::post('/addadmin',        ['as' => $a . 'addadmin-post',  'uses' => 'Auth\AuthController@postAddAdmin']);

/*ABOUT*/
Route::get('admin/about', 'AboutController@index');
Route::get('admin/work', 'BigworkController@index');

/*END ABOUT*/


/*
 * indeks 1 = admin
 * indeks 2 = all
 * 1 = boleh
 * 0 = tidak
 * */
/*ADMIN OWNER PREVILEGE*/
Route::group(['middleware' => 'auth','roles'=>'10'], function()
{
    /*ADMIN*/
    Route::get('/admin/manajemen','AdminController@index');
    /*END ADMIN*/

    Route::get('/admin/manajemen','AdminController@index');
    Route::get('/admin/edit/{id}','AdminController@edit');
    Route::patch('/admin/edit/{id}', ['as' => 'editAdmin', 'uses' =>'Auth\AuthController@editAdmin']);
    Route::get('/admin/delete/{id}', 'AdminController@delete');

    Route::get('/admin/about/create','AboutController@create');
    Route::post('admin/about/create', ['as' => 'createAbout', 'uses' => 'AboutController@store']);

    Route::get('admin/bigwork/create', 'BigworkController@create');
    Route::post('admin/bigwork/create', ['as' => 'createBigwork', 'uses' => 'BigworkController@store']);
    Route::get('admin/bigwork/edit/{id}', 'BigworkController@edit');
    Route::get('admin/bigwork/delete/{id}', 'BigworkController@destroy');
    Route::patch('admin/bigwork/edit/{id}', ['as' => 'editBigwork', 'uses' => 'BigworkController@update']);
    Route::get('admin/bigwork/detail/{id}', 'MissionController@detail');
    Route::get('admin/smallwork/detail/{id}', 'DetailworkController@index');
    Route::get('/admin/smallwork/detailwork/create/{id}', 'DetailworkController@create');
    Route::post('admin/detailwork/create', ['as' => 'createDetailWork', 'uses' => 'DetailworkController@store']);
    Route::get('admin/detailwork/edit/{id}', 'DetailworkController@edit');
    Route::patch('admin/detailwork/edit/{id}', ['as' => 'editDetailWork', 'uses' => 'DetailworkController@update']);
    Route::get('admin/detailwork/more/{id}', 'DetailworkController@detail');
    Route::get('admin/detailwork/addphoto/{id}', 'DetailworkController@insertImage');
    Route::get('admin/detailwork/delphoto/{id}/{idpro}', 'DetailworkController@deleteImage');
    Route::post('/upload', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
    Route::post('/upload/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);

});
/*END ADMIN OWNER PREVILEGE*/


/*ADMIN PREVILEGE*/
Route::group(['middleware' => 'auth','roles'=>'1000'], function()
{
    /*PENDING */
    Route::get('/admin',            ['as' => 'adminHome',          'uses' => 'AdminController@index']);
    Route::get('/admin/cekMember',            ['as' => 'adminCekPendingMember',          'uses' => 'AdminController@cekMember']);
    Route::post('/admin/cekMember',            ['as' => 'adminCekPendingMember',          'uses' => 'AdminController@cekMember']);
    Route::get('/admin/cekOwner',            ['as' => 'adminCekPendingOwner',          'uses' => 'AdminController@cekOwner']);
    Route::patch('/admin/Owner/edit/{id}',            ['as' => 'editOwner',          'uses' => 'Auth\AuthController@patchEditOwner']);
    Route::patch('/admin/User/edit/{id}',            ['as' => 'editUser',          'uses' => 'Auth\AuthController@patchEditUser']);
    /*END PENDING*/
});
/*END ADMIN PREVILEGE*/



Route::group(['middleware' => 'auth','roles'=>'1111'], function()
{
    $a = 'authenticated.';
    Route::get('/logout', ['as' => $a . 'logout', 'uses' => 'Auth\AuthController@getLogout']);






});







