=== Persian Nested Show/Hide Text ===
Contributors: aboutorab
Donate link: http://smath.ir/
Tags: show, hide, content, visibility, press release, toggle, Persian
Requires at least: 4.0
Tested up to: 5.4.1
Stable tag: 1.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows you to embed shortcodes for creating nested content and toggling the visibility of the content via a link.

== Description ==
This plugin is similar to Wp-ShowHide that extended for nested shortcodes, custom style and two link toggling the content. A link is top of the content and other is below the content. By default the content is hidden and user will have to click on the the link to toggle it.
Example usage: [pshowhide id="1"]Your text is here.[/pshowhide]. The default text value is in Persian language, but you can change it.

This plugin contains four layers. External layer contains other layers. Top layer contains top link. Middle layer contains the content. Below layer contains below link.

= Usage =

1. By default, content within the pshowhide shortcode will be hidden.
2. Example: [pshowhide]Your text is here.[/pshowhide]
3. Default Values: [pshowhide id="1" more_text="+ Show Below Text"  'less_text="- Hide Below Text" less_textb="- Hide Up Text" hidden="yes"]Your text is here.[/pshowhide].

4. You can have multiple show/hide contents within a post or a page, just by having a unique id.
	Example: [pshowhide id="text1"]Your text is here.[/pshowhide]
			 [pshowhide id="text2"]Your text is here.[/pshowhide]
			 [pshowhide id="text3"]Your text is here.[/pshowhide]

5. You can have multiple nested show/hide contents within a post or a page, just by having a unique id. this plugin has other shortcode for nested show/hide text. you can also use [pshowhide1], [pshowhide2], ... , [pshowhide10] in addition [pshowhide].
	Example: [pshowhide id="text1"] Your text is here. 
	                [pshowhide1 id="text2"] Your nested text is here.
	                    [pshowhide2 id="text3"] Your nested text is here.
	                    [/pshowhide2]
	                [/pshowhide1]
	         [/pshowhide]
	
If you need more than these shortcode, you can edit plugin by changing the value of $number_of_shortcodes variable to your number you need. default value is 10.
			 
6. You can use a lot of options to change default style the shortcode. Below is the list of options you can use them with your custom value in pshowhide shortcode:

	id="text1" : this option has uniqe id for per show/hide shortcode in the content.
	more_text="+ Show Below Text" : this option is used for the more text in up link.
	less_text="- Hide Below Text" : this option is used for the less text in up link.
	less_textb="- Hide Up Text" : this option is used for the less text in down link.
	hidden="yes" or "no" : this option is used for show or hide the content when post or page is loaded.
	
	Other options is for changing styles, so you must now css command for their values.
	
	The below options is used for the external layer that contains other layers.
	
	border="1px solid #800000": this option is used for border style arround the shortcode and the content.
	padding="2px 2px 2px 2px" : this option is used for padding style arround the shortcode and the content.
	margin="1px 1px 1px 1px"  : this option is used for margin style arround the shortcode and the content.
	radius="4px 4px 4px 4px"  : this option is used for radius style arround the shortcode and the content.
	bgcolor="#ffffff" : this option is used for background color style arround the shortcode and the content.
	color="#000000"   : this option is used for text color style arround the shortcode and the content.
	add_style="" : this option is used for adding the css code to the shortcode and the content.
	style=""     : this option is used for your personal css code to the shortcode and the content. when this option is used, other css code will be disabled.
	
	The below options is similar to external layer options, but is used for the top link in pshowhide shortcode block.
	
	link_border="1px solid #800000":
	link_padding="5px 12px":
	link_margin="0px":
	link_radius="20px":
	link_bgcolor="#80BD00"
	link_color="#FFFFFF"
	link_style=""
	add_link_style=""
	bg_hover="#FFFF00"  : this option is used for change background color of top link whene you hover on it.
	text_hover="#FF0000": this option is used for change link color of top link whene you hover on it.
	
	The below options is similar to top link options, but is used for the below link in pshowhide shortcode block.
	
	linkb="off": if this option value is "off", the below link will be disable.
	linkb_border="1px solid #800000":
	linkb_padding="5px 12px":
	linkb_margin="0px":
	linkb_radius="20px":
	linkb_bgcolor="#80BD00"
	linkb_color="#FFFFFF"
	linkb_style=""
	add_linkb_style=""
	bgb_hover="#FFFF00"  : this option is used for change background color of top link whene you hover on it.
	textb_hover="#FF0000": this option is used for change link color of top link whene you hover on it.
	
	The below options is used for top layer contains top link and similar to external layer options.
	
	up_border="0px solid #ffffff"
	up_padding="0px" 
	up_margin="0px"
	up_radius="0px"
	up_bgcolor="#ffffff"
	up_color="#000000"
	add_up_style=""
	up_style=""

	The below options is used for middle layer contains the content and similar to external layer options.
	
	mid_border="0px solid #ffffff"
	mid_padding="0px" 
	mid_margin="0px"
	mid_radius="0px"
	mid_bgcolor="#ffffff"
	mid_color="#000000"
	add_mid_style=""
	mid_style=""

	The below options is used for below layer contains below link and similar to external layer options.
	
	dwn_border="0px solid #ffffff"
	dwn_padding="2px 2px 2px 2px" 
	dwn_margin="1px 1px 1px 1px"
	dwn_radius="4px 4px 4px 4px"
	dwn_bgcolor="#ffffff"
	dwn_color="#000000"
	add_dwn_style=""
	dwn_style=""
	
== Installation ==

1. Upload the 'persian-nested-showhide-text' folder to the '/wp-content/plugins/' directory.
2. Activate the plugin through the Plugins menu in WordPress.
3. Add the shortcodes to your content and enjoy it!

== Frequently Asked Questions ==
= Can I use this plugin in other language? =

Yes. This plugin is written for all language, but some default values is in Persian language that you change it by options.

= Does this plugin use JQuery? =
No in this version. perhaps at future, uses JQuery.

= Can I change the number of nested shorcode? =
Yes. You can edit plugin php file and change the value of $number_of_shortcodes variable to number you want. the default value is 10.

= Does this plugin has any restriction for usage? =
No at all. You can use it for infinity.

== Screenshots ==
1. This screen shot show the usage of shortcode in the post.
2. This screen shot show output of shortcode.

== Changelog ==
= 1.5 =
* updated for wordpress 5.4.1
= 1.4 =
* updated for wordpress 4.9.8
= 1.3 =
* updated for wordpress 4.9.6
= 1.2 =
* update translate files.
= 1.1 =
* making translate files.
= 1.0.1 =
* updated for wordpress 4.8
= 1.0 =
* Added nested shortcode for nested content.
* Added a lot of option styles.

== Upgrade Notice ==
= 1.3 =
* updated for wordpress 4.9.6
= 1.2 =
update translate files.
= 1.1 =
translate the pluging and make needed translated filed.
= 1.0.1 =
updated for wordpress 4.8
= 1.0 =
Introduce a plugin for nested show/hide content with very options for styles, and updated for wordpress 4.7