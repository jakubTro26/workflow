<?php
add_action( 'cmb2_init', 'lgx_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function lgx_group_field_metabox() {

    // Start with an underscore to hide fields from custom fields list
    $prefix    = '__lgx__';


    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => $prefix . 'lgx-metabox',
        'title'        => __( 'Repeating Pricing Table List Field', 'lgx-event-point' ),
        'object_types' => array( 'pricing' ),
    ) );


    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_field_id = $cmb_group->add_field( array(
        'id'          => $prefix . 'pricing-group',
        'type'        => 'group',
        'description' => __( 'Add Table Information', 'lgx-event-point' ),
        'options'     => array(
            'group_title'   => __( 'List Text {#}', 'lgx-event-point' ), // {#} gets replaced by row number
            'add_button'    => __( 'Add New Line', 'lgx-event-point' ),
            'remove_button' => __( 'Remove Entry', 'lgx-event-point' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    /**
     * Group fields works the same, except ids only need
     * to be unique to the group. Prefix is not needed.
     *
     * The parent field's id needs to be passed as the first argument.
     */
    $cmb_group->add_group_field( $group_field_id,
        array(
            'name'       => __( 'List Text', 'lgx-event-point' ),
            'id'         => $prefix .'pricing-list-text',
            'type'       => 'text',
            'repeatable' => false, // Repeatable fields are supported w/in repeatable groups (for most types)
        )
    );

    $cmb_group->add_group_field( $group_field_id,
        array(
            'name'    =>  __('List Style', 'lgx-themential'),
            'id'      => $prefix . 'pricing-list-style',
            'type'    => 'radio_inline',
            'options' => array(
                'yes' => __( 'Yes', 'lgx-themential' ),
                'no'   => __( 'No', 'lgx-themential' ),
            ),
            'default' => 'yes',
        )
    );

}