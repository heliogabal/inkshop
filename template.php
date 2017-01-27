<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * inkshop theme.
 */

function inkshop_form_alter(&$form, &$form_state, $form_id) {
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
  // The language selector is only displayed if there is more than one language.
  if (drupal_multilingual()) {
    if ($form_id == 'user_register_form' || ($form_id == 'user_profile_form' && $form['#user_category'] == 'account')) {
      if (count(element_children($form['locale'])) > 1) {
        $form['locale']['language']['#access'] = FALSE;
      }
      else {
        $form['locale']['#access'] = FALSE;
      }
    }
  }
}

function inkshop_follow_link($variables) {
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

function inkshop_preprocess_commerce_checkout_review(&$variables) {
  $panes = array();
  foreach ($variables['form']['#data'] as $pane_id => $data) {
    $panes[$pane_id] = array(
      'title' => $data['title'],
      'data' => $data['data'],
    );
  }
  $variables['panes'] = $panes;
}
function inkshop_preprocess_html(&$variables) {
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
/**
 * Implements hook_admin_paths_alter().
 */
function inkshop_admin_paths_alter(&$paths) {
  $paths['user/*/edit'] = FALSE;
}
// function inkshop_commerce_price_component_type_info_alter(&$component_types) {
//   // Base price is -50
//   $component_types['discount']['weight'] = -30;
//   $component_types['shipping']['weight'] = -20;
//   $component_types['tax|vat']['weight'] = -10;
//   // We defined our shipping_discount with weight of -15.
//   $component_types['commerce_donate']['weight'] = 30;
// }
// function inkshop_commerce_price_formatted_components_alter(&$components, $price, $entity) {
//   // Base price is -50
//   if (isset($components['discount'])) {
//     $components['discount']['weight'] = -50;
//   }
//   if (isset($components['shipping'])) {
//     $components['shipping']['weight'] = -30;
//   }
//   if (isset($components['tax|vat'])) {
//     $components['tax|vat']['weight'] = -20;
//   }
//   // We defined our shipping_discount with weight of -15.
//   if (isset($components['commerce_donate'])) {
//     $components['commerce_donate']['weight'] = -10;
//   }
// }


/**
 * Themes a price components table.
 *
 * @param $variables
 *   Includes the 'components' array and original 'price' array.
 */
function inkshop_commerce_price_formatted_components($variables) {
  // Add the CSS styling to the table.
  drupal_add_css(drupal_get_path('module', 'commerce_price') . '/theme/commerce_price.theme.css');

  // Build table rows out of the components.
  $rows = array();

  foreach ($variables['components'] as $name => $component) {
    if($name == 'base_price') {
      //continue;
    }
    else {
      $rows[] = array(
      'data' => array(
        array(
          'data' => $component['title'],
          'class' => array('component-title'),
        ),
        array(
          'data' => $component['formatted_price'],
          'class' => array('component-total'),
        ),
      ),
      'class' => array(drupal_html_class('component-type-' . $name)),
    );
    }

  }

  return theme('table', array('rows' => $rows, 'attributes' => array('class' => array('commerce-price-formatted-components'))));
}
?>
