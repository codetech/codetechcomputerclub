<?php
class BelongsToUserBehavior extends ModelBehavior {
	
/**
 * Determines if the calling Model is owned by a certain User.
 * 
 * @return boolean
 */
	public function isOwnedBy(Model $model, $id, $userId) {
		return $model->field('id', array('id' => $id, 'user_id' => $userId)) === $id;
	}
}
