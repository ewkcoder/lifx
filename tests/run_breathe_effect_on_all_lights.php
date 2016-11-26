<?php

## Include class

	include '../src/lifx.php';

## Run breathe effect on all lights

	$arr=array(
			'selector'=>'all',
			'color'=>'green',
			'period'=>2,
			'cycles'=>2,
			'persist'=>false,
			'power_on'=>true
	);
	$lights=new Lifx();
	$lights->breathe($arr);
?>