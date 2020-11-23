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
}
