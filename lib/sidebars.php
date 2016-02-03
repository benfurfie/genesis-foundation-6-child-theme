<?php
genesis_register_sidebar( array(
	'id'          => 'front-page-1',
	'name'        => __( 'Front Page 1', 'foundation' ),
	'description' => __( 'This is the front page 1 section.', 'foundation' ),
) );

genesis_register_sidebar( array(
	'id'          => 'hero',
	'name'        => __( 'Hero', 'foundation' ),
	'description' => __( 'This is the hero section.', 'foundation' ),
) );

genesis_register_sidebar( array(
	'id'          => 'content',
	'name'        => __( 'Content', 'foundation' ),
	'description' => __( 'This is the content section of the front page.', 'foundation' ),
) );

genesis_register_sidebar( array(
	'id'          => 'above_footer',
	'name'        => __( 'Above Footer', 'foundation' ),
	'description' => __( 'This is the above footer section.', 'foundation' ),
) );
