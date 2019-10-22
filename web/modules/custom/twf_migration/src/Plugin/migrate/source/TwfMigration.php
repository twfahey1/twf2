<?php

namespace Drupal\twf_migration\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Provides a 'TwfMigration' migrate source.
 *
 * @MigrateSource(
 *  id = "twf_migration",
 *  source_module = "twf_migration"
 * )
 */
class TwfMigration extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    return $this->select('movies', 'm')
      ->fields('m');
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [];
  }

}
