<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('8 Col Content - 3 Col Sidebar'),
  'category' => t('Mini Panels'),
  'icon' => 'bootstrap_eightcol_threecol.png',
  'theme' => 'bootstrap_eightcol_threecol',
  'admin css' => '../pasintl-panels-bootstrap-layouts',
  'regions' => array(
    '8_col' => t('9 Col'),
    '3_col' => t('3 Col'),
  ),
);
