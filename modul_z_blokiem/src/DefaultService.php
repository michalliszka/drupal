<?php

namespace Drupal\modul_z_blokiem;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Class DefaultService.
 */
class DefaultService implements modulZblokiemInterface {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new DefaultService object.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

}
