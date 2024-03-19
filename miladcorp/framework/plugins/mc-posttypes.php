<?php 

add_action( 'init', 'mc_register_types');

function mc_register_types()
{
	register_post_type( 'portfolio', array(
		'labels'  => array(
			'name'  => __( 'Anli', 'mcorp' ),

		), 

		'public'  => true,
		'has_archive'  => true,
		'show_in_rest'  => true,
		'taxonomies'  => array('post_tag'),
		'supports'  => array('title','editor','thumbnail','excerpt')


	));
}