<?php

/**
 * About/Index
 */
Route::get('/', array('as' => 'home', function()
{
	// Announcements
	$announcements = array(
		array(
			'start'		=> Carbon\Carbon::create(2013, 1, 4, 0, 0, 0),
			'end'		=> Carbon\Carbon::create(2013, 2, 4, 0, 0, 0),
			'image'		=> 'img/powertrain.png',
			'link'		=> 'http://powertrainsports.com',
			'title'		=> "Brian Jacobs and Power Train Sports Rochester",
			'content'	=> "<p>The Brian Jacobs Golf Academy is proud to introduce <a href='http://www.powertrainsports.com/' target='_blank'>Power Train Sports Rochester</a> as our official Strength and Conditioning Program. Brian Jacobs' legacy within the golf community paired with the strength and conditioning knowledge of Power Train Sports is an elite tandem for adults and juniors looking to take their golf game to the next level.</p>"),
		array(
			'start'		=> Carbon\Carbon::create(2013, 2, 4, 0, 0, 0),
			'end'		=> Carbon\Carbon::create(2013, 3, 4, 0, 0, 0),
			'image'		=> 'img/eyeline.png',
			'link'		=> 'http://www.eyelinegolf.com/',
			'title'		=> "Brian Jacobs and Eyeline Golf",
			'content'	=> "<p><a href='http://www.eyelinegolf.com/' target='_blank'>Eyeline Golf</a> has joined Brian Jacobs Golf as the official provider to the Brian Jacobs Golf Academy of short game training aids. Since 2002, Eyeline Golf products have been helping golfers unlock their potential in addition have been the #1 Training aid company on the Pro Tours (247 Tour Players chose EyeLine in 2011 - PGA, LPGA, Nationwide). Let Brian Jacobs Golf Academy and Eyeline Golf unlock <em>your</em> potential and take your game inside the ropes!</p>"),
		array(
			'start'		=> Carbon\Carbon::create(2013, 5, 1, 0, 0, 0),
			'end'		=> Carbon\Carbon::create(2013, 6, 1, 0, 0, 0),
			'title'		=> "Brian Jacobs Golf Welcomes Apprentice Instructor",
			'content'	=> "<p>Brian Jacobs Golf is pleased to announce the arrival of Nick DiDuro as an apprentice instructor over the cource of the summer. Nick is currently a student in the Professional Golf Management program at Coastal Carolina. Nick's full bio is available on the <a href='".URL::to_route('staff')."'>staff page</a>.</p>"),
	);

	return View::make('pages.about.index')
		->with('now', Carbon\Carbon::now())
		->with('announcements', $announcements);
}));

/**
 * About/Brian
 */
Route::get('/about/brian', array('as' => 'about', function($num = 1)
{
	return View::make('pages.about.brian');
}));

/**
 * About/Staff
 */
Route::get('/about/staff', array('as' => 'staff', function($num = 1)
{
	return View::make('pages.about.staff');
}));

/**
 * About/Relationships
 */
Route::get('/about/relationships', array('as' => 'relationships', function($num = 1)
{
	return View::make('pages.about.relationships');
}));

/**
 * About/Testimonials
 */
Route::get('/about/testimonials', array('as' => 'testimonials', function($num = 1)
{
	return View::make('pages.about.testimonials');
}));

/**
 * Instruction/Index
 */
Route::get('/instruction/index', array('as' => 'instruction', function()
{
	return View::make('pages.instruction.philosophy');
}));

/**
 * Instruction/Private
 */
Route::get('/instruction/private', array('as' => 'private', function()
{
	// Get the current time
	$now = Carbon\Carbon::now();

	// Start of winter instruction
	$start = Carbon\Carbon::create(2012, 11, 1, 0, 0, 0);

	// End of winter instruction
	$end = Carbon\Carbon::create(2013, 4, 10, 0, 0, 0);

	// Set the proper view based on today's date
	$view = ($now->gte($start) and $now->lt($end)) 
		? 'pages.instruction.winterprivate' 
		: 'pages.instruction.private';

	return View::make($view);
}));

/**
 * Instruction/Schools
 */
Route::get('/instruction/schools', array('as' => 'schools', function()
{
	return View::make('pages.instruction.schools');
}));

/**
 * Instruction/Juniors
 */
Route::get('/instruction/junior-team', array('as' => 'juniorteam', function()
{
	return View::make('pages.instruction.juniors');
}));

/**
 * Instruction/JuniorCamp
 */
Route::get('/instruction/junior-camps', array('as' => 'juniorcamps', function()
{
	return View::make('pages.instruction.juniorcamp');
}));

/**
 * Instruction/Linksters
 */
Route::get('/instruction/linksters', array('as' => 'linksters', function()
{
	return View::make('pages.instruction.linksters');
}));

/**
 * Instruction/Clinics
 */
Route::get('/instruction/clinics', array('as' => 'clinics', function()
{
	return View::make('pages.instruction.clinics');
}));

/**
 * Instruction/Booking
 */
Route::get('/instruction/booking/(:any?)/(:any?)', array('as' => 'booking', function($type = false, $id = false)
{
	switch ($type)
	{
		case 'event':
			$link = '?View=EventDetails&eventid='.$id;
		break;
		
		default:
			$link = '?View=bookapt';
		break;
	}

	return View::make('pages.instruction.booking')
		->with('link', $link);
}));

/**
 * Contact
 */
Route::get('/contact/(:any?)/(:any?)', array('as' => 'contact', function($topic = 'general', $sub = false)
{
	$contactTitle = ': ';

	switch ($topic)
	{
		case 'advocare':
			$contactTitle.= 'AdvoCare';
		break;

		case 'eyeline':
			$contactTitle.= 'Eyeline Golf';
		break;

		case 'schools':
			$contactTitle.= 'Golf Schools';
		break;

		case 'clinics':
			$contactTitle.= 'Golf Clinics';
		break;

		case 'winter-lessons':
			$contactTitle.= 'Winter Instruction';
		break;
		
		default:
			$contactTitle = '';
		break;
	}

	return View::make('pages.contact.index')
		->with('topic', $topic)
		->with('sub', $sub)
		->with('contactTitle', $contactTitle);
}));
Route::post('/contact/(:any?)/(:any?)', function($topic = 'general', $sub = false)
{
	// Start the Messages bundle
	Bundle::start('messages');

	// Set the second part of the subject
	switch (Input::get('subject'))
	{
		case 'Private Instruction':
			$subject = 'Private Instruction Information Request';
		break;

		case 'AdvoCare':
			$subject = 'AdvoCare Information Request';
		break;

		case 'Eyeline':
			$subject = 'EyeLine Golf Information Request';
		break;
		
		default:
			$subject = Input::get('subject');
		break;
	}

	// Set the message
	$message = Input::get('message');

	// Set the contact title
	$contactTitle = ': ';

	switch ($topic)
	{
		case 'advocare':
			$contactTitle.= 'AdvoCare';
		break;

		case 'eyeline':
			$contactTitle.= 'Eyeline Golf';
		break;

		case 'schools':
			$contactTitle.= 'Golf Schools';
		break;

		case 'clinics':
			$contactTitle.= 'Golf Clinics';
		break;

		case 'winter-lessons':
			$contactTitle.= 'Winter Instruction';
		break;
		
		default:
			$contactTitle = '';
		break;
	}

	// Create a new object for the flash info
	$flash = new stdClass;

	// Set the validation rules
	$rules = array(
		'name'			=> 'required',
		'emailAddress'	=> 'email|required',
		'message'		=> 'required'
	);

	if ($topic == 'schools')
	{
		// Add the school requirements
		$rules['schoolAttend'] = 'required';
		$rules['schoolDate'] = 'required';
		$rules['schoolDay'] = 'required';

		// Remove the message requirement
		unset($rules['message']);

		// Change the subject
		$subject = 'Golf Schools Information Request';

		// Change the message
		$message = "<strong>Name:</strong> ".Input::get('name')."\r\n";
		$message.= "<strong>Email Address:</strong> ".Input::get('emailAddress')."\r\n\r\n";

		$message.= "<strong>Golf School:</strong> ".Input::get('schoolAttend')."\r\n";
		$message.= "<strong>Preferred Date:</strong> ".Input::get('schoolDate')."\r\n";
		$message.= "<strong>Preferred Day:</strong> ".Input::get('schoolDay')."\r\n\r\n";

		$message.= "<strong>How did you hear about us</strong>\r\n".Input::get('schoolHearAbout')."\r\n\r\n";
		$message.= "<strong>Additional Comments</strong>\r\n".Input::get('schoolComments');
	}

	if ($topic == 'clinics')
	{
		// Add the school requirements
		$rules['clinicProgram'] = 'required';
		$rules['clinicDate'] = 'required';
		$rules['clinicDay'] = 'required';

		// Remove the message requirement
		unset($rules['message']);

		// Change the subject
		$subject = 'Clinic Program Information Request';

		// Change the message
		$message = "<strong>Name:</strong> ".Input::get('name')."\r\n";
		$message.= "<strong>Email Address:</strong> ".Input::get('emailAddress')."\r\n\r\n";

		$message.= "<strong>Clinic Material:</strong> ".Input::get('clinicProgram')."\r\n";
		$message.= "<strong>Preferred Date:</strong> ".Input::get('clinicDate')."\r\n";
		$message.= "<strong>Preferred Day:</strong> ".Input::get('clinicDay')."\r\n\r\n";

		$message.= "<strong>How did you hear about us</strong>\r\n".Input::get('clinicHearAbout')."\r\n\r\n";
		$message.= "<strong>Additional Comments</strong>\r\n".Input::get('clinicComments');
	}

	if ($topic == 'eyeline')
	{
		// Add the eyeline requirements
		$rules['product'] = 'required';

		// Change the message
		$message = "<strong>Name:</strong> ".Input::get('name')."\r\n";
		$message.= "<strong>Email Address:</strong> ".Input::get('emailAddress')."\r\n\r\n";

		$message.= "<strong>Product:</strong> ".Input::get('product')."\r\n\r\n";

		$message.= "<strong>Message</strong>\r\n".Input::get('message');
	}

	if ($topic == 'winter-lessons')
	{
		// Add the eyeline requirements
		$rules['winterInstructionProgram'] = 'required';

		// Remove the message requirement
		unset($rules['message']);

		// Change the subject
		$subject = 'Winter Private Instruction Booking Request';

		// Change the message
		$message = "<strong>Name:</strong> ".Input::get('name')."\r\n";
		$message.= "<strong>Email Address:</strong> ".Input::get('emailAddress')."\r\n\r\n";

		$message.= "<strong>Package to Book:</strong> ".Input::get('winterInstructionProgram')."\r\n\r\n";

		$message.= "<strong>Comments</strong>\r\n".Input::get('winterInstructionComments');
	}

	// Create a new validator for the contact form
	$validation = Validator::make(Input::all(), $rules);

	// Check the form against the rules
	if ($validation->fails())
	{
		return Redirect::to('contact/'.$topic.'/'.$sub)->with_errors($validation);
	}
	else
	{
		// Send the message
		$message = Message::to('bjacobs1@rochester.rr.com')
			->from(Input::get('emailAddress'), Input::get('name'))
			->subject('[Brian Jacobs Golf] '.$subject)
			->body(nl2br($message))
			->html(true)
			->send();

		// Set the flash info
		$flash->status = ($message->was_sent()) ? 'info' : 'error';
		$flash->message = ($message->was_sent()) ? 'Thank you for your message. Someone will respond to you soon!' : 'There was a problem sending your message. Please try again.';
	}

	return View::make('pages.contact.index')
		->with('flash', $flash)
		->with('topic', $topic)
		->with('sub', $sub)
		->with('contactTitle', $contactTitle);
});

/**
 * Event/Amelia-Island
 */
Route::get('/event/amelia-island', array('as' => 'event-amelia-island', function()
{
	return View::make('pages.events.amelia-island');
}));

/**
 * Event/Storm-the-Course
 */
Route::get('/event/storm-the-course', array('as' => 'event-storm', function()
{
	return View::make('pages.events.storm-the-course');
}));

/**
 * Event/4-Elements
 */
Route::get('/event/4-elements', array('as' => 'event-elements', function()
{
	return View::make('pages.events.the-four-elements');
}));

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});