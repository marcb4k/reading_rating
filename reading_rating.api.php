<?php

/**
 * @file
 * Hooks provided by the reading rating module.
 */

/**
 * @addtogroup hooks
 * @{
 */

/**
 * Define additional widget settings.
 *
 * @return array
 *   Additional widget settings.
 */
function hook_reading_rating_widget_settings() {
  return [
    'text_textarea_custom_widget' => [
      'reading_rating_setting' => TRUE,
      'summary_reading_rating_setting' => TRUE,
    ],
  ];
}

/**
 * @} End of "addtogroup hooks".
 */
