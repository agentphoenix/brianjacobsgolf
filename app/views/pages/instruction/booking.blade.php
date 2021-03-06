@layout('template')

@section('title')
	Book an Appointment Now
@endsection

@section('content')
	<div class="booking-engine">
		<div class="loading align-center hide">
			<img src="{{ URL::to_asset('img/img-loader.gif') }}" alt=""><br>
			Loading USchedule...
		</div>
		<div class="loaded">
			@if ($link)
				<iframe src="http://brianjacobsgolf.uschedule.com/uschedulehome.aspx{{ $link }}" width="944" scrolling="yes" height="938" frameborder="0"></iframe>
			@else
				<iframe src="http://brianjacobsgolf.uschedule.com/uschedulehome.aspx" width="944" scrolling="yes" height="938" frameborder="0"></iframe>
			@endif
		</div>
	</div>
@endsection