<?php
class NonPresidentHelper extends AppHelper {
	/**
	 * Generates an appropriate non-president title.
	 * 
	 * @return string
	 */
	public function getTitle() {
		$titles = array(
			'CEO',
			'Assistant Regional Manager',
			'Champion of Light',
			'Usurper Lord',
			'Overlord Maximus',
			'Shadowpuppet Master',
		);
		$index = mt_rand(0, count($titles) - 1);
		return $titles[$index];
	}
}
