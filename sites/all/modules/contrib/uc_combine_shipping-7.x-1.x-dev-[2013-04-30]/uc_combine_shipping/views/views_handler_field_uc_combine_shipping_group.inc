<?php
/**
 * @file
 * Views hooks for uc_combine_shipping.
 */

/**
 * Field handler to allow displaying shipping group
 *
 * @ingroup views_field_handlers
 */
class views_handler_field_uc_combine_shipping_group extends views_handler_field {

  function render($values) {
    $value = $this->get_value($values);
    $name = t('Default');
    // @todo improve this when time permits
    $result = db_query("SELECT group_name FROM {uc_combine_shipping_groups} WHERE group_id=:group_id", array(':group_id' => $value));
    foreach ($result as $record) {
      $name = $record->group_name;
    }
    return check_plain($name);
  }
}
