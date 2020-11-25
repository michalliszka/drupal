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
   * Funkcja zwracająca wartości na stronę /news
   */
  public function newsPage() {
  
    return [
      '#theme' => 'taskmodule',
      '#items' => $this->taskmoduleDefault->news(),
      '#terms' => $this->taskmoduleDefault->taxonomy()
    ];
  }
}
