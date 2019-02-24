<?php


//welcome page
Route::get('/', 'CarModelController@index')->name('index');


//Ajax routes
Route::get('/markas', 'CarModelController@ajaxMarkas')->name('markas');


Route::group(
    [
        'prefix' =>'admin',
    ],
    function()
    {

        //Model routes
        Route::get('/', 'CarModelController@allModels')->name('allModels');
        Route::get('/model-markas/{id}', 'CarModelController@markas')->name('modelMarkas');
        Route::get('/edit-model/{id}', 'CarModelController@edit')->name('editModel');
        Route::get('/delete-model/{id}', 'CarModelController@delete')->name('deleteModel');
        Route::get('/create-model', 'CarModelController@create')->name('createModel');
        Route::post('/store-model', 'CarModelController@store')->name('storeModel');
        Route::post('/update-model/{id}', 'CarModelController@update')->name('updateModel');
        Route::post('/destroy-model/{id}', 'CarModelController@destroy')->name('destroyModel');




        //Marka routes
        Route::get('/all-cars', 'CarMarkaController@allMarkas')->name('allMarkas');
        Route::get('/edit-marka/{id}', 'CarMarkaController@edit')->name('editMarka');
        Route::get('/delete-marka/{id}', 'CarMarkaController@delete')->name('deleteMarka');
        Route::get('/create-marka/{modelId}', 'CarMarkaController@create')->name('createMarka');
        Route::post('/store-marka', 'CarMarkaController@store')->name('storeMarka');
        Route::post('/update-marka/{id}', 'CarMarkaController@update')->name('updateMarka');
        Route::post('/destroy-marka/{id}', 'CarMarkaController@destroy')->name('destroyMarka');


    });