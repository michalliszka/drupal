<?php

namespace Drupal\taskmodule;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Class taskmoduleService.
 */
class taskmoduleService implements taskmoduleInterface {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new taskmoduleService object.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

/**
 * Funkcja mająca na celu pobranie tablicy z 'nid', a następnie tablicy obiektów 'news'
 */
  public function news(){
    $nids = \Drupal::entityTypeManager()->getStorage('node')->getQuery()->condition('type', 'news')->execute();
    $news = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);
   return $news;
  }

  /**
   * Funkcja mająca na celu pobranie tablicy z 'tid', a następnie tablicy kategorii.
   * Związane to jest z przyciskami do filtrowania listy po kategorii.
   */
  public function taxonomy(){
    $tids = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->getQuery()->execute();
    $taxonomy = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadMultiple($tids);
    return $taxonomy;
  }
}
