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
}
