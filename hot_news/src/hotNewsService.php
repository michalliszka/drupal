<?php

namespace Drupal\hot_news;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Class hotNewsService.
 */
class hotNewsService implements HotNews {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new hotNewsService object.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  public function latestNews(){
    /**
     * Pobranie 3 największych wartości 'nid' (lub 'created') dla news, w celu okreslenia najnowszych newsów
     */
    $nids= \Drupal::entityTypeManager()->getStorage('node')->getQuery()->condition('type', 'news')->sort('nid', 'DESC')->range(0,3)->execute();
    $news =\Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);
    return $news;
  }

  public function category(){
    /**
     * Pobranie wartości taxonomii
     */
    $tid = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->getQuery()->execute();
    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadMultiple($tid);
    return $terms;
  }
}

