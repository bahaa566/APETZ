<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CaptainAppController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SplashController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CaptainController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RateController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\Vehicle\VehicleModelController;
use App\Http\Controllers\Admin\Vehicle\VehiclePayloadController;
use App\Http\Controllers\Admin\Vehicle\VehicleTypeController;
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

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';


