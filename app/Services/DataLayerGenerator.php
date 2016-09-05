<?php
namespace AgreableKruxPlugin\Services;

use \AgreableCategoryService;
use \stdClass;

class DataLayerGenerator {
  public static function get($post, $overrides = null) {

    $categories = AgreableCategoryService::get_post_category_hierarchy($post);

    $data_layer_container = [];
    $data_layer = new stdClass();

    if (isset($post->post_type)) {
      $data_layer->type = $post->post_type;
    } else if (isset($post->taxonomy)) {
      $data_layer->type = $post->taxonomy;
    }
    $data_layer->campaign = '';
    if (isset($categories->parent) && $categories->parent->slug) {
      $data_layer->category = $categories->parent->slug;
    }

    if (isset($categories->child) && isset($categories->child->slug)) {
      $data_layer->subcategories = [$categories->child->slug];
    }

    $data_layer_container[] = $data_layer;

    return apply_filters('agreable_krux_datalayer_generator_filter', $data_layer_container);
  }
}
