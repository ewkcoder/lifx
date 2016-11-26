<?php

## Include class

	include '../src/lifx.php';

## Change state of select lights

	$arr=array(
		'states'=>array(
			array(
				'selector'=>'id:xxxxxxxxxxx',
				'color'=>'green',
				'brightness'=>0.5,
				'duration'=>5
			)
		)
	);
	$lights=new Lifx();
	$lights->states($arr);
?>