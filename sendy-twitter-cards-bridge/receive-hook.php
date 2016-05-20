<?php
/*
Sample card here: https://cards.twitter.com/cards/18ce53vp1es/a7z3

This is a sample of what is posted via Twitter:

array (
  'name' 		=> 'Scott Wilcox',
  'email' 		=> 'scott@dor.ky',
  'screen_name' => 'ssx',
  'tw_userId' 	=> '92015003',
  'card' 		=> 'a7z3',
  'token' 		=> 'generated-token-from-twitter-here',
)
*/

$apiUrl = 'http://sendy.company.com';
$listId = 'list-id-here';

if (count($_POST))
{
	$opts = array(
		'http' => array(
			'method'  => 'POST',
			'header'  => 'Content-type: application/x-www-form-urlencoded',
			'content' => http_build_query(
			    array(
				    'name' 		=> $_POST["name"],
				    'email' 	=> $_POST["email"],
				    'Twitter'	=> $_POST["screen_name"],
				    'list' 		=> $listId,
				    'boolean' 	=> 'true'
			    )
			)
		)
	);

	$context  = stream_context_create($opts);
	$result = file_get_contents($apiUrl.'/subscribe', false, $context);

	// Optionally spit our the debug
	echo $result;
}
