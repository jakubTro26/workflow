<?php 

// disable full scren
vc_add_param( 'vc_row' , array(
      "type" => "checkbox",
      "heading" => esc_html__("Enable Inner Container","lgx-event-point"),
      "param_name" => "enable_full_screen",
	  "value" => array( esc_html__("Yes", "lgx-event-point") => 'yes') ,
      "description" => ""
));
