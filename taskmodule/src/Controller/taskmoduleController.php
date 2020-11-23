<?php

namespace Drupal\taskmodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class taskmoduleController.
 */
class taskmoduleController extends ControllerBase {

  /**
   * Drupal\taskmodule\taskmoduleInterface definition.
   *
   * @var \Drupal\taskmodule\taskmoduleInterface
   */
  protected $taskmoduleDefault;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->taskmoduleDefault = $container->get('taskmodule.default');
    return $instance;
  }

  /**
   * Print.
   * @return string
   * Added theme and load into matrix items
   */
  public function print() {
    
    /**
     * Ustawienie typu szukanej encji
     * Zapytanie o "nid" szukanych encji
     * Przypisanie wyszukanych encji do zmiennej "news"
     * Przypisanie "news" do tablicy 'items'
     */
     $entity_type = 'news';
     $query =\Drupal::entityTypeManager()->getStorage('node')->getQuery();
     $nids = $query->condition('type', $entity_type)->execute();
     $news = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);
     $items =  $news;

     /**
      * Pobranie wartości tid dla taxonomy
      */
    $tid =[];
    foreach ($news as $term){
      $tid[]=$term->field_category->target_id;
    }; 
    /**
     * Pobranie wartości name dla taxonomy przez tid
     */
    $taxonomy = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadMultiple($tid);

    /**
     * 
     */
    //var_dump($taxonomy);

    return [
      '#theme' => 'taskmodule',
      '#items' => $items,
      '#terms' => $taxonomy
    ];
  }
}
