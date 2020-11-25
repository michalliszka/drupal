<?php

namespace Drupal\contact_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ContactForm.
 */
class ContactForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'contact_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['imie_i_nazwisko'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Imię i nazwisko: '),
      '#maxlength' => 30,
      '#size' => 30,
      '#weight' => '0',
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email: '),
      '#weight' => '1',
      '#size' => '10',
    ];
    $form['telefon_kontaktowy'] = [
      '#type' => 'tel',
      '#title' => $this->t('Telefon kontaktowy: '),
      '#weight' => '2',
      '#size' => 15,
    ];
    $form['wiadomosc'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Wiadomość: '),
      '#weight' => '3',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Wyślij'),
      '#weight' => '4',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
     /**
      * Leave message
      */
    \Drupal::messenger()->addMessage('Dziękujemy za wiadomość :)');
  }

}
