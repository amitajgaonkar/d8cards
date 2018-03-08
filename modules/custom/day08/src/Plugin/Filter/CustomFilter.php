<?php
namespace Drupal\day08\Plugin\Filter;

use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;
/**
 * @Filter(
 *  id = "custom_filter",
 *  title = @Translation("Custom filter"),
 *  description = @Translation("Custom filter for learning purpose"),
 *  type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 * )
 * */
class CustomFilter extends FilterBase {
  /**
   * {@inheritdoc}
   */
  function process($text, $langcode) {
    $replace = '<span class="celebrate-filter">' . $this->t('Good Times!') . '</span>';
    $new_text = str_replace('[celebrate]', $replace, $text);
    return new FilterProcessResult($new_text);
  }
}