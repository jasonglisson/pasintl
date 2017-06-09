<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('Full Width & 9 Col Content, 3 Col Sidebar'),
  'category' => t('Panel Pages'),
  'icon' => 'bootstrap_fullwidth_ninecol_threecol.png',
  'theme' => 'bootstrap_fullwidth_ninecol_threecol',
  'admin css' => '../pasintl-panels-bootstrap-layouts.css',
  'regions' => array(
    '12_col' => t('12 Col'),
    'full_width' => t('Full Width'),
    '3_col' => t('3 Col'),
    '9_col' => t('9 Col'),
  ),
);
