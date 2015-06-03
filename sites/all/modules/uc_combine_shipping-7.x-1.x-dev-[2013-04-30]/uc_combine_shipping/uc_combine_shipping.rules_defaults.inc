<?php

/**
 * @file
 * Rules configurations for uc_usps module.
 */

/**
 * Implements hook_default_rules_configuration_alter().
 */
function uc_combine_shipping_default_rules_configuration_alter(&$configs) {
  if (!is_array($configs)  || !count($configs)) {
    return;
  }
  foreach ($configs as $id => $config) {
    if (preg_match('/^get_quote_from_(.+)$/', $id, $matches)) {
      $method_id = $matches[1];
      $condition = rules_condition('uc_combine_shipping_condition_order_shipping_method', array('data:select' => 'order', 'method' => $method_id));
      $configs[$id]->condition($condition);
    }
  }
}
