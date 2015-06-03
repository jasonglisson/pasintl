<?php
/**
 * @file
 * Admin pages callbacks.
 */

/**
 * Admin page callback
 */
function mail_headers_config() {
  $content[] = drupal_get_form('mail_headers_admin_form');
  return $content;
}

/**
 * Admin page callback
 */
function mail_headers_headers() {
  $content[] = drupal_get_form('mail_headers_headers_form');
  return $content;
}

/**
 * Admin form
 */
function mail_headers_admin_form($form, &$form_state) {
  $mail_headers_use_default = isset($form_state['values']['mail_headers_use_default']) ? $form_state['values']['mail_headers_use_default'] : variable_get('mail_headers_use_default', FALSE);
  $form['mail_headers_use_default'] = array(
    '#default_value' => $mail_headers_use_default,
    '#type' => 'checkbox',
    '#title' => t('Allways use default address.'),
    '#description' => t('Allways use default address "@address" as "from" for all e-mails.', array('@address' => variable_get('site_mail', FALSE))),
  );

  $mail_headers_allowed = isset($form_state['values']['mail_headers_allowed']) ? $form_state['values']['mail_headers_allowed'] : variable_get('mail_headers_allowed', '');
  $form['mail_headers_allowed'] = array(
    '#type' => 'textarea',
    '#default_value' => $mail_headers_allowed,
    '#title' => t('Allowed Domains'),
    '#description' => t('List of domains that are allowed to be used as sender "from" in e-mails sent by Drupal. Put one domain per line, do not include the @. If none is supplied, no e-mails will be modified.'),
    '#states' => array(
      // Hide the settings when the use default checkbox is checked.
      'invisible' => array(
        'input[name="mail_headers_use_default"]' => array('checked' => TRUE),
      ),
    ),
  );

  $mail_headers_allow_html = isset($form_state['values']['mail_headers_allow_html']) ? $form_state['values']['mail_headers_allow_html'] : variable_get('mail_headers_allow_html', FALSE);
  $form['mail_headers_allow_html'] = array(
    '#default_value' => $mail_headers_allow_html,
    '#type' => 'checkbox',
    '#title' => t('Allow HTML.'),
    '#description' => t('If checked, the body of the e-mail will allow html code. If unchecked, the body will be converted to plain text.'),
  );

  $form = system_settings_form($form);
  return $form;
}

function mail_headers_headers_form($form, &$form_state) {
  $id = drupal_html_id('mail-headers-headers');
  $items = variable_get('mail_headers_headers', array());

  $i = 0;
  $total = count($items);

  if ($total < 1) {
    $total = 1;
  }

  if (isset($form_state['input']['headers']['quantity']) && $form_state['input']['headers']['quantity'] > $total) {
    $total = $form_state['input']['headers']['quantity'];
  }

  $form['headers'] = array(
    '#prefix' => '<div id="' . $id . '">',
    '#suffix' => '</div>',
    '#tree' => TRUE,
  );

  $form['headers']['quantity'] = array(
    '#title' => t('Number of Headers'),
    '#type' => 'textfield',
    '#description' => t('Choose how many headers you want to save.'),
    '#element_validate' => array('element_validate_integer_positive'), 
    '#ajax' => array(
      'wrapper' => $id,
      'callback' => 'mail_headers_headers_form_ajax'
    ),
    '#limit_validation_errors' => array(),
    '#default_value' => $total,
  );

  $form['headers']['items'] = array(
    '#type' => 'tableform',
    '#tf_header' => array(
      t('Header Name'),
      t('Header Value'),
      t('Delete'),
    ),
    '#tf_rows' => array(),
  );

  while ($i < $total) {
    $hn = array(
      '#type' => 'textfield',
      '#default_value' => isset($items[$i]['header_name']) ? $items[$i]['header_name'] : NULL,
      '#autocomplete_path' => 'mail_headers/autocomplete',
    );
    $hv = array(
      '#type' => 'textfield',
      '#default_value' => isset($items[$i]['header_value']) ? $items[$i]['header_value'] : NULL,
    );
    $delete = array(
      '#type' => 'checkbox',
      '#default_value' => NULL,
    );

    $form['headers']['items']['#tf_rows'][] = array(
      $i . '_header_name' => $hn,
      $i . '_header_value' => $hv,
      $i . '_delete' => $delete,
    );

    ++$i;
  }

  $form['tokens'] = array(
    '#theme' => 'token_tree',
    '#token_types' => array(),
  );

  $form['actions']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save configuration'),
  );

  return $form;
}

/**
 * Ajax handler for mail_headers_headers_form().
 */
function mail_headers_headers_form_ajax($form, $form_state) {
  return $form['headers'];
}

/**
 * Submit handler for mail_headers_headers_form().
 */
function mail_headers_headers_form_validate(&$form, &$form_state) {
  $items = $form_state['values']['headers']['items'];
  $total = count($items) / 3;
  $i = 0;

  while ($i < $total) {
    if ($items[$i . '_delete'] || !$items[$i . '_header_name'] && !$items[$i . '_header_value']) {
      // Ignore when both are empty, or when deleting.
    }
    elseif (!$items[$i . '_header_name']) {
      form_set_error('headers][items][' . $i . '_header_name', t('Header Name is required.'));
    }
    elseif (!$items[$i . '_header_value']) {
      form_set_error('headers][items][' . $i . '_header_value', t('Header Value is required.'));
    }

    $forbidden = array(
      'From',
      'Reply-To',
      'X-Drupal-From'
    );
    if (preg_grep("/" . $items[$i . '_header_name'] . "/i" , $forbidden)) {
      form_set_error('headers][items][' . $i . '_header_name', t('Sorry, you are not allowed to modify the %header header.', array('%header' => $items[$i . '_header_name'])));
    }
    ++$i;
  }
}

/**
 * Submit handler for mail_headers_headers_form().
 */
function mail_headers_headers_form_submit(&$form, &$form_state) {
  $items = $form_state['values']['headers']['items'];
  $total = count($items) / 3;
  $i = 0;

  $headers = array();

  while ($i < $total) {
    if (!$items[$i . '_delete'] && $items[$i . '_header_name'] && $items[$i . '_header_value']) {
      $headers[] = array(
        'header_name' => $items[$i . '_header_name'],
        'header_value' => $items[$i . '_header_value'],
      );
    }
    ++$i;
  }

  variable_set('mail_headers_headers', $headers);
}

/**
 * Autocomplete for recommended headers.
 */
function mail_headers_autocomplete($s) {

  $matches = array(
    'Content-Language' => 'Content-Language',
    'In-reply-to' => 'In-reply-to',
    'Mail-followup-to' => 'Mail-followup-to',
    'References' => 'References',
    'X-Originating-IP' => 'X-Originating-IP',
    'X-Mailer' => 'X-Mailer',
  );

  drupal_json_output($matches);
}
