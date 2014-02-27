<?php
	namespace Server\Command;
	
	use VTSoap\Interfaces\ISubject;

	use VTSoap\Interfaces\ICommand;

	class LoginUserCommand implements ICommand{
		protected $subject;
		
		public function setSubject(ISubject $subject){
			$this->subject = $subject;
		}
		
		public function execute(){
			$data = $this->subject->getProperties();
			
			$username = $data['username'];
			
			$password = $data['password'];
			
			echo "Username is: [{$username}] and password is [{$password}]";
		}
	}