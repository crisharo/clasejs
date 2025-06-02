<?php if( get_field('game_related') ): ?>
<?php
    $item_related = get_field('game_related');
    if( $item_related ): ?>

    <?php foreach( $item_related as $post ): setup_postdata($post); ?>

        <div class="game-card-mini shadow border-gray border-radius-5 bg-white">
            <div class="game-card-mini-header">
                <div class="preview">
                    <?php 
                    $icon = get_field('icon');
                    if( !empty( $icon ) ): ?>
                    <img src="<?php echo esc_url($icon['url']); ?>" title="<?php echo esc_attr($icon['alt']); ?>" alt="img" draggable="false">
                    <?php endif; ?>
                </div>
                <div class="game-card-mini-header-content">
                    <a href="<?php the_permalink(); ?>" class="game-title">
                        <?php the_title()?>
                    </a>
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
            <div class="info">
                <div class="flex-horizontal">
                    <span class="games-info-title">Region</span>
                    <div class="game-region">
                        <?php
                        $field = get_field_object('regions');
                        $regions = $field['value'];
                        if( $regions ): ?>
                            <ul>
                                <?php foreach( $regions as $region ): ?>
                                    <li><?php echo $field['choices'][ $region ]; ?></li>
                                <?php endforeach; ?>
                            </ul>
                    <?php endif; ?>
                    </div>
                </div>
                <?php $status = get_field( 'status' );
                if( !empty( $status ) ): ?>
                <span class="label color-<?php echo esc_attr($status['value']); ?>">
                <?php echo esc_html($status['label']); ?></span>
                <?php endif; ?>
            </div>
        </div>

<?php endforeach; ?>  
<?php wp_reset_postdata(); ?><?php endif; ?><?php endif;?>
