<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('Two Columns Stacked'),
  'category' => t('Panel Pages'),
  'icon' => 'bootstrap_twocol_stacked.png',
  'theme' => 'bootstrap_twocol_stacked',
  'admin css' => '../pasintl-panels-bootstrap-layouts.css',
  'regions' => array(
    'top' => t('Top'),
    'left' => t('Left'),
    'right' => t('Right'),
    'bottom' => t('Bottom'),
  ),
);
