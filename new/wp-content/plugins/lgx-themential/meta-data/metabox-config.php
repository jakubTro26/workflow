<?php
/**
 * LGX  Meta Box Config
 *
 * Include and setup custom meta boxes and fields. (make sure you copy this file to outside the CMB directory)
 */


if (file_exists(__DIR__ . '/cmb2/init.php')) {
	require_once __DIR__ . '/cmb2/init.php';
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool   True if metabox should show
 */


function cmb2_hide_if_no_cats($field)  {
	// Don't show this field if not in the cats category
	if (!has_tag('cats', $field->object_id)) {
		return false;
	}
	return true;
}

/************************************************************************
 * Simple Meta Field
 *************************************************************************/

include_once( '_simple-meta-field.php');

/************************************************************************
 * Group Meta Field
 *************************************************************************/

include_once( '_group-meta-field.php');


