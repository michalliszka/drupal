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
   * Funkcja zwracająca dane wartości
   */
  public function page() {
    return array(
      '#theme' => 'article',
      '#items' => $this->articleDefault->articles(),
    );
  }

}
