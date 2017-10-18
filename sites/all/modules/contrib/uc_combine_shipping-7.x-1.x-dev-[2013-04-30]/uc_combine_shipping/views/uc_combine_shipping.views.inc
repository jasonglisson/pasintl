<?php

/**
 * @file
 * Views hooks for uc_combine_shipping.
 */

/**
 * Implements hook_views_data().
 */
function uc_combine_shipping_views_data() {
  $data['uc_combine_shipping_products']['table']['group'] = t('Combine Shipping');

  $data['uc_combine_shipping_products']['table']['join'] = array(
    'node' => array(
      'left_field' => 'vid',
      'field' => 'vid',
    ),
    'node_revisions' => array(
      'left_field' => 'vid',
      'field' => 'vid',
    ),
    'uc_combine_shipping_groups' => array(
      'left_field' => 'group_id',
      'field' => 'group_id',
    ),
  );

  $data['uc_combine_shipping_products']['group_id'] = array(
    'title' => t('Combine Shipping Group'),
    'help' => t('Which shipping group this product belongs to.'),
    'field' => array(
      'handler' => 'views_handler_field_uc_combine_shipping_group',
      'click sortable' => TRUE,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );

  return $data;
}
