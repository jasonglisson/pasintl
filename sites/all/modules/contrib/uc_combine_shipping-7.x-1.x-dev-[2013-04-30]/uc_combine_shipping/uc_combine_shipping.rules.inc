<?php

/**
 * @file
 * Rules hooks for uc_combine_shipping.module.
 */

/**
 * Implements hook_rules_condition_info().
 */
function uc_combine_shipping_rules_condition_info() {
  return array(
    'uc_combine_shipping_condition_order_shipping_method' => array(
      'label' => t("Method belongs to the currently processed combine shipping group"),
      'group' => t('Order: Shipping Quote'),
      'base' => 'uc_combine_shipping_condition_order_shipping_method',
      'parameter' => array(
        'order' => array('type' => 'uc_order', 'label' => t('Order')),
        'method' => array('type' => 'text', 'label' => t('Shipping method'), 'options list' => 'uc_combine_shipping_condition_order_shipping_method_options'),
      ),
    ),
  );
}

/**
 * Checks whether the given method belongs to the proper shipping group
 * @see _uc_combine_shipping_get_combined_order()
 */
function uc_combine_shipping_condition_order_shipping_method($order, $method) {
  if (isset($order->uc_combine_shipping_group_id)) {
    $method_group_id = _uc_combine_shipping_get_group_id($method);
    if ($method_group_id>0) {
      // enable methods that belong to the proper group
      return $order->uc_combine_shipping_group_id == $method_group_id;
    }
    else {
      // disable methods that belong to the default group
      return FALSE;
    }
  }
  // enable all quotes if combine shipping group id is not present
  return TRUE;
}

/**
 * Options callback.
 */
function uc_combine_shipping_condition_order_shipping_method_options() {
  $methods = module_invoke_all('uc_shipping_method');
  $enabled = variable_get('uc_quote_enabled', array());

  $options = array();
  foreach ($methods as $id => $method) {
    $options[$id] = $method['title'];
    if (!isset($enabled[$id]) || !$enabled[$id]) {
      $options[$id] .= ' ' . t('(disabled)');
    }
  }

  return $options;
}
