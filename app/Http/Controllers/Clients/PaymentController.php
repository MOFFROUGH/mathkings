<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users\jobs;
use App\Users;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth ;
//use App\Model\Users\payment;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaymentController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  private $_api_context;
      /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
          /** setup PayPal api context **/
          $paypal_conf = \Config::get('paypal');
          $this->_api_context = new ApiContext(new OAuthTokenCredential('AZYe4WoVyTl7Lm0aZV8Vw6HQ5XrrKQslUbEYvihhPHvm6SjhD-XOC7y5RLDj-pLZl7uPk6a2FaCVhpl3', 'EFOoKKR9iwu9-cIYg5n8TW06ffnMQF7PWkSkQNPspM9k7P7p54a6HH9bqhs6Lje1J0eP6kgPGgY4WdTb'));
          $config2=array(
          	/**
          	* Available option 'sandbox' or 'live'
          	*/
          	'mode' => 'sandbox',
          	/**
          	* Specify the max request time in seconds
          	*/
          	'http.ConnectionTimeOut' => 1000,
          	/**
          	* Whether want to log to a file
          	*/
          	'log.LogEnabled' => true,
          	/**
          	* Specify the file that want to write on
          	*/
          	'log.FileName' => storage_path() . '/logs/paypal.log',
          	/**
          	* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
          	*
          	* Logging is most verbose in the 'FINE' level and decreases as you
          	* proceed towards ERROR
          	*/
          	'log.LogLevel' => 'INFO'
          );
          $this->_api_context->setConfig($config2);
      }


  public function index()
  {
    $jobsall=jobs::select('*')->get();
    $jobsrevision=jobs::select('*')->where('status','revision')->get();
    $jobscomplete=jobs::select('*')->where('status','complete')->get();
    $jobsrejected=jobs::select('*')->where('status','rejected')->get();
    $jobsreceived=jobs::select('*')->where('status','received')->get();
    $jobspending=jobs::select('*')->where('status','pending')->get();
    return view('users/payments/show',compact('jobsall','jobspending','jobsreceived','jobsrejected','jobscomplete','jobsrevision'));
  }
  public function success($response)
  {
    return $response;
    return view('users/payments/success');
  }


  public function cancel()
  {
    return view('users/payments/cancel');
  }
  public function process()
  {


    $jobsall=jobs::select('*')->get();
    $jobsrevision=jobs::select('*')->where('status','revision')->get();
    $jobscomplete=jobs::select('*')->where('status','complete')->get();
    $jobsrejected=jobs::select('*')->where('status','rejected')->get();
    $jobsreceived=jobs::select('*')->where('status','received')->get();
    $jobspending=jobs::select('*')->where('status','pending')->get();
    return view('users/payments/paypal',compact('jobsall','jobspending','jobsreceived','jobsrejected','jobscomplete','jobsrevision'));
    return view('users/payments/paypal');
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
  public function payWithPaypal($id)
    {
      $amount= jobs::select('price')->where('id',$id)->first();
      $jobsall=jobs::select('*')->get();
      $jobsrevision=jobs::select('*')->where('status','revision')->get();
      $jobscomplete=jobs::select('*')->where('status','complete')->get();
      $jobsrejected=jobs::select('*')->where('status','rejected')->get();
      $jobsreceived=jobs::select('*')->where('status','received')->get();
      $jobspending=jobs::select('*')->where('status','pending')->get();
      return view('users/payments/paypal',compact('id','amount','jobsall','jobspending','jobsreceived','jobsrejected','jobscomplete','jobsrevision'));
        //return view('users.payments.paypal');
    }

    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(100); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(100);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('paypal')) /** Specify return URL **/
            ->setCancelUrl(URL::route('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('status');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('status');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error','Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        //$payment_id = Session::get('paypal_payment_id');
        $payment_id= $request->paymentId;
        //return $payment_id;
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($request->PayerID) || empty($request->token)) {
            \Session::put('error','Payment failed');
            return Redirect::route('client.all');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {

            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/

            \Session::put('success','Payment success');
            return Redirect::route('client.home');
        }
        \Session::put('error','Payment failed');

		return Redirect::route('payment.process');
    }
}
