<?php
namespace Drupal\day08\Plugin\Filter;

use Drupal\filter\Plugin\FilterBase;
use Drupal\filter\FilterProcessResult;

/**
 * @Filter(
 *  id = "capitalize_word",
 *  title = @Translation("Auto Capitalize Words"),
 *  description = @Translation("Pre defined words will auto capitalize"),
 *  type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 * )
 * */

class CapitalizeFilter extends FilterBase {
  function process($text, $language_code) {
    $cap_words = explode(',', $this->settings['cap_words']);
    foreach ($cap_words as $item) {
      $text = str_replace($item, strtoupper($item), $text);
    }
    return new FilterProcessResult($text);
  }

  function settingsForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $form['cap_words'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Words List'),
      '#default_value' => $this->settings['cap_words'],
      '#description' => $this->t("Enter list of words in small case, which should be capitalized. <br>"
	      . "Seperate multiple words with commas (,).<br>"
	      . "Example drupal,symphony,ajax ."),
      
    );
    return $form;
  }
  
}