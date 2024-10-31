<?php
/*
Plugin Name: Persian Nested Show/Hide Text
Plugin URI: http://smath.ir/pshowhide
Description: A plugin for Show/Hide nested text in the post or page and toggleing the visibility of the content via a link.
Author: Aboutorab Pourhaghani
Author URI: http://aboutorab.ir/
Version: 1.5
License: GPLv2 or later
Text Domain: pshowhidelang
Domain Path: /languages
*/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////// Protect the plugin from external access //////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ( ! defined( 'ABSPATH' ) ) {
	die( 'dont access this file directly' );
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////// Added Function: Short Code For Inserting Into Post ///////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$number_of_shortcodes = 10;   // The number of shortcodes for nested text. This must be an integer and >= 1

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

for ($i = 1; $i <= $number_of_shortcodes; $i++) {
	$othershortcodes = 'pshowhide' . $i;
    add_shortcode( $othershortcodes , 'pshowhide_shortcode' );
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////// Adding language files //////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_action('plugins_loaded', 'pshowhide_init');
function pshowhide_init() {
	load_plugin_textdomain( 'pshowhidelang', false, dirname( plugin_basename( __FILE__ ) ).'/languages' );
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////// Original Function: Short Code For Inserting Into Post////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_shortcode( 'pshowhide', 'pshowhide_shortcode' );
function pshowhide_shortcode( $atts, $content = null ) {

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////// Variables //////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$attributes = shortcode_atts( array(
		'id'               => '1',
		'more_text'        => __('+ Show Below Text', 'pshowhidelang'),
		'less_text'        => __('- Hide Below Text', 'pshowhidelang'),
		'less_textb'       => __('- Hide Up Text', 'pshowhidelang'),
		'hidden'           => 'yes',

		'border'           => '1px solid #800000',
		'padding'          => '2px 2px 2px 2px',
		'margin'           => '1px 1px 1px 1px',
		'radius'           => '4px 4px 4px 4px',
		'bgcolor'          => '',
		'color'            => '',
		'style'            => '',
		'add_style'        => '',

		'link_border'      => '1px solid #800000',
		'link_padding'     => '5px 12px',
		'link_margin'      => '0px',
		'link_radius'      => '20px',
		'link_bgcolor'     => '#80BD00',
		'link_color'       => '#FFFFFF',
		'link_style'       => '',
		'add_link_style'   => '',
		'bg_hover'         => '#FFFF00',
		'text_hover'       => '#FF0000',

		'linkb'            => '',  //////// off or not off
		'linkb_border'     => '1px solid #800000',
		'linkb_padding'    => '5px 12px',
		'linkb_margin'     => '0px',
		'linkb_radius'     => '2px',
		'linkb_bgcolor'    => '#80BD00',
		'linkb_color'      => '#FFFFFF',
		'linkb_style'      => '',
		'add_linkb_style'  => '',
		'bgb_hover'        => '#FFFF00',
		'textb_hover'      => '#FF0000',
/////////////////////////////////// up, middle and down layer format /////////////////////////////////////////////////
		'up_border'        => '0px solid #ffffff',
		'up_padding'       => '0px',
		'up_margin'        => '0px',
		'up_radius'        => '0px',
		'up_bgcolor'       => '',
		'up_color'         => '',
		'up_style'         => '',
		'add_up_style'     => '',
		
		'mid_border'       => '0px solid #ffffff',
		'mid_padding'      => '0px',
		'mid_margin'       => '0px',
		'mid_radius'       => '0px',
		'mid_bgcolor'      => '',
		'mid_color'        => '',
		'mid_style'        => '',
		'add_mid_style'    => '',
		
		'dwn_border'       => '0px solid #ffffff',
		'dwn_padding'      => '0px',
		'dwn_margin'       => '0px',
		'dwn_radius'       => '0px',
		'dwn_bgcolor'      => '',
		'dwn_color'        => '',
		'dwn_style'        => '',
		'add_dwn_style'    => ''
		//''=> '',
	), $atts );

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// More/Less Text ////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$hidden_css            = 'display: none;';
	$id_sh                 = $attributes['id'];
	$more_text             = $attributes['more_text'];
	$less_text             = $attributes['less_text'];
	$less_textb            = $attributes['less_textb'];
	$moretext              = $more_text;
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if( $attributes['hidden'] == 'no' ) {
		$hidden_css = 'display: block;';
		$moretext = $less_text;
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// style for original div tag ////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$border                = $attributes['border'];
	$padding               = $attributes['padding'];
	$margin                = $attributes['margin'];
	$radius                = $attributes['radius'];
	$inlinestyle           = $attributes['style'];
	$bgcolor               = $attributes['bgcolor'];
	$color                 = $attributes['color'];
	$add_style             = $attributes['add_style'];
	
	if ( $bgcolor != '') { $bg_color = ' background-color: '.$bgcolor.';'; }
	
	if ( $color   != '') { $color    = ' color: '.$color.';'; }
	
	if ( $inlinestyle == '' ){
		$inline_style = 'style = "border: '.$border.'; padding: '.$padding.'; margin: '.$margin.'; -webkit-border-radius: '.$radius.'; -moz-border-radius: '.$radius.'; border-radius: '.$radius.';'.$bg_color.$color.' '.$add_style.'"';
	}
	else {$inline_style = 'style = "'.$inlinestyle.'"';}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// style for original link up tag ////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$border                 = $attributes['link_border'];
	$padding                = $attributes['link_padding'];
	$margin                 = $attributes['link_margin'];
	$radius                 = $attributes['link_radius'];
	$link_bgcolor           = $attributes['link_bgcolor'];
	$link_color             = $attributes['link_color'];
	$bg_hover               = $attributes['bg_hover'];
	$text_hover             = $attributes['text_hover'];
	$inlinestyle            = $attributes['link_style'];
	$add_style              = $attributes['add_link_style'];
	if ( $inlinestyle == '' ){
		$link_style = 'style="border: '.$border.'; padding: '.$padding.'; margin: '.$margin.'; -webkit-border-radius: '.$radius.'; -moz-border-radius: '.$radius.'; border-radius: '.$radius.'; background-color: '.$link_bgcolor.'; color: '.$link_color.'; position: relative; display: inline-block; text-decoration: none;'.$add_style.'"';
	}
	else { $link_style = 'style = "'.$inlinestyle.'"'; }
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// style for original link below tag /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$border                 = $attributes['linkb_border'];
	$padding                = $attributes['linkb_padding'];
	$margin                 = $attributes['linkb_margin'];
	$radius                 = $attributes['linkb_radius'];
	$linkb_bgcolor          = $attributes['linkb_bgcolor'];
	$linkb_color            = $attributes['linkb_color'];
	$bgb_hover              = $attributes['bgb_hover'];
	$textb_hover            = $attributes['textb_hover'];
	$inlinestyle            = $attributes['linkb_style'];
	$add_style              = $attributes['add_linkb_style'];
	if ( $inlinestyle == '' ){
		$linkb_style        = 'style="border: '.$border.'; padding: '.$padding.'; margin: '.$margin.'; -webkit-border-radius: '.$radius.'; -moz-border-radius: '.$radius.'; border-radius: '.$radius.'; background-color: '.$linkb_bgcolor.'; color: '.$linkb_color.'; position: relative; display: inline-block; text-decoration: none;'.$add_style.'"';
	}
	else { $linkb_style     = 'style = "'.$inlinestyle.'"'; }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// format up middle and down layer ///////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////// up layer ////////////////////////////////////////////////////////////////////////////
	$border                 = $attributes['up_border'];
	$padding                = $attributes['up_padding'];
	$margin                 = $attributes['up_margin'];
	$radius                 = $attributes['up_radius'];
	$inlinestyle            = $attributes['up_style'];
	$bgcolor                = $attributes['up_bgcolor'];
	$color                  = $attributes['up_color'];
	$add_style              = $attributes['add_up_style'];
	
	if ( $bgcolor != '') { $bg_color = ' background-color: '.$bgcolor.';'; }
	
	if ( $color   != '') { $color    = ' color: '.$color.';'; }
	
	if ( $inlinestyle == '' ){
		$up_style           = 'style = "border: '.$border.'; padding: '.$padding.'; margin: '.$margin.'; -webkit-border-radius: '.$radius.'; -moz-border-radius: '.$radius.'; border-radius: '.$radius.';'.$bg_color.$color.' '.$add_style.'"';
	}
	else {$up_style         = 'style = "'.$inlinestyle.'"';}
//////////////////////////////// middle layer ////////////////////////////////////////////////////////////////////////
	$border                 = $attributes['mid_border'];
	$padding                = $attributes['mid_padding'];
	$margin                 = $attributes['mid_margin'];
	$radius                 = $attributes['mid_radius'];
	$inlinestyle            = $attributes['mid_style'];
	$bgcolor                = $attributes['mid_bgcolor'];
	$color                  = $attributes['mid_color'];
	$add_style              = $attributes['add_mid_style'];
	
	if ( $bgcolor != '') { $bg_color = ' background-color: '.$bgcolor.';'; }
	
	if ( $color   != '') { $color    = ' color: '.$color.';'; }
	
	if ( $inlinestyle == '' ){
		$mid_style          = 'style = "border: '.$border.'; padding: '.$padding.'; margin: '.$margin.'; -webkit-border-radius: '.$radius.'; -moz-border-radius: '.$radius.'; border-radius: '.$radius.';'.$bg_color.$color.' '.$add_style.$hidden_css.'"';
	}
	else {$mid_style        = 'style = "'.$inlinestyle.$hidden_css.'"';}
//////////////////////////////// down layer //////////////////////////////////////////////////////////////////////////
	$border                 = $attributes['dwn_border'];
	$padding                = $attributes['dwn_padding'];
	$margin                 = $attributes['dwn_margin'];
	$radius                 = $attributes['dwn_radius'];
	$inlinestyle            = $attributes['dwn_style'];
	$bgcolor                = $attributes['dwn_bgcolor'];
	$color                  = $attributes['dwn_color'];
	$add_style              = $attributes['add_dwn_style'];
	
	if ( $bgcolor != '') { $bg_color = ' background-color: '.$bgcolor.';'; }
	
	if ( $color   != '') { $color    = ' color: '.$color.';'; }
	
	if ( $inlinestyle == '' ){
		$dwn_style          = 'style = "border: '.$border.'; padding: '.$padding.'; margin: '.$margin.'; -webkit-border-radius: '.$radius.'; -moz-border-radius: '.$radius.'; border-radius: '.$radius.';'.$bg_color.$color.' '.$add_style.'"';
	}
	else {$dwn_style        = 'style = "'.$inlinestyle.'"';}
	
	if ($attributes['linkb_style'] == ''){
		$link_hover         = 'onmouseover="pshowhideover(\'toggleb-'.$id_sh.'\',\''.$bgb_hover.'\',\''.$textb_hover.'\');" onmouseout="pshowhideout(\'toggleb-'.$id_sh.'\',\''.$linkb_bgcolor.'\',\''.$linkb_color.'\');"';
	}
	else {$link_hover       = '';}
	
	if ($attributes['linkb'] == 'off'){
		$endtext            = '</div></div>';
	}
	else {
		$endtext            = '<div '.$dwn_style.'><a href="javascript:persianhidetext(\''.$id_sh.'\',\'toggle-'.$id_sh.'\',\''.$more_text.'\')" '.$link_hover.' '.$linkb_style.' id="toggleb-'.$id_sh.'">'.$less_textb.'</a></div></div></div>';}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////// Format HTML Output //////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ($attributes['link_style'] == ''){
	$link_hover = 'onmouseover="pshowhideover(\'toggle-'.$id_sh.'\',\''.$bg_hover.'\',\''.$text_hover.'\');" onmouseout="pshowhideout(\'toggle-'.$id_sh.'\',\''.$link_bgcolor.'\',\''.$link_color.'\');"';	
	} 
	else {$link_hover = '';}

	$firsttext              = '<div '.$inline_style.'><div '.$up_style.'><a href = "javascript:persianshowhidetext(\''.$id_sh.'\',\'toggle-'.$id_sh.'\',\''.$more_text.'\',\''.$less_text.'\')" '.$link_hover.' '.$link_style.' id="toggle-'.$id_sh.'">'.$moretext.'</a></div>';
	
	$middletext             = '<div id="'.$id_sh.'" '.$mid_style.'>' . do_shortcode( $content );

	return $firsttext . $middletext . $endtext;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////// Function: Add JavaScript To Footer
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_action( 'wp_footer', 'pshowhide_footer' );
function pshowhide_footer() {
//////////////// Cheking for existence of shortcode in the post. /////////////////////////////////////////////////////
//////////////// If yes, the java script codes will be add to footer, else no ////////////////////////////////////////
	global $number_of_shortcodes;
	$numofshortcodes        = $number_of_shortcodes;
	$post                   = get_post(get_the_ID());
	$pshowhidetag           = has_shortcode( $post->post_content, 'pshowhide');
	for ($i = 1; $i <= $numofshortcodes; $i++) {
		$ptag               = 'pshowhide'.$i;
		$pshowhidetag       = ($pshowhidetag or has_shortcode( $post->post_content, $ptag));
	}
	if($pshowhidetag){
		echo '
<script type="text/javascript" language="javascript">' . "\n" .
//Two below functions is used for showing and hiding text.
'	function persianshowhidetext(id,toggleid,showtextup,hidetextup){
		current=(document.getElementById(id).style.display == "none") ? "block" : "none";
		document.getElementById(id).style.display = current;' . "\n" . 
//two conditional statements is used for correct showing and hiding text in javascript link
'		if (document.getElementById(id).style.display === "none") {
		document.getElementById(toggleid).innerHTML = showtextup;
		}
		if (document.getElementById(id).style.display === "block") {
		document.getElementById(toggleid).innerHTML = hidetextup;
		}
		}
	function persianhidetext(id,toggleid,showtextup){
		document.getElementById(id).style.display = "none";
		document.getElementById(toggleid).innerHTML = showtextup;
		}' . "\n" .
// two below functions is used for hovering and exiting link.
'	function pshowhideover(toggleid, bgcolor, textcolor){
		document.getElementById(toggleid).style.backgroundColor = bgcolor;
		document.getElementById(toggleid).style.color = textcolor;
		}
	function pshowhideout(toggleid, bgcolor, textcolor){
		document.getElementById(toggleid).style.backgroundColor = bgcolor;
		document.getElementById(toggleid).style.color = textcolor;
	}
</script>
';
	}
}
?>