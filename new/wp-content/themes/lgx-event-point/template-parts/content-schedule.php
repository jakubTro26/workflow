<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LGX_Event_Point
 */
$lgx_schedule_speaker_id = get_post_meta( get_the_ID(), '__lgx__schedule-speaker', true );
$lgx_schedule_speaker = new WP_Query(array('post_type' => 'speaker', 'p' => $lgx_schedule_speaker_id ));
$lgx_schedule_speaker_thumb = get_the_post_thumbnail($lgx_schedule_speaker->post->ID, 'speaker-thumb', array('class' => 'spkr'));
$lgx_schedule_desig = get_post_meta( $lgx_schedule_speaker->post->ID,'__lgx__speaker-designation',true);
$lgx_schedule_company = get_post_meta( $lgx_schedule_speaker->post->ID,'__lgx__speaker-company',true);
$lgx_schedule_time = get_post_meta( get_the_ID(),'__lgx__schedule-time',true);
$cat_array = get_the_terms( $id, 'schedule_cat' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('lgx-card-single'); ?>>
    <header>
        <div class="author">
            <a href="<?php echo esc_url(get_permalink($lgx_schedule_speaker->post->ID)); ?>"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_schedule_speaker_thumb); ?></a>
            <div class="author-info">
                <h3 class="name"><?php echo esc_html(get_the_title($lgx_schedule_speaker->post->ID)); ?></h3>
                <h5><?php printf(esc_html__('%s','lgx-event-point'),$lgx_schedule_desig); ?></h5>
                <?php if(!empty($lgx_schedule_company)): ?>
                    <h4 class="comtitle"><a href="javascript:void(0);"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_schedule_company); ?></a></h4>
                <?php endif; ?>
                <a class="follow-btn" href="<?php echo esc_url(get_permalink($lgx_schedule_speaker->post->ID)); ?>"><?php esc_html_e('Follow','lgx-event-point'); ?></a>
            </div>
        </div>
        <div class="text-area">
            <h1 class="title"><?php the_title(); ?></h1>
            <div class="hits-area">
                <span class="date"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_schedule_time); ?></span>
                <span class="date"><?php echo (!empty($cat_array[0]->description)) ? $cat_array[0]->description : '' ;?></span>
            </div>
        </div>
    </header>
    <section>
        <?php the_content(); ?>
    </section>

</article>
