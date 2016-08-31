<?php namespace AgreableKruxPlugin\Hooks;

use Timber;
use AgreableKruxPlugin\Services\DataLayerGenerator;

class Krux {

  function __construct() {
    \add_action('wp_head', array($this, 'add_krux_tag'), 10, 0);
    \add_action('wp_head', array($this, 'add_krux_datalayer'), 10, 0);
  }

  public function add_krux_tag() {
    $context = Timber::get_context();

    $krux_tag_string = Timber::fetch('@AgreableKruxPlugin/krux-tag.twig', $context, false);
    echo apply_filters('agreable_krux_tag_string_filter', $krux_tag_string);
  }

  public function add_krux_datalayer() {
    global $post;
    if (!$post) {
      throw new \Exception('global $post is not set for Krux datalayer to function');
    }

    $context = Timber::get_context();

    $context['data_layer'] = json_encode(DataLayerGenerator::get($post));
    $krux_datalayer_string = Timber::fetch('@AgreableKruxPlugin/datalayer.twig', $context, false);

    echo apply_filters('agreable_krux_data_layer_string_filter', $krux_datalayer_string);
  }
}
