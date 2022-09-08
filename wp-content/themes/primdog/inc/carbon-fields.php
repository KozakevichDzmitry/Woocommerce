<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make('post_meta', 'Slider')
    ->where('post_type', '=', 'district')
    ->add_fields(
        array(
            Field::make( 'complex', 'crb_slider', __( 'Slide' ) )
                ->add_fields( array(
                    Field::make( 'text', 'url', __( 'Slide url' ) ),
                    Field::make( 'image', 'image', __( 'Slide image' ) )
                        ->set_value_type( 'url' ),
                ) )
        )
    );
