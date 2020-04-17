<?php

//Web
Route::get('/', ['as' => 'web.home', 'uses' => 'Web\HomeController@index']);
Route::get('/book/{slug}', ['as' => 'home.book', 'uses' => 'Web\HomeController@show']);
Route::get('/book/{slug}/test/{id}/{number}', ['as' => 'book.test', 'uses' => 'Web\TestController@show']);

// Admin Panel
Route::group(['middleware' => 'auth', 'prefix' => 'panel'], function () {

    // Books Settings
    Route::get('home', ['as' => 'pages.dashboard', 'uses' => 'Panel\DashboardController@index']);
    Route::get('books', ['as' => 'pages.books', 'uses' => 'Panel\BookController@index']);
    Route::get('book/create', ['as' => 'book.create', 'uses' => 'Panel\BookController@create']);
    Route::post('book/store', ['as' => 'book.store', 'uses' => 'Panel\BookController@store']);
    Route::get('book/edit/{id}', ['as' => 'book.edit', 'uses' => 'Panel\BookController@edit']);
    Route::post('book/update/{id}', ['as' => 'book.update', 'uses' => 'Panel\BookController@update']);
    Route::delete('book/delete/{id}', ['as' => 'book.delete', 'uses' => 'Panel\BookController@destroy']);

    Route:: group(['prefix' => 'questions'], function ()
    {
        // Questions -> Categories Settings
        Route::get('categories', ['as' => 'questions.categories', 'uses' => 'Panel\QuestionCategoryController@index']);
        Route::get('categories/create', ['as' => 'questions.categories.create', 'uses' => 'Panel\QuestionCategoryController@create']);
        Route::put('categories/store', ['as' => 'questions.categories.store', 'uses' => 'Panel\QuestionCategoryController@store']);
        Route::get('categories/edit/{id}', ['as' => 'questions.categories.edit', 'uses' => 'Panel\QuestionCategoryController@edit']);
        Route::put('categories/update/{id}', ['as' => 'questions.categories.update', 'uses' => 'Panel\QuestionCategoryController@update']);

        // Questions -> Questions Settings
        Route::get('question/create/findTestName', ['as' => 'question.ajax', 'uses' => 'Panel\QuestionController@findTestName']);
        Route::get('question', ['as' => 'pages.questions', 'uses' => 'Panel\QuestionController@index']);
        Route::get('question/create', ['as' => 'question.create', 'uses' => 'Panel\QuestionController@create']);
        Route::put('question/store', ['as' => 'question.store', 'uses' => 'Panel\QuestionController@store']);
        Route::get('question/edit/{id}', ['as' => 'question.edit', 'uses' => 'Panel\QuestionController@edit']);
        Route::put('question/update/{id}', ['as' => 'question.update', 'uses' => 'Panel\QuestionController@update']);

        // Questions -> Choices Settings | Note-> Use Test Route Name for all sub settings
        Route::get('choices', ['as' => 'page.choices', 'uses' => 'Panel\ChoiceController@index']);
        Route::get('choice/create', ['as' => 'choice.create', 'uses' => 'Panel\ChoiceController@create']);
        Route::put('choice/store', ['as' => 'choice.store', 'uses' => 'Panel\ChoiceController@store']);
        Route::get('choice/edit/{id}', ['as' => 'choice.edit', 'uses' => 'Panel\ChoiceController@edit']);
        Route::put('choice/update/{id}', ['as' => 'choice.update', 'uses' => 'Panel\ChoiceController@update']);

    });

});

Auth::routes();
