<?php

namespace Drupal\reading_rating;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * The widget settings service.
 */
class WidgetSettings implements WidgetSettingsInterface, ContainerInjectionInterface {

  /**
   * The module handler service.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * Constructs the WidgetSettings service.
   *
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler service.
   */
  public function __construct(ModuleHandlerInterface $module_handler) {
    $this->moduleHandler = $module_handler;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('module_handler')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getAllowedSettingsForAll() {
    $settings = [
      'string_textarea' => [
        'reading_rating_setting' => TRUE,
        'summary_reading_rating_setting' => FALSE,
      ],
      'text_textarea' => [
        'reading_rating_setting' => TRUE,
        'summary_reading_rating_setting' => FALSE,
      ],
      'text_textarea_with_summary' => [
        'reading_rating_setting' => TRUE,
        'summary_reading_rating_setting' => TRUE,
      ],
    ];

    $additional_widget_settings = $this->moduleHandler->invokeAll('reading_rating_widget_settings') ?: [];

    return $settings + $additional_widget_settings;
  }

  /**
   * {@inheritdoc}
   */
  public function getAllowedSettings($widget_plugin_id) {
    $all_settings = $this->getAllowedSettingsForAll();
    if (!empty($all_settings[$widget_plugin_id])) {
      return $all_settings[$widget_plugin_id];
    }
    return [];
  }

}
