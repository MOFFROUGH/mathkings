@extends('writer/includes/base')
@section('page-head','Payment Order')
@section('page-foot',' Showing Payment Details')

@section('main-content')

  <div class="col-md-6 col-md-offset-3 jumbotron" style="border-radius: 8px">
    <form  method="POST" class="form-horizontal col-sm-offset-1"  role="form">
      <div class="form-group">
        <label class=" control-label col-sm-2" for="lastname" style="text-align: left">User</label>
        <div class="  col-sm-8">
          <input type="text" class="form-control" disabled value=""  name="jname" placeholder="Enter job name" >
        </div>
      </div>
      <div class="form-group">
        <label class=" control-label col-sm-2" for="pages" style="text-align: left">Amount</label>
        <div class="  col-sm-8">
          <input type="text" class="form-control" disabled value=" $" name="pages"  >
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
        <label class=" control-label col-sm-2" for="details" style="text-align: left">Details</label>
        <div class="  col-sm-8">
          <textarea type="text" class="form-control" disabled value="" name="details" placeholder="" ></textarea>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
        <label class=" control-label col-sm-2" for="deadline" style="text-align: left">Deadline</label>
        <div class="  col-sm-8">
          <input type="text" class="form-control" disabled value="" name="deadline" placeholder="deadline" >
        </div>
      </div>
    </form>
    <style>
    .form-control{
      border-radius: 8px;
      outline-color: blue;
      border: 1px solid green;
      box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.05) inset, 0px 0px 8px rgba(82,168,236,0.6);
    }

    </style>
    <form class="paypal" action="{{route('payment.process')}}" method="post" id="paypal_form" target="_blank">
  		<input type="hidden" name="cmd" value="_xclick" />
  		<input type="hidden" name="no_note" value="1" />
  		<input type="hidden" name="lc" value="UK" />
  		<input type="hidden" name="currency_code" value="GBP" />
  		<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
  		<input type="hidden" name="first_name" value="Customer's First Name"  />
  		<input type="hidden" name="last_name" value="Customer's Last Name"  />
  		<input type="hidden" name="payer_email" value="customer@example.com"  />
  		<input type="hidden" name="item_number" value="123456" / >
  		<input type="submit" name="submit" value="Submit Payment"/>
  	</form>
  </div>
@endsection
