<?php
use Illuminate\Support\Facades\Artisan;
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
//Client namespace
Route::group(['namespace'=>'Clients','middleware'=>('auth')],function(){

	Route::group(['middleware' => 'client'],function(){
		//
		Route::get('/client','HomeController@index')->name('client.home');

		Route::get('/client/all','JobsController@all')->name('client.all');

		Route::get('/client/revision','JobsController@revision')->name('client.revision');

		Route::get('/client/complete','JobsController@complete')->name('client.complete');

		Route::get('/client/pending','JobsController@pending')->name('client.pending');

		Route::get('/client/rejected','JobsController@rejected')->name('client.rejected');


	});
	Route::get('/client/received','JobsController@received')->name('client.received');

	Route::get('/client/order/accept/{id}','JobsController@orderAccept')->name('order.accepted');

	Route::post('/client/order/revise/{id}','JobsController@orderRevise')->name('order.revision');

	Route::resource('client/job','JobsController');

	Route::get('/client/view/{id}','JobsController@viewer')->name('client.view');

	Route::get('/markAsRead', function(){
		auth()->user()->unreadNotifications->markAsRead();
		return redirect()->back()->withMessage('read all');
	});
	Route::resource('client/message','MessagesController');

	Route::get('/client/thread/{thread}','MessagesController@thread')->name('message.thread');

	Route::post('/client/chat/{chat}','MessagesController@handler')->name('message.handler');

	Route::resource('client/payments','PaymentController');

	Route::resource('client/logs','LoginController');

	Route::get('/client/success','PaymentController@success')->name('client.payment.success');

	Route::get('/client/cancel','PaymentController@cancel')->name('client.payment.cancel');

	Route::post('/pay','PaymentController@process')->name('payment.process');


	// route for view/blade file
	Route::get('paywithpaypal/{id}', array('as' => 'paywithpaypal','uses' => 'PaymentController@payWithPaypal'));

	// route for post request
	Route::post('paypal', array('as' => 'paypal','uses' => 'PaymentController@postPaymentWithpaypal'));

	// route for check status responce
	Route::get('paypal', array('as' => 'status','uses' => 'PaymentController@getPaymentStatus'));

});

//writer namespace
Route::group(['namespace'=>'Writer'],function(){

	Route::group(['middleware' => 'writer'],function(){

		Route::get('/writer/home', 'HomeController@index')->name('writer.home');

		Route::get('/writer/all','JobsController@all')->name('writer.all');

		Route::get('/writer/revision','JobsController@revision')->name('writer.revision');

		Route::get('/writer/complete','JobsController@complete')->name('writer.complete');

		Route::get('/writer/pending','JobsController@pending')->name('writer.pending');

		Route::get('/writer/rejected','JobsController@rejected')->name('writer.rejected');

		Route::get('/writer/received','JobsController@received')->name('writer.received');
		Route::post('/writer/upload/{id}','JobsController@upload')->name('writer.upload');

		Route::get('/writer/accept/{id}','JobsController@accept')->name('writer.accept');

		Route::get('/writer/thread/{thread}','MessagesController@thread')->name('message.writer.thread');
	});
	Route::post('/writer/chat/{chat}','MessagesController@handler')->name('message.writer.handler');

});
//admin namespace
Route::group(['namespace'=>'Admin'],function(){

	Route::group(['middleware' => 'admin'],function(){

		Route::get('/admin/home', 'HomeController@index')->name('admin.home');
		Route::get('/admin/home/2', 'HomeController@index2')->name('admin.home2');
		Route::get('/admin/home/3', 'HomeController@index3')->name('admin.home3');
		Route::get('/admin/home/4', 'HomeController@index4')->name('admin.home4');

		Route::get('/admin/all','JobsController@all')->name('admin.all');

		Route::get('/admin/revision','JobsController@revision')->name('admin.revision');

		Route::get('/admin/complete','JobsController@complete')->name('admin.complete');

		Route::get('/admin/pending','JobsController@pending')->name('admin.pending');

		Route::get('/admin/rejected','JobsController@rejected')->name('admin.rejected');

		Route::get('/admin/received','JobsController@received')->name('admin.received');

	});

});
Route::group(['namespace'=>'Home'],function(){

	Route::get('/', 'HomeController@index')->name('guest.home');

});
Route::get('/sendmail', 'HomeController@mail')->name('sendmail');
Route::get('/welcome/activate', 'HomeController@emailactivation')->name('email.activation');
Route::get('/activate/{key}', 'HomeController@accountverify')->name('account.verif');

Route::post('/emailsubscribe', 'HomeController@emailsubscribe')->name('emailsubscribe');
Auth::routes();

//custom login and authentication
Route::post('login/custom', array('as' => 'login.custom','uses' => 'Clients\LoginController@login'));
//Route::post('register/custom', array('as' => 'register.custom','uses' => 'CustomRegisterController@login'));
Route::resource('register','CustomRegisterController');
Route::get('/redirecting', array('as' => 'redirectUsers','uses' => 'Clients\LoginController@redirectRequest'));

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/down', function() {
	$exitCode = Artisan::call('down');
	return redirect()->route('guest.home')->with('message',"config Cache configured");
});
Route::get('/up', function() {
	return view('live');
});
// Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
