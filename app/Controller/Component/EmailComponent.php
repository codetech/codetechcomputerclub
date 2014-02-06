<?php
App::uses('Component', 'Controller');
class EmailComponent extends Component {
	/**
	 * Sends email to all users who have opted to revive one
	 * 
	 * @params string $subject Subject line of email.
	 * @params string $messageHtml html to send.
	 * @params string $messagePlain Text to send if html is not accepted.
	 */
	public function sendEmail($subject, $messageHtml, $messagePlain) {
		$this->User = ClassRegistry::init('User');
		// Grab all email addressed which have opted to receive emails.
		$emails = $this->User->find('list', array(
			'conditions' => array('User.receiveemail' => true),
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
 * Sends email to all users who have opted to revive one
 * 
 * @params string $message Message text to send.
 */
	public function sendText($message) {
		$this->User = ClassRegistry::init('User');
		// Select only relevant phone and address information.
		$numbers = $this->User->find('all', array(
			'conditions' => array(
				'User.receivesms' => true,
				'User.phone !=' => ''
			),
			'fields' => array('User.phone'),
			'contain' => array('Gateway.address'),
		));
		
		// Generate SMS email addresses.
		// To prevent abuse, only send up to 5 texts for each User.
		// Counting the texts probably isn't necessary now that limits
		// are imposed at the Model level. Remove that check when things
		// feel safe.
		$emails = array();
		foreach ($numbers as $number) {
			$pureNumber = preg_replace('/[^0-9]/', '', $number['User']['phone']);
			$textsGenerated = 0;
			foreach ($number['Gateway'] as $gateway) {
				if ($textsGenerated === 5) break;
				array_push($emails, $pureNumber . '@' . $gateway['address']);
				$textsGenerated++;
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
