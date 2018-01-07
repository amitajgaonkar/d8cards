<?php
namespace Drupal\d8cards\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class SmtpSettings extends ConfigFormBase {
  
  protected function getEditableConfigNames() {
    return [
      'd8cards.smtpsettings',
    ];
  }
  
  public function getFormId() {
    return 'd8SmtpConfigForm';
  }
  
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['uname'] = array(
      '#type' => 'textfield',
      '#title' => 'textfield',
      '#attributes' => array('class' => array('smtp-uname')),
    );
    return parent::buildForm($form, $form_state);
  }
  
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }
  
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration
       $this->configFactory->getEditable('d8cards.settings')
      // Set the submitted configuration setting
      ->set('email', $form_state->getValue('email'))
      ->save();

    parent::submitForm($form, $form_state);
    
  }
  
}
