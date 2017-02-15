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

Route::group(['middleware' => 'cors'], function(){

		//Route::post('/oauth/token', ['as' => 'oauth.token',	'uses' => 'AccessTokenController@issueToken'])->middleware('checkLogin', 'throttle');
		Route::group(['prefix' => 'client', 'as' => 'client.'], function(){
			Route::resource('orders', 'Api\ClientCheckoutController', ['except' => ['create', 'edit', 'destroy']]);
			
			Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
				Route::get('/search/{data}', 			['as' => 'search', 	'uses' => 'Api\ClientProductController@search']);
				Route::get('/{id}', 					['as' => 'show', 	'uses' => 'Api\ClientProductController@show']);
				Route::get('', 							['as' => 'index', 	'uses' => 'Api\ClientProductController@index']);
			});
			
		});

		Route::group(['prefix' => 'deliveryman', 'middleware' => 'oauth.checkrole:deliveryman', 'as' => 'deliverymen.'], function(){
			Route::resource('orders', 'Api\DeliverymanCheckoutController', ['except' => ['create', 'edit', 'destroy', 'store']]);
			Route::patch('orders/{id}/update-status',	['as' => 'orders.update-status',	'uses' => 'Api\DeliverymanCheckoutController@updateStatus']);
			Route::post('orders/{id}/geo', 				['as' => 'orders.geo', 				'uses' => 'Api\DeliverymanCheckoutController@geo']);
		});

		Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
			Route::get('find-by-token/{social}/{token}',['as' => 'find-by-token',   'uses' => 'Api\UsersController@findByToken']);
			Route::get('authenticated', 				['as' => 'authenticated', 	'uses' => 'Api\UsersController@authenticated']);
			Route::patch('device-token', 				['as' => 'device-token', 	'uses' => 'Api\UsersController@updateDeviceToken']);
			Route::post('/', 							['as' => 'create', 			'uses' => 'Api\UsersController@create']);
			Route::get('/', 							['as' => 'list', 			'uses' => 'Api\UsersController@index']);
		});

		Route::group(['prefix' => 'app', 'as' => 'app.'], function(){
			Route::post('/', 							['as' => 'index', 			'uses' => 'Api\OauthClientController@create']);
		
		});

		Route::group(['prefix' => 'coupons', 'as' => 'coupons.'], function(){
			Route::get('/code/{code}', 						['as' => 'findByCode', 'uses' => 'Api\CouponsController@findByCode']);
		});		

});

