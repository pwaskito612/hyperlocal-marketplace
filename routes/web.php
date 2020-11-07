<?php

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
 


Route::get('/', [App\Http\Controllers\Home\HomeController::class, 'index'])->name('home');

Route::get('/search-result', [App\Http\Controllers\SearchResult\ResultController::class, 'index']);

Route::get('/merchandise-detail', [App\Http\Controllers\MerchandiseDetail\DetailController::class, 'index']);



Route::middleware('logged')    
    ->group(function () {
        Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'index']);

        //account
        Route::get('/profil', [App\Http\Controllers\Account\ShowProfilController::class, 'index']);
        Route::put('account/update/personalinformation', [App\Http\Controllers\Account\UpdateProfilController::class, 'index']);
        Route::put('account/update/bankinformation', [App\Http\Controllers\Account\UpdateBankInformationController::class, 'index']);
        Route::post('/account/update/email', [App\Http\Controllers\Account\UpdateEmailController::class, 'index']);
        Route::get('/account/verify/email/{id}/{encrypt}', [App\Http\Controllers\Account\VerifyEmailController::class, 'index']);
        Route::put('/account/change-password', [App\Http\Controllers\Account\ChangePasswordController::class, 'index']);
    
        //merchandise
        Route::get('/mymerchandise', [App\Http\Controllers\Merchandise\ShowMerchandiseController::class, 'index']);
        Route::get('/create-merchandise', [App\Http\Controllers\Merchandise\CreateMerchandiseController::class, 'index']);
        Route::get('/edit-merchandise', [App\Http\Controllers\Merchandise\EditDataController::class, 'index']);
        Route::post('/store-merchandise', [App\Http\Controllers\Merchandise\StoreController::class, 'index']);
        Route::delete('/delete-merchandise', [App\Http\Controllers\Merchandise\DeleteController::class, 'index']);
        Route::put('/update-merchandise', [App\Http\Controllers\Merchandise\UpdateDataController::class, 'index']);
        Route::get('/edit-merchandise-image', [App\Http\Controllers\Merchandise\EditImageController::class, 'index']);
        Route::post('/insert-new-image', [App\Http\Controllers\Merchandise\InsertNewImageController::class, 'index']);
        Route::delete('/delete-image-merchandise', [App\Http\Controllers\Merchandise\DeleteImageController::class, 'index']);
       
        //order
        Route::get('/myorder', [App\Http\Controllers\Order\MyOrderController::class, 'index']);
        Route::get('/confirmed-order', [App\Http\Controllers\Order\ConfirmedOrderController::class, 'index']);
        Route::get('/unconfirmed-order', [App\Http\Controllers\Order\UnconfirmedOrderController::class, 'index']);
        Route::put('/confirm-order', [App\Http\Controllers\Order\ConfirmOrderController::class, 'index']);
        Route::get('/checkout', [App\Http\Controllers\Order\CreateOrderController::class, 'index']);
        Route::post('/store-purchase', [App\Http\Controllers\Order\StoreOrderController::class, 'index']);
        Route::get('/after-ordering', [App\Http\Controllers\Order\AfterOrderingController::class, 'index']);

        //chart
        Route::get('/chart', [App\Http\Controllers\Chart\ChartController::class, 'index']);
        Route::post('/add-chart', [App\Http\Controllers\Chart\AddToChartController::class, 'index']);
        Route::delete('/delete-chart', [App\Http\Controllers\Chart\RemoveChartController::class, 'index']);
      
        
        Route::post('/post-comment', [App\Http\Controllers\MerchandiseDetail\PostCommentController::class, 'index']);
        Route::post('/store-assessment', [App\Http\Controllers\MerchandiseDetail\StoreAssessmentController::class, 'index']);

        });

   
Auth::routes();