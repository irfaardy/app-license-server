<?php 
	return [ 

	/*
    |--------------------------------------------------------------------------
    | License Route
    |--------------------------------------------------------------------------
    |
    | Set route for checking serial number.
    | https://yoursite.com/check/license
    |
    */
	'license_route'		=> '/check/license',

	/*
    |--------------------------------------------------------------------------
    | Route name
    |--------------------------------------------------------------------------
    |
    | Set route name for checking serial number.
    |
    */
	'route_name'		=> 'check_license',

	/*
    |--------------------------------------------------------------------------
    | Character Type
    |--------------------------------------------------------------------------
    |
    | Set character type for serial number.
    | alphanumeric	: AB12-CD34-XY09-ZY55
    | numeric       : 1234-4321-1357-2468
    | alphabet      : ABCD-EFGH-IJKL-MNOP
    |
    */

	'char_type'			=> 'alphanumeric', //Type alphanumeric

	/*
    |--------------------------------------------------------------------------
    | Serial Config
    |--------------------------------------------------------------------------
    |
    | length	: length for one segment
    | segment 	: segment amount for Serial number 
    | striped 	: striped segment for serial
    |
    */
		'length'			=> 4,//default : 4

		'segment'			=> 4,//default : 4

		'striped'			=> true,//default : true



];
