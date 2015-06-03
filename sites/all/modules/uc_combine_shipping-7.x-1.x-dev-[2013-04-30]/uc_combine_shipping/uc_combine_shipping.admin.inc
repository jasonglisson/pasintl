<?php
/**
 * @file
 * Combine shipping administration menu item.
 */

/**
 * Combine shipping settings form
 */
function uc_combine_shipping_settings_form() {
  $form = array();

  $form['settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Combine Shipping settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['settings']['uc_combine_shipping_quote_total_label'] = array(
    '#type' => 'textfield',
    '#title' => t('Shipping quote label'),
    '#default_value' => _uc_combine_shipping_quote_total_label(),
  );
  $form['group_link'] = array(
    '#markup' => l(t('Click here to edit the Combine Shipping groups.'), 'admin/store/settings/quotes/settings/combine_shipping_groups') . '<br />',
  );

  return system_settings_form($form);
}


/**
 * List and configure shipping groups
 */
function uc_combine_shipping_group_main_form() {
  $form = array();

  $form['info'] = array(
    '#markup' => t('This page allows you to create shipping groups and to assign the existing shipping methods into shipping groups') . '<br />',
  );

  $form['groups'] = array(
    '#type' => 'fieldset',
    '#title' => t('Groups'),
  );

  // load enabled and disabled shipping methods
  $methods = uc_quote_methods(TRUE);
  // skip the combine shipping method
  $methods['uc_combine_shipping']['uc_combine_shipping_processed'] = TRUE;
  // load configured shipping groups
  $groups = array(0 => t('Default'));
  $group_orders = array(0 => 0);
  $group_methods = array(0 => array());

  foreach (_uc_combine_shipping_get_groups() as $group) {
    $groups[$group->group_id] = $group->group_name;
    $group_orders[$group->group_id] = $group->group_order;
    $group_methods[$group->group_id] = array();
    // load shipping methods configured for this group
    $result2 = db_query("SELECT method_id FROM {uc_combine_shipping_methods} WHERE group_id=:group_id ORDER BY method_id", array(':group_id' => $group->group_id));
    foreach ($result2 as $record2) {
      if (isset($methods[$record2->method_id]) && !isset($methods[$record2->method_id]['uc_combine_shipping_processed'])) {
        $group_methods[$group->group_id][] = $record2->method_id;
        $methods[$record2->method_id]['uc_combine_shipping_processed'] = TRUE;
      }
    }
  }
  // put all unprocessed methods into the default group
  if (count($methods)) {
    foreach ($methods as $method_id => $method_info) {
      if (!isset($methods[$method_id]['uc_combine_shipping_processed'])) {
        $group_methods[0][] = $method_id;
        $methods[$method_id]['uc_combine_shipping_processed'] = TRUE;
      }
    }
  }

  foreach ($groups as $group_id => $group_name) {
    $order = ($group_orders[$group_id]==0) ? '' : '(' . t('order') . ': ' . $group_orders[$group_id] . ')';
    $form['groups']['group_' . $group_id] = array(
      '#type' => 'fieldset',
      '#title' => t('Group: @group_name @order', array('@group_name' => $group_name, '@order' => $order)),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    );
    if ($group_id>0) {
      $form['groups']['group_' . $group_id]["edit"] = array(
        '#markup' => l(t('Edit group'), "admin/store/settings/quotes/settings/combine_shipping_group/$group_id/edit") . '<br />',
      );
      $form['groups']['group_' . $group_id]["delete"] = array(
        '#markup' => l(t('Delete group'), "admin/store/settings/quotes/settings/combine_shipping_group/$group_id/delete") . '<br />',
      );
    }
    if (count($group_methods[$group_id])) {
      $form['groups']['group_' . $group_id]["header1"] = array(
        '#markup' => t('Shipping method'),
        '#prefix' => '<table><tr><td>',
        '#suffix' => '</td>',
      );
      $form['groups']['group_' . $group_id]["header2"] = array(
        '#markup' => t('Move to another group'),
        '#prefix' => '<td align="right">',
        '#suffix' => '</td></tr>',
      );
      $last_id = '';
      foreach ($group_methods[$group_id] as $method_id) {
        $last_id = $method_id;
        $form['groups']['group_' . $group_id]["title_$method_id"] = array(
          '#type' => 'markup',
          '#markup' => $methods[$method_id]['title'] . ($methods[$method_id]['enabled'] ? '' : ' (' . t('Disabled') . ')'),
          '#prefix' => '<tr><td>',
          '#suffix' => '</td>',
        );
        $form['groups']['group_' . $group_id]["method_$method_id"] = array(
          '#type' => 'select',
          '#options' => $groups,
          '#default_value' => $group_id,
          '#prefix' => '<td align="right">',
          '#suffix' => '</td></tr>',
        );
      };
      $form['groups']['group_' . $group_id]["method_$last_id"]['#suffix'] .= '</table>';
    }
  }
  // Add new group
  $form['new'] = array(
    '#type' => 'fieldset',
    '#title' => t('Create new shipping group'),
  );
  $form['new']['new_group_name'] = array(
    '#type' => 'textfield',
    '#title' => t('Name of new shipping group'),
  );

  // Submit button
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Submit'),
  );

  return $form;
}

/**
 * Shipping group main form submit handler
 */
function uc_combine_shipping_group_main_form_submit($form, &$form_state) {
  // create shipping group
  $new_group_name = trim($form_state['values']['new_group_name']);
  if ($new_group_name!=='') {
    $id = db_insert('uc_combine_shipping_groups')
    ->fields(array(
      'group_name' => $new_group_name,
    ))
    ->execute();
    drupal_set_message(t('Shipping group %group has been created.', array('%group' => $new_group_name)));
  }

  // load enabled and disabled shipping methods
  $methods = uc_quote_methods(TRUE);
  // update shipping group associations
  foreach ($form_state['values'] as $element_id => $element_value) {
    if (preg_match('/^method_/', $element_id)) {
      $method_id = preg_replace('/^method_/', '', $element_id);
      $group_id = $element_value;
      // delete records to make sure everything is consistent
      db_delete('uc_combine_shipping_methods')
      ->condition('method_id', $method_id)
      ->execute();
      // insert record if method does not belong to default group
      if ($group_id>0) {
      $id = db_insert('uc_combine_shipping_methods')
        ->fields(array(
          'method_id' => $method_id,
          'group_id' => $group_id,
        ))
        ->execute();
      }
    }
  }

}


/**
 * Edit group form
 */
function uc_combine_shipping_group_edit_form($form, &$form_state, $group_id) {
  $form = array();

  // load group
  $results = db_select('uc_combine_shipping_groups')
    ->fields('uc_combine_shipping_groups', array('group_id', 'group_name', 'group_order'))
    ->condition('group_id', (int)$group_id)
    ->execute();
  $group = $results->fetch();
  if (!$group) {
    drupal_set_message(("Invalid group id"), 'error');
    return ($form);
  }

  drupal_set_title($group->group_name);
  // group id
  $form['group_id'] = array(
    '#type' => 'value',
    '#value' => $group->group_id,
  );
  // group name
  $form['group_name'] = array(
    '#type' => 'textfield',
    '#title' => t('Group name'),
    '#default_value' => $group->group_name,
    '#required' => TRUE,
  );
  // group order
  $form['group_order'] = array(
    '#type' => 'weight',
    '#title' => t('Group order'),
    '#delta' => 20,
    '#description' => t('Shipping groups will be sorted by weight when displayed on the checkout page. A group with lower weight will be displayed before a group with higher weight.'),
    '#default_value' => $group->group_order,
  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
  );
  return $form;
}

/**
 * Edit group submit handler
 */
function uc_combine_shipping_group_edit_form_submit($form, &$form_state) {
  $v = $form_state['values'];
  db_update('uc_combine_shipping_groups')
    ->condition('group_id', $v['group_id'])
    ->fields(array(
      'group_name' => $v['group_name'],
      'group_order' => $v['group_order'],
    ))
    ->execute();
  drupal_set_message(t('Changes saved'));
  $form_state['redirect'] = 'admin/store/settings/quotes/settings/combine_shipping_groups';
}

/**
 * Delete group form
 */
function uc_combine_shipping_group_del_form($form, &$form_state, $group_id) {

  // load group
  $results = db_select('uc_combine_shipping_groups')
    ->fields('uc_combine_shipping_groups', array('group_id', 'group_name', 'group_order'))
    ->condition('group_id', (int)$group_id)
    ->execute();
  $group = $results->fetch();
  if (!$group) {
    drupal_set_message(("Invalid group id"), 'error');
    return ($form);
  }
  drupal_set_title($group->group_name);

  return confirm_form(
    array(
      'group_id' => array(
        '#type' => 'value',
        '#value' => $group->group_id,
      ),
    ),
    t('Are you sure you want to delete the %group group?', array('%group' => $group->group_name)),
    'admin/store/settings/quotes/settings/combine_shipping_groups',
    t('This action cannot be undone.'),
    t('Delete group'),
    t('Cancel')
  );
}

/**
 * Delete group submit handler
 */
function uc_combine_shipping_group_del_form_submit($form, &$form_state) {
  db_delete('uc_combine_shipping_groups')
  ->condition('group_id', $form_state['values']['group_id'])
  ->execute();
  drupal_set_message(t('Group has been deleted'));
  $form_state['redirect'] = 'admin/store/settings/quotes/settings/combine_shipping_groups';
}

