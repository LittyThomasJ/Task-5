<?php
/**
 * Plugin Name: Sentence display
 * Description: Display sentence of an array using a shortcode to insert in a page or post
 * Plugin URI: https://www.sentence.com
 * Version: 0.1
 * Text Domain: sentence-display
 * Author: Litty Thomas
 * Author URI: https://www.sentence.com
 */
 // function for displaying senetnce
function sentence_display($atts) {
	// setting default value for attributes
	$arrshort = shortcode_atts( array(
	'post_num' => 1,
	), $atts );
	$num = $arrshort['post_num'];
	// array created
	$a=array("The cat is a domestic species of small carnivorous mammal. ","The domestic dog is a domesticated form of wolf. 		","Cattle, or cows and bulls, are the most common type of large domesticated ungulates. ","The domestic goat or simply 			goat is a subspecies of C.","Zebras are African equines with distinctive black-and-white striped coats.");
	// Randomly taking values from array
	$random_keys=array_rand($a,$num);
	// value to be displayed is initialized
	$val="<center>";
	// For loop for taking number of values specified as attributes
	for($i=0;$i<$num;$i++){
		$val .= $a[$random_keys[$i]]."<br>";
	}
	$val .= "<br><br></center>";
	// calling caption_shortcode for make the content inside span
	$returncontent = caption_shortcode($val);
	// return statement
	return $returncontent;

}
// function for making shortcode inside span....for designing
function caption_shortcode($content) {
	// making content inside span
	return '<span class="caption">' . $content . '</span>';
}
// Adding shortcodes
add_shortcode( 'caption', 'caption_shortcode' );
add_shortcode('sentence', 'sentence_display');

?>
