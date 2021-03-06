@layout('template')

@section('title')
	Storm the Course
@endsection

@section('content')
	<h1 class="stormthecourse">Storm the Course</h1>

	<p>Between March 1st and May 1st, Brian Jacobs Golf wants to give you the tools to <strong class="primary">storm the course</strong> and make 2013 your best year of golf yet. With reduced rates on private instruction, special putting and fitness programs and much more, you'll be able to hone your skills to take the course by storm. To make the deal even sweeter, we'll be giving away Brian Jacobs Golf gift certificates and Nike Golf gear over the 2 months as well! Check out the information below and come see us today so you can <strong class="primary">storm the course</strong> this year.</p>

	<div class="row-fluid">
		<div class="span6">
			<div class="well">
				<h2>Private Instruction</h2>

				<p>Take advantage of special rates on private instruction sessions during <em>Storm the Course</em> and take your game inside the ropes. With 30 minutes of on-range time and 30 minutes of on-course instruction, we can help you take what you learn on the range and translate it to real results on the course so you can <strong class="primary">storm the course</strong> in 2013!</p>

				<h2 class="primary">$100 <small>per hour</small></h2>
			</div>
		</div>

		<div class="span6">
			<div class="well">
				<h2>Weather the Storm</h2>

				<p>From now until April 31st, get your entire set of clubs (up to 13 clubs excluding putter) regripped with PURE Grips for just <strong class='primary'>$99</strong>*. If you only need a few clubs regripped, it's only <strong class='primary'>$9</strong> per grip and only .25 per club to build up tape under the grip. Take advantage of this offer and <strong class='primary'>storm the course</strong> in 2013!</p>

				<div style="height:44px"></div>

				<div class="hidden-phone">
					<a href="{{ URL::to_route('puregrips') }}" class="btn btn-primary">More Info</a>
				</div>

				<div class="visible-phone">
					<a href="{{ URL::to_route('puregrips') }}" class="btn btn-primary bnt-large btn-block">More Info</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span6">
			<div class="well">
				<h2>The Final Storm</h2>

				<p>Make a final push before the 2013 golf season gets into full swing with the <strong class="primary">Final Storm</strong> event at the Mill Creek Golf Club. Participants will be able to take advantage of instruction on the full swing, short game or putting with a Brian Jacobs Golf instructor as well as unlimited golf on the Mill Creek Short Course. More information coming soon; stay tuned.</p>
			</div>
		</div>

		<div class="span6">
			<div class="well">
				<h2>Nike VRS Covert</h2>

				<p>When you participate in any of our <strong class="primary">Storm the Course</strong> offerings between now and May 1st, you'll automatically be entered in for a chance to win a VRS Covert driver from Nike Golf. For each program, event or lesson you book, your name will be added, so the more you come, the more chances you have to win!</p>
			</div>
		</div>
	</div>

	<p class="muted"><em>* PURE Pro in black</em></p>
@endsection