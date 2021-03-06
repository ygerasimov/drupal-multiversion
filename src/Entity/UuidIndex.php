<?php

namespace Drupal\multiversion\Entity;

use Drupal\Core\Entity\EntityInterface;

class UuidIndex extends IndexBase {

  const COLLECTION_NAME = 'entity_uuid_index';

  protected function buildKey(EntityInterface $entity) {
    return $entity->uuid();
  }

  protected function buildValue(EntityInterface $entity) {
    // @todo: Rename 'entity_type' to 'entity_type_id' for consistency.
    return array(
      'entity_type' => $entity->getEntityTypeId(),
      'entity_id' => $entity->id(),
      'revision_id' => $entity->getRevisionId(),
      'local_seq' => $entity->_local_seq->value,
      'rev' => $entity->_revs_info->rev,
    );
  }
}
