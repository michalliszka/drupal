<?php

namespace Drupal\calc\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class calcForm.
 */
class calcForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'calc_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['first_number'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Pierwsza liczba: '),
      '#weight' => '0',
      '#size' => '4',
    ];
    $form['second_number'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Druga liczba: '),
      '#weight' => '0',
      '#size' => '4',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Oblicz'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
      /**
       * Display result of (+)
       */
      \Drupal::messenger()->addMessage($form_state->getValue('first_number') + $form_state->getValue('second_number'));
    }
  }


