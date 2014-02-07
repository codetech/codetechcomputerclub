<?php
App::uses('Component', 'Controller');
class EmailComponent extends Component {
	
	/**
	 * Sends emails to users who have opted to receive them.
	 * 
	 * @params string $subject Subject line of email.
	 * @params string $messageHtml html to send.
	 * @params string $messagePlain Text to send if html is not accepted.
	 */
	public function sendEmail($subject, $messageHtml, $messagePlain,
			$conditions = array()) {
		
		$this->User = ClassRegistry::init('User');
		
		// Grab all users who have opted to receive emails, plus any optional
		// extra conditions.
		$emails = $this->User->find('list', array(
			'conditions' => array_merge(array(
				'User.receiveemail' => true),
				$conditions
			),
			'fields' => array('User.email')
		));
		
		// Split the emails list so that there will be one "to" address
		// and the rest will be bccs.
		$firstEmail = array_shift($emails);
		$Email = new CakeEmail();
		$Email->config('gmail')
			->template('default', null)
			->emailFormat('both')
			->to($firstEmail)
			->bcc($emails)
			->subject($subject)
			->viewVars(array(
				'textContent' => $messagePlain,
				'htmlContent' => $messageHtml,
			))
			->send();
	}
	
/**
 * Sends text messages to users who have opted to receive them.
 * 
 * @params string $message Message text to send.
 */
	public function sendText($message, $conditions = array()) {
		
		$this->User = ClassRegistry::init('User');
		
		// Select only relevant phone and address information.
		$dataset = $this->User->find('all', array(
			'conditions' => array_merge(array(
				'User.receivesms' => true,
				'User.phone !=' => ''),
				$conditions
			),
			'fields' => array('User.phone'),
			'contain' => array('Gateway.address'),
		));
		
		// Generate SMS email addresses.
		$emails = array();
		foreach ($dataset as $data) {
			$onlyTheDigits = preg_replace('/[^0-9]/', '', $data['User']['phone']);
			foreach ($data['Gateway'] as $gateway) {
				array_push($emails, $onlyTheDigits . '@' . $gateway['address']);
			}
		}
		
		// Split the emails list so that there will be one "to" address
		// and the rest will be bccs.
		$firstEmail = array_shift($emails);
		$Email = new CakeEmail();
		$Email->config('gmail')
			->template('default', null)
			->emailFormat('text')
			->to($firstEmail)
			->bcc($emails)
			->viewVars(array(
				'textContent' => $message,
			))
			->send();
	}
}
