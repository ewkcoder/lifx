<?php

## Include class

	include '../src/lifx.php';

## Change state of all lights

	$arr=array(
		'power'=>'on',
		'color'=>'red',
		'brightness'=>0.5,
		'duration'=>5
	);
	$lights=new Lifx("YOUR_API_TOKEN");
	$lights->states($arr);
?>