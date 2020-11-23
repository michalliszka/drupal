<?php

namespace Drupal\article\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class articleController.
 */
class articleController extends ControllerBase {

  /**
   * Drupal\article\articleInterface definition.
   *
   * @var \Drupal\article\articleInterface
   */
  protected $articleDefault;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->articleDefault = $container->get('article.default');
    return $instance;
  }

  /**
   * Page.
   *
   * @return string
   *   Return Hello string.
   */
  public function page() {

    $items = array(
      array('name' => 'Article one'),
      array('name' => 'Article two'),
      array('name' => 'Article three'),
      array('name' => 'Article four'),
    );

    var_dump($items);
    return array(
      '#theme' => 'article',
      '#items' => $items,
      '#title' => 'Article list ----'
    );
  }

}
