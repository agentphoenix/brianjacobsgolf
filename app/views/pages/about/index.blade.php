@layout('template')

@section('title')
	Home
@endsection

@section('content')
	<h1 class="hidden-phone">Welcome to Brian Jacobs Golf</h1>
	<h1 class="visible-phone">Brian Jacobs Golf</h1>

	<p>Welcome to Brian Jacobs Golf where our mission is simple: teach golfers how to take their game to its highest potential to experience greater consistency and have more fun.</p>

	<p>We believe that the true joy for any student of the game comes from the passion to learn more about the subject, the commitment to practice and develop their golf game and the challenge to continually improve their golf and themselves. Make a commitment to yourself to get better and visit our Academy to take your game inside the ropes.</p>

	<div class="row-fluid">
		<div class="span4">
			<div class="well">
				<h3 class="primary">Private Instruction</h3>

				<p>Whether you're just getting started or are an avid golfer, we have the tools and resources to customize a program that fits your needs and will empower you to take your game to the next level. Our instructors are equipped to help you in all aspects of the game, including: club fitting, the full swing, putting, short game and on course strategy.</p>

				<div class="btn-group hidden-phone">
					<a href="{{ URL::to_route('juniors') }}" class="btn btn-primary">More Info</a>
					<a href="{{ URL::to_route('booking') }}" class="btn btn-primary">Book Now</a>
				</div>

				<div class="visible-phone">
					<a href="{{ URL::to_route('juniors') }}" class="btn btn-primary btn-block btn-large">More Info</a>
					<a href="{{ URL::to_route('booking') }}" class="btn btn-primary btn-block btn-large">Book Now</a>
				</div>
			</div>
		</div>

		<div class="span4">
			<div class="well">
				<h3 class="primary">Junior Golf</h3>

				<p>Golf has become an increasingly younger sport and something people all ages can enjoy. At Brian Jacobs Golf, we place an emphasis on education and honorable behavior, on and off the course. No matter if your child is just getting started or is already an accomplished player, we have a program to help take their game to the next level!</p>

				<div class="btn-group hidden-phone">
					<a href="{{ URL::to_route('juniors') }}" class="btn btn-primary">More Info</a>
				</div>

				<div class="visible-phone">
					<a href="{{ URL::to_route('juniors') }}" class="btn btn-primary btn-block btn-large">More Info</a>
				</div>
			</div>
		</div>

		<div class="span4">
			<div class="well">
				<h3 class="primary">Junior Academy</h3>

				<p>We are the <strong>Home of Junior Golf</strong> and the Junior Academy provides elite junior golfers the opportunity to hone their skills through 30 hours of instruction and play a week during the summer. Covering everything from the full swing to short game to rules and etiquette, this specialized academy will help your junior take their game inside the ropes.</p>

				<div class="btn-group hidden-phone">
					<a href="{{ URL::to_route('junioracademy') }}" class="btn btn-primary">More Info</a>
				</div>

				<div class="visible-phone">
					<a href="{{ URL::to_route('junioracademy') }}" class="btn btn-primary btn-block btn-large">More Info</a>
				</div>
			</div>
		</div>
	</div>

	<?php foreach ($announcements as $a): ?>
		<?php if ($now >= $a['start'] and $now < $a['end']): ?>
			<h3>{{ $a['title'] }}</h3>

			<?php if (isset($a['image'])): ?>
				<a href="{{ $a['link'] }}" target="_blank" class="pull-right"><img src="{{ URL::to_asset($a['image']) }}" alt=""></a>
			<?php endif;?>

			{{ $a['content'] }}
		<?php endif;?>
	<?php endforeach;?>
@endsection