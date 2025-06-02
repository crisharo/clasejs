<?php
/**
 * "Game List" layout for Display Posts Shortcode
 *
 * @package      Daikama
 * @author       Cristian Haro
 * @since        1.0.0
 * @license      GPL-2.0+
**/
?>

<div class="dps-game bg-white-pure border-gray border-radius-5 shadow">
    <div class="preview">
        <?php 
        $icon = get_field('icon');
        if( !empty( $icon ) ): ?>
        <img src="<?php echo esc_url($icon['url']); ?>" title="<?php echo esc_attr($icon['alt']); ?>" alt="img" draggable="false">
        <?php endif; ?>
    </div>
    <div class="data">
        <div class="game-title">
            <a href="<?php the_permalink(); ?>">
            <?php the_title()?>
            </a>
        </div>
        <div class="game-system">
            <?php
                $field = get_field_object('system');
                $systems = $field['value'];
                if( $systems ): ?>
                    <ul>
                        <?php foreach( $systems as $system ): ?>
                            <li>
                                <span class="color-<?php echo $field['choices'][ $system ]; ?>">
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
            <?php endif; ?>
        </div>
    </div>                
</div>