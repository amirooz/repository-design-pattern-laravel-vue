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

Route::apiResources([
    // 'user' => 'API\UserController',
    'permission' => 'API\PermissionController',
    'roles' => 'API\RoleController',

    'dashboard' => 'API\DashboardController',
    'mahanagar' => 'API\MahanagarController',
    'division' => 'API\DivisionController',
    'district' => 'API\DistrictController',
    'thana' => 'API\ThanaController',
    'upazilla' => 'API\UpazillaController',    
    'pourashava' => 'API\PourashavaController',
    'union' => 'API\UnionController',
    'member' => 'API\MemberController',    
]);

Route::get('dstlookup/{id}', 'API\DistrictController@lookup');
Route::get('upazillalookup/{id}', 'API\UpazillaController@lookup');
Route::get('pourashavalookup/{id}', 'API\PourashavaController@lookup');
Route::get('unionlookup/{id}', 'API\UnionController@lookup');

Route::get('findUpazilla', 'API\UpazillaController@search');
Route::get('findUnion', 'API\UnionController@search');
Route::get('findMember', 'API\MemberController@search');
