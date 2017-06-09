<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('4 Columns - 1 Col Offset'),
  'category' => t('Mini Panels'),
  'icon' => 'bootstrap_fourcol_one_offset.png',
  'theme' => 'bootstrap_fourcol_one_offset',
  'admin css' => '../pasintl-panels-bootstrap-layouts.css',
  'regions' => array(
    'left' => t('Left Column'),
    'middle_left' => t('Middle Left'),
    'middle_right' => t('Middle Right'),    
    'right' => t('Right Column'),
  ),
);
