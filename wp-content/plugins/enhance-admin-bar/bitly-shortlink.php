<?php
function bitly()
{
	$url = get_permalink(); 
	$login = get_option('enhance_admin_bar', "testwp"); 
	$apikey = get_option('enhance_admin_bar2',  "R_874b2bc04c698154b3e2485817ad7bbd"); 
	$format = 'json';	
	$version = '2.0.1';

	$bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$apikey.'&format='.$format;
	$response = file_get_contents($bitly);

	if(strtolower($format) == 'json')
	{
		$json = @json_decode($response,true);
		$short = $json['results'][$url]['shortUrl'];
	}
	else 
	{
		$xml = simplexml_load_string($response);
		$short = 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
	}
	return $short;
}
function add_admin_bar_links() {
	    global $wp_admin_bar;
		$wp_admin_bar->add_menu( array( 
		'id' => 'Bitly', 
		'title' => __('Bit.ly'), 
 		'meta' => array("onclick" => 'prompt("Bit.ly Shortlink","'.bitly().'")'),
		'href' => '#')); 
		$wp_admin_bar->add_menu( array( 
		'parent' => 'Bitly', 
		'id' => 'Bitly-link', 
		'title' => __('Bit.ly Shortlink'), 
 		'meta' => array("onclick" => 'prompt("Bit.ly Shortlink","'.bitly().'")'),
		'href' => '#')); 
		$wp_admin_bar->add_menu( array( 
		'parent' => 'Bitly', 
		'id' => 'Bitly-twitterlink', 
		'title' => __( 'Share on Twitter' ), 
		'href' => 'http://twitter.com/?status='.str_replace('+','%20', urlencode( $post->post_title.' - '.bitly()) ) ) );
		$wp_admin_bar->add_menu( array( 
		'parent' => 'Bitly', 
		'id' => 'Bitly-stats', 
		'title' => __( 'Bit.ly Stats' ), 
		'href' => bitly().'+', 
		'meta' => array('target' => '_blank') ) );
}
add_action( 'wp_before_admin_bar_render', 'add_admin_bar_links' );
