<?php
/*
 * Name: Separator
 * Section: content
 * Description: Separator
 * 
 */

/* @var $options array */
/* @var $wpdb wpdb */

$default_options = array(
    'color'=>'#dddddd',
    'height'=>1,
    'block_padding_top'=>'20px',
    'block_padding_bottom'=>'20px'
    
);

$options = array_merge($default_options, $options);

?>


<table border="0" cellpadding="0" align="center" cellspacing="0" width="100%">
    <tr>
        <td style="border-bottom: <?php echo $options['height'] ?>px solid <?php echo $options['color'] ?>;"></td>
    </tr>
</table>