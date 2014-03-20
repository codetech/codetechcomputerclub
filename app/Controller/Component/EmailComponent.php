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
		$defaultConditions = array('User.receiveemail' => true);
		$finalConditions = array_merge($defaultConditions, $conditions);
		$emails = $this->User->find('list', array(
			'conditions' => $finalConditions,
			'fields' => array('User.email')
		));
		
		$Email = new CakeEmail();
		$Email->config('gmail')
			->template('default', null)
			->emailFormat('both')
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
		// TODO: Write a smarter query that doesn't grab users who haven't
		// set their gateways. The current result set is a bit redundant;
		// the if-statement takes care of it later but it's messy.
		$defaultConditions = array(
			'User.receivesms' => true,
			'User.phone !=' => ''
		);
		$finalConditions = array_merge($defaultConditions, $conditions);
		$dataset = $this->User->find('all', array(
			'conditions' => $finalConditions,
			'fields' => array('User.phone'),
			'contain' => array('Gateway.address'),
		));
		
		// Generate SMS email addresses.
		$emails = array();
		foreach ($dataset as $data) {
			if (isset($data['Gateway']) &&
				isset($data['Gateway']) &&
				!empty($data['Gateway'])) {
				
				$onlyTheDigits = preg_replace('/[^0-9]/', '', $data['User']['phone']);
				$emailAddress = $onlyTheDigits . '@' . $data['Gateway'][0]['address'];
				array_push($emails, $emailAddress);
			}
		}
		
		$Email = new CakeEmail();
		$Email->config('gmail')
			->template('default', null)
			->emailFormat('text')
			->bcc($emails)
			->viewVars(array(
				'textContent' => $message,
			))
			->send();
	}
}
