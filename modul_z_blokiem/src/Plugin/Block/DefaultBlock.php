<?php

namespace Drupal\modul_z_blokiem\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'DefaultBlock' block.
 *
 * @Block(
 *  id = "default_block",
 *  admin_label = @Translation("Default block"),
 * )
 */
class DefaultBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = new static($configuration, $plugin_id, $plugin_definition);
    $instance->entityTypeManager = $container->get('entity_type.manager');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    /**
     * Pobranie 3 największych wartości nid dla news, w celu okreslenia najnowszych newsów
     * To zadanie można zrobić na dwa sposoby:
     * 1) Pobieramy nidy, dlatego, że każdy kolejny news, bo nid większy od poprzedniego, a co za tym idzie
     * jest nowszy
     * 2) Pobieramy i sortujemy wartości z "created", a następnie z nich wybieramy 3 największe, tak samo, im większa jest
     * wartość created to oznacza, że news został napisany w późniejszym terminie, a więc jest najnowszy.
     */
    $query= \Drupal::entityTypeManager()->getStorage('node')->getQuery()->condition('type', 'news')->sort('nid', 'DESC')->range(0,3)->execute();
    $news =\Drupal::entityTypeManager()->getStorage('node')->loadMultiple($query);
    /**
     * Pobranie wartości taxonomii
     */
    $tid = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->getQuery()->execute();
    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadMultiple($tid);

    $build = [];
    $build['#theme'] = 'default_block';
    $build['default_block']['#markup'] = 'some text';
    $build['#content'] = $news;
    $build['#terms'] = $terms;

    return $build;
  }

}
