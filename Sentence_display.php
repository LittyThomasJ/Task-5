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
function sentence_display($atts) {
	$arrshort = extract(shortcode_atts( array(
	'post_num' => 1,), $atts ));
	$num = $arrshort['post_num'];
	//echo $num;
	$a=array("The cat is a domestic species of small carnivorous mammal. ","The domestic dog is a domesticated form of wolf. 		","Cattle, or cows and bulls, are the most common type of large domesticated ungulates. ","The domestic goat or simply 			goat is a subspecies of C.","Zebras are African equines with distinctive black-and-white striped coats.");
	$random_keys=array_rand($a,$num);
	$val="<center>";
	for($i=0;$i<$num;$i++){
		$val .= $a[$random_keys[$i]]."<br>";
	}
	$val .= "<br><br></center>";
	$returncontent = caption_shortcode($val);
	//echo $returncontent;
	return $returncontent;

}
function caption_shortcode($content) {
	return '<span class="caption">' . $content . '</span>';
}
add_shortcode( 'caption', 'caption_shortcode' );
add_shortcode('sentence', 'sentence_display');

?>
