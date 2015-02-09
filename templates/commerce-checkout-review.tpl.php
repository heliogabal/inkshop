<?php

/**
 * @file
 * Default implementation of the shopping cart block template.
 *
 * Available variables:
 * - $panes: An array of checkout panes containing title and data.
 *
 * Helper variables:
 * - $form: The complete checkout review form array.
 *
 * @see template_preprocess()
 * @see template_process()
 */
?>

<?php
foreach ($panes as $pane_id => $pane) {
    echo theme('fieldset', array('element' => array(
      '#title' => $pane['title'],
      '#children' => $pane['data'],
      '#collapsible' => false,
      '#attributes' => array('class' => array('pane', $pane_id)),
    )));
  }
?>