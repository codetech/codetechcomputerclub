<?php
/**
 * Originally by Florian Leleu at http://florianleleu.wordpress.com/2012/10/05/use-tinymce-in-cakephp-with-a-behavior/
 * 
 * Modified by Jackson Ray Hamilton.
 */
class PurifyBehavior extends ModelBehavior {
	
/**
 * Purifies a field of a Model, the default field being `content`.
 * 
 * @return void
 */
	function setup(Model $model, $settings = array()) {
		$field = (isset($settings['field'])) ? $settings['field'] : 'content';
		$this->settings[$model->alias] = array('field' => $field);
	}

/**
 * Cleans a field (see `setup()`) with HTMLPurifier before saving the Model.
 * 
 * @return boolean
 */
	function beforeSave(Model $model, $options = array()) {
		
		// Get the name of the field to clean.
		$field = $this->settings[$model->alias]['field'];

		// Check if the field is even being saved.
		if (isset($model->data[$model->alias][$field])) {
			
			App::import('Vendor', null, array(
				'file' => 'ezyang' . DS . 'htmlpurifier' . DS . 'library' . DS . 'HTMLPurifier.auto.php'
			));
			
			// Use HTMLPurifier to remove nastiness.
			$model->data[$model->alias][$field] = (new HTMLPurifier())->purify($model->data[$model->alias][$field]);
		}

		return true;
	}
}
