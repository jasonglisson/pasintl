<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('2 Col Sidebar - 10 Col Content'),
  'category' => t('Mini Panels'),
  'icon' => 'bootstrap_twocol_tencol.png',
  'theme' => 'bootstrap_twocol_tencol',
  'admin css' => '../pasintl-panels-bootstrap-layouts.css',
  'regions' => array(
    '2_col' => t('2 Col'),
    '10_col' => t('10 Col'),
  ),
);
