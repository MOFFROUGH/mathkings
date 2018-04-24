<link rel="stylesheet" href="{{asset('alerts/themes/alertify.core.css')}}" />
<link rel="stylesheet" href="{{asset('alerts/themes/alertify.default.css')}}" id="toggleCSS" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{asset('alerts/lib/alertify.min.js')}}"></script>
<script src="{{asset('alerts/lib/main.js')}}"></script>
<style>
.alertify-log-custom {
	background: blue;
}
</style>

@if(count($errors) >0)
	@foreach($errors->all() as $error)

		<p>
			<script>
			alertify.error("{{$error}}");
			</script>
		</p>

	@endforeach
@endif
@if(session()->has('message'))
	<p>
		<script>
		alertify.success("{{session()->get('message')}}");
		</script>
	</p>
@endif
@if ($message = Session::get('success'))
	<p>
		<script>
		alertify.success("{!! $message !!}");
		</script>
	</p>
	<?php Session::forget('success');?>
@endif

@if ($message = Session::get('error'))
	<p>
		<script>
		alertify.success("{!! $message !!}");
		</script>
	</p>
	<?php Session::forget('error');?>
@endif
