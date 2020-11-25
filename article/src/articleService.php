<?php

namespace Drupal\article;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Class articleService.
 */
class articleService implements articleInterface {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new articleService object.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * Funkcja zwracająca tablicę z tytułami artykułów
   */
  public function articles(){
    $items = array(
      array('title' => 'Article one'),
      array('title'=> 'Article two'),
      array('title' => 'Article three'),
      array('title' => 'Article four'),
    );

    return $items;
  }
}
