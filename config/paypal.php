<?php
return array(
/** set your paypal credential **/
'client_id' =>'AZYe4WoVyTl7Lm0aZV8Vw6HQ5XrrKQslUbEYvihhPHvm6SjhD-XOC7y5RLDj-pLZl7uPk6a2FaCVhpl3',
'secret' => 'EFOoKKR9iwu9-cIYg5n8TW06ffnMQF7PWkSkQNPspM9k7P7p54a6HH9bqhs6Lje1J0eP6kgPGgY4WdTb',
/**
* SDK configuration
*/
'settings' => array(
	/**
	* Available option 'sandbox' or 'live'
	*/
	'mode' => 'sandbox',
	/**
	* Specify the max request time in seconds
	*/
	'http.ConnectionTimeOut' => 1000,
	/**
	* Whether want to log to a file
	*/
	'log.LogEnabled' => true,
	/**
	* Specify the file that want to write on
	*/
	'log.FileName' => storage_path() . '/logs/paypal.log',
	/**
	* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
	*
	* Logging is most verbose in the 'FINE' level and decreases as you
	* proceed towards ERROR
	*/
	'log.LogLevel' => 'FINE'
	),
);
