<?php

namespace Drupal\d8cards\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Contribute form.
 */
class D8Form extends ConfigFormBase {
  
  protected function getEditableConfigNames() {
    return [
      'd8cards.config',
    ];
  }
  
  public function getFormId() {
    return 'd8ConfigForm';
  }
  
  
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = \Drupal::config('d8cards.config');
    
    //~ dsm($config );
    //~ exit;
    $form['email'] = array(
      '#type' => 'email',
      '#title' => 'User Email',
      '#attributes' => array(
        'class'=> array('usr-email')
      ),
      '#default_value' => $config->get('email'),
      '#required' => TRUE,
    );
    
    $form['gender'] = array(
      '#type' => 'select',
      '#title' => $this->t('Gender'),
      '#options' => array('male' => $this->t('Male'), 'female' => $this->t('Female')),
      '#default_value' => $config->get('gender'),
      '#required' => TRUE,
    );
    $form['citizenship'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Citizenship'),
      '#options' => array('in' => $this->t('Indian'), 'us' => $this->t('U.S')),
      '#default_value' => $config->get('citizenship'),
      '#required' => TRUE,
    );
    
    return parent::buildForm($form, $form_state);   
  }
  
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }
  
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration
       $this->configFactory->getEditable('d8cards.config')
      // Set the submitted configuration setting
      ->set('email', $form_state->getValue('email'))
      ->set('gender', $form_state->getValue('gender'))
      ->set('citizenship', $form_state->getValue('citizenship'))
      ->save();

    parent::submitForm($form, $form_state);
    
  }

}
