lifx is a PHP package for the LIFX HTTP API.

The author is not affiliated with LIFX and LIFX is not involved in the development of this package.


## Synopsis

This wrapper allows users to execute basic calls to the LIFX HTTP REST API through PHP.  

## Code Example

``` php
$arr=array(
	'power'=>'on',
	'color'=>'red',
	'brightness'=>0.5,
	'duration'=>5
);
$lights=new Lifx();
$lights->states($arr);
```

## Motivation

This project was started as a means for communicating results in a PHP/MySQL web portal to the physical world via a light bulb. 

## Installation

1. Sign up via app and connect light(s).
2. Sign in to LIFX Cloud (https://cloud.lifx.com/sign_in)
3. Click email in top right and then click settings.
4. Generate new API token
5. include "lifx.php" in your PHP script & create object.

``` php
include "lifx.php"
```

``` php
//Pass in API token
$lights=new Lifx("YOUR_API_KEY");

//Or set API token in lifx.php class
$lights=new Lifx();
```


## API Reference

Refer to the LIFX API documentation for additional help.

https://api.developer.lifx.com/docs/



## Contributors

This is open for anyone to contribute.  It is pretty basic but I am looking at making a mashup of this with the Alexa Voice Service API.  


## Credits

- [Gene Kelly](https://github.com/ewkcoder)
- [All Contributors][link-contributors]


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.