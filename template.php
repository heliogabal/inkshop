<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * inkshop theme.
 */

function inkshop_theme_form_alter(&$form, &$form_state, $form_id) {
  switch($form_id) {
    case 'commerce_checkout_form_checkout' :
      $form['checkout_donate']['checkout_donate']['commerce_donate_amount']['und']['#options'] = array(
        '0' => 'Keine',
	'1' => '1€',
        '5' => '5€',
        '10' => '10€',
        '20' => '20€',
      );
      $form['checkout_donate']['checkout_donate']['commerce_donate_amount']['und']['#default_value'] = '0';
    break;
  }
}


function inkshop_theme_follow_link($variables) {
  $link = $variables['link'];
  $title = $variables['title'];
  $classes = array();
  $classes[] = 'follow-link';
  $classes[] = "follow-link-{$link->name}";
  $classes[] = $link->uid ? 'follow-link-user' : 'follow-link-site';
  $attributes = array(
    'class' => $classes,
    'title' => follow_link_title($link->uid) .' '. $title,
    /* The following line is the only line added/different from the stock function defined with 'follow' */
    /*'data-popup' => 'true',*/
    'target' => '_blank',
  );
  $link->options['attributes'] = $attributes;
  return l($title, $link->path, $link->options) . "\n";
}

function inkshop_theme_preprocess_commerce_checkout_review(&$variables) {
  $panes = array();
  foreach ($variables['form']['#data'] as $pane_id => $data) {
    $panes[$pane_id] = array(
      'title' => $data['title'],
      'data' => $data['data'],
    );
  }
  $variables['panes'] = $panes;
}
function inkshop_theme_preprocess_html(&$variables) {
// Add information about the number of sidebars.
  if (!empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
    $variables['classes_array'][] = 'has-two-sidebars';
  }
  elseif (!empty($variables['page']['sidebar_first'])) {
    $variables['classes_array'][] = 'has-one-sidebar sidebar_first';
  }
  elseif (!empty($variables['page']['sidebar_second'])) {
    $variables['classes_array'][] = 'has-one-sidebar sidebar_second';
  }
  else {
    $variables['classes_array'][] = 'no_sidebars';
  }
}

?>