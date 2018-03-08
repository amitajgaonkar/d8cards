<?php
namespace Drupal\day07\Plugin\QueueWorker;
use Drupal\Core\Queue\QueueWorkerBase;

/**
 * Processes Tasks for Learning.
 *
 * @QueueWorker(
 *   id = "welcome_mail",
 *   title = @Translation("Learning task worker: Welcome email queue"),
 *   cron = {"time" = 60}
 * )
 */
class WelcomeEmail extends QueueWorkerBase{
  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    $mailManager = \Drupal::service('plugin.manager.mail');
    $langcode = \Drupal::currentUser()->getPreferredLangcode();
    $result = $mailManager->mail('day07', 'welcome_user', 'amit11041991@gmail.com', $langcode, $data);
    if ($result['result'] !== true) {
      \Drupal::logger('day07')->error('There was a problem sending your message and it was not sent.');
    }
    else {
      \Drupal::logger('day07')->info('Email sent');
    }
  }  
}