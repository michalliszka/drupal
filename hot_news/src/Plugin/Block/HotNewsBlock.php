<?php

namespace Drupal\hot_news\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'HotNewsBlock' block.
 *
 * @Block(
 *  id = "hot_news_block",
 *  admin_label = @Translation("Hot news block"),
 * )
 */
class HotNewsBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Drupal\hot_news\HotNews definition.
   *
   * @var \Drupal\hot_news\HotNews
   */
  protected $hotNewsDefault;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = new static($configuration, $plugin_id, $plugin_definition);
    $instance->hotNewsDefault = $container->get('hot_news.default');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    $build = [];
    $build['#theme'] = 'hot_news_block';
    $build['#content'] = $this->hotNewsDefault->latestNews();
    $build['#terms'] = $this->hotNewsDefault->category();

    return $build;
  }

}
