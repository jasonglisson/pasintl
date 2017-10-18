<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('6 Columns - Equal'),
  'category' => t('Mini Panels'),
  'icon' => 'bootstrap_sixcol_equal.png',
  'theme' => 'bootstrap_sixcol_equal',
  'admin css' => '../panels-bootstrap-layouts-admin.css',
  'regions' => array(
    'left_col_1' => t('Left Column 1'),
    'left_col_2' => t('Left Column 2'),
    'middle_col_3' => t('Middle Column 3'),
    'middle_col_4' => t('Middle Column 4'),    
    'right_col_5' => t('Right Column 5'),     
    'right_col_6' => t('Right Column 6'),
  ),
);
