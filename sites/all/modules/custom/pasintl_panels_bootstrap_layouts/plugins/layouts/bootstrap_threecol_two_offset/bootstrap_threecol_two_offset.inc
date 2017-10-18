<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('3 Columns - 2 Col Offset'),
  'category' => t('Mini Panels'),
  'icon' => 'bootstrap_threecol_two_offset.png',
  'theme' => 'bootstrap_threecol_two_offset',
  'admin css' => '../usgs-panels-bootstrap-layouts-admin',
  'regions' => array(
    'left' => t('Left column'),
    'middle' => t('Middle column'),
    'right' => t('Right column'),
  ),
);
