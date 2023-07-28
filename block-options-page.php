<?php
/**
 * Options to admin.
 *
 * @package asteriski-sponsors
 */
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Initialize Carbon Fields options page.
 */
function asteriski_sponsor_options(): void
{
	// Add second options page under 'Basic Options'.
	Container::make( 'theme_options', __( 'Sponsors', 'asteriski-sponsors' ) )
		     ->set_icon( 'dashicons-carrot' )
			 ->set_page_menu_position( 10 )
			 ->set_page_file( 'sponsor-options' )
			 ->add_fields(
				 array(
					 Field::make( 'text', 'main_sponsor_name', __( 'Main Sponsor Name', 'asteriski-sponsors' ) ),
					 Field::make( 'text', 'main_sponsor_link', __( 'Main Sponsor Website', 'asteriski-sponsors' ) ),
					 Field::make( 'image', 'main_sponsor_image', __( 'Main Sponsor Logo', 'asteriski-sponsors' ) ),
					 Field::make( 'complex', 'asteriski_sponsors', __( 'Sponsor', 'asteriski-sponsors' ) )
						  ->add_fields(
							  array(
								  Field::make( 'text', 'sponsor_name', __( 'Sponsor Name', 'asteriski-sponsors' ) ),
								  Field::make( 'text', 'sponsor_link', __( 'Sponsor Website', 'asteriski-sponsors' ) ),
								  Field::make( 'image', 'sponsor_image', __( 'Sponsor Logo', 'asteriski-sponsors' ) ),
							  )
						  ),
				 )
			 );
}
add_action( 'carbon_fields_register_fields', 'asteriski_sponsor_options' );
