<?php
class CsvHelper extends AppHelper {
	/**
	 * Escapes a field in a CSV file.
	 * 
	 * @return string
	 */
	public function escapeField($string) {
		return '"' . str_replace('"', '""', $string) . '"'; 
	}
}
