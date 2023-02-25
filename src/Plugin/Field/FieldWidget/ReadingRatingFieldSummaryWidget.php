<?php

/**
 * @file
 * Class for the Reading Rating field widget.
 */

namespace Drupal\reading_rating\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\text\Plugin\Field\FieldWidget\TextareaWithSummaryWidget;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'reading_rating' widget.
 *
 * @FieldWidget(
 *   id = "reading_rating_summary_widget",
 *   label = @Translation("Reading Rating with a summary"),
 *   field_types = {
 *     "text_with_summary"
 *   }
 * )
 */
class ReadingRatingFieldSummaryWidget extends TextareaWithSummaryWidget {

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element = parent::settingsForm($form, $form_state);

    $element['enable_reading_rating'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable Reading Rating'),
    ];
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);

    $element['reading_rating'] = [
      '#title' => $this->t('Reading Rating'),
      '#type' => 'markup',
      '#markup' => 'testing markup',
      '#weight' => 100,
    ];

    return $element;
  }

}
