<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('Full Width & 2 Col Sidebar, 10 Col Content'),
  'category' => t('Panel Pages'),
  'icon' => 'bootstrap_fullwidth_twocol_tencol.png',
  'theme' => 'bootstrap_fullwidth_twocol_tencol',
  'admin css' => '../pasintl-panels-bootstrap-layouts.css',
  'regions' => array(
    '12_col' => t('12 Col'),
    'full_width' => t('Full Width'),
    '2_col' => t('2 Col'),
    '10_col' => t('10 Col'),
  ),
);
