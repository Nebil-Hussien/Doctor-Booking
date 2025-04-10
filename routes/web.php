<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminAuthController;

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

// Route::get('/', function () {
//     return view('admin/layout/app');
// });

Route::prefix('admin')->group(base_path('routes/admin_route.php'));
Route::prefix('user')->group(base_path('routes/user_route.php'));
Route::prefix('md')->group(base_path('routes/md_route.php'));
Route::prefix('seniormd')->group(base_path('routes/seniormd_route.php'));
Route::prefix('/')->group(base_path('routes/web_route.php'));

