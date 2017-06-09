<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition

$theme_path = drupal_get_path('theme', variable_get('theme_default', NULL));
$plugin = array(
  'title' => t('Full Width and Contained'),
  'category' => t('Panel Pages'),
  'icon' => 'bootstrap_onecol_fullwdith_contained.png',
  'theme' => 'bootstrap_onecol_fullwdith_contained',
  'admin css' => '../usgs-panels-bootstrap-layouts-admin.css',
  'regions' => array(
    '12_col' => t('12 Col'),
    'full_width' => t('Full Wdith'),
    'contained' => t('Contained')
  ),
);

