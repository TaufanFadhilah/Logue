<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::get('/', function () {
    return response()->json('success');
});
Route::group(['middleware' => 'auth:api'], function(){
  // USER ROUTES
  Route::get('/profile', function () {
      return view('auth.profile');
  })->name('profile');

  Route::put('profile','API\UserController@updateProfile')->name('profile.update');
  Route::put('security','API\UserController@updateSecurity')->name('profile.security.update');
  Route::get('users','API\UserController@all')->name('users');
  Route::put('changeCommittee/{user}','API\UserController@changeCommittee')->name('user.change.committee');
  Route::post('beCommittee/{user}', 'API\UserController@beCommittee')->name('user.be.committee');

  // CONTESTS ROUTES
  Route::resource('contest','API\ContestController');
  Route::put('timeline/{contest}','API\ContestController@updateTimeline')->name('contest.timeline');
  Route::get('mycontest','API\ContestController@myContest')->name('contest.mine');

  // Participant Routes
  Route::get('join/{contest}', 'API\ContestController@join')->name('contest.join');
  Route::post('addMember','API\ContestController@addMember')->name('contest.addMember');
  Route::post('addBracket','API\ContestController@addBracket')->name('contest.addBracket');

  // Bracket Route
  ROute::post('changeBracket/{contest}','API\ContestController@changeBracket')->name('contest.changeBracket');
});
