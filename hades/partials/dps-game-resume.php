<?php
/**
 * "Resume" layout for Display Posts Shortcode
 *
 * @package      Daikama
 * @author       Cristian Haro
 * @since        1.0.0
 * @license      GPL-2.0+
**/
?>
<div id="post-<?php the_ID(); ?>" class="dps-resume display-vertical">

    <div class="dps-game-resume">
        <div class="info">
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
        <div class="screenshots">
            <div class="screenshots-list">
                <?php
                $screenshots = array(
                    get_field('screenshot_1'),
                    get_field('screenshot_2'),
                    get_field('screenshot_3')
                );
                foreach ($screenshots as $screenshot) :
                    if ($screenshot) : ?>
                        <div>
                            <img src="<?php echo esc_url($screenshot['url']); ?>" 
                                alt="<?php echo esc_attr($screenshot['alt'] ?: get_the_title() . ' screenshot'); ?>"
                                class="screenshot"
                                loading="lazy"
                                itemprop="screenshot">
                        </div>
                    <?php endif;
                endforeach; ?>
            </div>
        </div>
    </div>
</div>