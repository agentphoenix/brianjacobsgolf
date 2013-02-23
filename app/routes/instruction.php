<?php

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
Route::get('/instruction/juniors', array('as' => 'juniors', function()
{
	return View::make('pages.instruction.juniors');
}));

/**
 * Instruction/JuniorTeam
 */
Route::get('/instruction/junior-team', array('as' => 'juniorteam', function()
{
	return View::make('pages.instruction.juniorteam');
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