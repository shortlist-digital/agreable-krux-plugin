<?php namespace AgreableKruxPlugin;

/** @var \Herbert\Framework\Panel $panel */

$args = array(
  /* (string) The title displayed on the options page. Required. */
  'page_title' => 'Krux Configuration',
  'menu_title' => 'Krux',
  'menu_slug' => 'krux-configuration',
  'capability' => 'manage_options',
  'position' => false,
  'parent_slug' => '',
  'icon_url' => 'dashicons-chart-area',
  'redirect' => true,
  'post_id' => 'krux-configuration',
  'autoload' => false,
);

acf_add_options_page($args);

if( function_exists('acf_add_local_field_group') ):

$acf_key = 'krux';

acf_add_local_field_group(array (
	'key' => $acf_key . '_configuration',
	'title' => 'Krux Configurations',
	'fields' => array (
    array (
      'key' => $acf_key . '_site_name',
      'label' => 'Krux Site Name',
      'name' => $acf_key . '_site_name',
      'type' => 'text',
      'instructions' => 'The Site Name exactly as it appears in Krux e.g. Best Beauty',
      'placeholder' => 'e.g. Best Beauty',
    ),
		array (
			'key' => $acf_key . '_site_id',
			'label' => 'Krux Site ID',
			'name' => $acf_key . '_site_id',
			'type' => 'text',
			'instructions' => 'The Site ID setup with Krux e.g. q1eyf920p',
			'placeholder' => 'e.g. q1eyf920p',
		),
	),
	'location' => array (
		array (
			array (
        'param' => 'options_page',
				'operator' => '==',
				'value' => 'krux-configuration',
			),
		),
	),
	'menu_order' => 12,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
));

endif;
