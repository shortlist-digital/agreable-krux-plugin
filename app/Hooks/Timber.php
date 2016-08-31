<?php namespace AgreableKruxPlugin\Hooks;

use stdClass;

class Timber {
 function __construct() {
    add_filter('timber/loader/paths', array($this, 'add_timber_paths'));
    add_filter('timber_context', array($this, 'add_to_context'));
  }

  public function add_timber_paths($paths){
    $herbert_config = include __DIR__ . '/../../herbert.config.php';

    array_push($paths, ['AgreableKruxPlugin' => __DIR__ . '/../../resources/views']);
    return $paths;
  }

  public function add_to_context($context) {
    $context['krux_plugin'] = new stdClass();

    $context['krux_plugin']->site_id = get_field('krux_site_id', 'krux-configuration');
    $context['krux_plugin']->site_name = get_field('krux_site_name', 'krux-configuration');

    return $context;
  }

}
