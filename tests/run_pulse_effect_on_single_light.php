<?

## Include class

	include '../src/lifx.php';

## Run pulse effect on single light

	$arr=array(
			'selector'=>'id',
			'color'=>'red',
			'from_color'=>'blue', 
			'period'=>2,
			'cycles'=>2,
			'persist'=>false,
			'power_on'=>true
	);
	$lights=new Lifx();
	$lights->pulse($arr);	
?>
