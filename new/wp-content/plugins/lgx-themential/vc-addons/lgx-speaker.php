<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_speaker', 'lgx_speaker_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_speaker_function($atts) {

    $id = '';
    extract(shortcode_atts(array(
        'id' 	=>	'',
    ), $atts));

    // Default Value
    $spekears_url           = '';
    $spekears_img           = '';
    $spekears_name          = '';



// Get Post By ID
    if($id != '') {

        $postSpeaker = get_post(intval($id));

        $spekears_url           = get_permalink($id);
        $spekears_img           = wp_get_attachment_image_src(get_post_thumbnail_id( $id ), true);
        $spekears_name          = $postSpeaker->post_title;
        $spekears_designation   = get_post_meta($id,'__lgx__speaker-designation',true);
        $spekears_twitter       = get_post_meta($id,'__lgx__speaker-twitter-url',true);
        $spekears_facebook      = get_post_meta($id,'__lgx__speaker-facebook-url',true);
        $spekears_instagram     = get_post_meta($id,'__lgx__speaker-instagram-url',true);
        $spekears_linkedin      = get_post_meta($id,'__lgx__speaker-linkedin-url',true);

        wp_reset_postdata();
    }

    ob_start(); ?>

    <div class="lgx-single-speaker">
        <figure>
            <a class="profile-img" href="<?php echo $spekears_url; ?>">
                <img src="<?php echo esc_url( $spekears_img[0]); ?>" alt="<?php echo $spekears_name; ?>"/>
            </a>
            <figcaption>
                <?php echo (isset($spekears_twitter) ?  '<a class="sp-tw" href="'.$spekears_twitter.'"><i class="fa fa-twitter"></i></a>' : ''); ?>
                <?php echo (isset($spekears_facebook) ?  '<a class="sp-fb" href="'.$spekears_facebook.'"><i class="fa fa-facebook"></i></a>' : ''); ?>
                <?php echo (isset($spekears_instagram) ? '<a class="sp-insta" href="'.$spekears_instagram.'"><i class="fa fa-instagram"></i></a>' : ''); ?>
                <?php echo (isset($spekears_linkedin) ?  '<a class="sp-in" href="'.$spekears_linkedin.'"><i class="fa fa-linkedin"></i></a>' : ''); ?>
            </figcaption>
        </figure>
        <div class="speaker-info">
            <h3 class="title"><a href="<?php echo $spekears_url; ?>"><?php echo $spekears_name; ?></a></h3>
            <?php echo (isset($spekears_designation) ? '<h4 class="subtitle">'.$spekears_designation.'</h4>' : '');?>
        </div>
    </div>

    <?php
    return ob_get_clean();
}


// VC Addons goes to theme