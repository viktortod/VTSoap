<?php
	namespace Server\Service;
	
	class AuthService extends ServiceAbstract {
		public function registerCommands(){
			$this->commands = array(
				"LoginUserCommand",
				"IsUserLoggedCommand",
				"LogoutUserCommand",
				"GetUserInfoCommand"
			);	
		}
	}