<?php
namespace AgreableKruxPlugin\Services;

use \AgreableCategoryService;
use \stdClass;

class DataLayerGenerator {
  public static function get($post, $overrides = null) {


    $categories = AgreableCategoryService::get_post_category_hierarchy($post);

    $data_layer_container = [];
    $data_layer = new stdClass();
    $data_layer->type = $data_layer->articleType = 'article';
    $data_layer->sub_type = $post->post_type;
    if (isset($categories->parent) && $categories->parent->slug) {
      $data_layer->section = $categories->parent->slug;
    }

    if (isset($categories->child) && isset($categories->child->slug)) {
      $data_layer->subsections = [$categories->child->slug];
    }

    $data_layer_container[] = $data_layer;

    return apply_filters('agreable_krux_datalayer_generator_filter', $data_layer_container);
  }
}
