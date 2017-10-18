<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('Full Width & 3 Col Content, 9 Col Sidebar'),
  'category' => t('Panel Pages'),
  'icon' => 'bootstrap_fullwidth_threecol_ninecol.png',
  'theme' => 'bootstrap_fullwidth_threecol_ninecol',
  'admin css' => '../usgs-panels-bootstrap-layouts-admin.css',
  'regions' => array(
    '12_col' => t('12 Col'),
    'full_width' => t('Full Width'),
    '9_col' => t('9 Col'),
    '3_col' => t('3 Col')
  ),
);
