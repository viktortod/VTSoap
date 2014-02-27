<?php
	namespace Server;
	
	use VTSoap\MessageReader;

	use Server\Service\AuthService;

	final class Server {
		private static $instance = null;
		
		private $services = array();
		/**
		 * @return \Server\Server
		 */
		public static function getInstance(){
			if(self::$instance == null){
				self::$instance = new Server();
			}
			
			return self::$instance;
		}
		
		private function __construct(){
		
		}
		
		private function __clone(){}
		
		
		public function registerService($serviceId, $serviceHandler){
			if(isset($this->services[$serviceId])){
				throw new Exception("Duplicate service IDs");
			}
			
			$this->services[$serviceId] = $serviceHandler;
		}
		
		public function runServer(){
			$message = '<Message>
							<AuthService>
								<OperationCall>
									<LoginUserCommand />
								</OperationCall>
								<OperationSubject>
									<User username="john.smith" password="12345" />
								</OperationSubject>
							</AuthService>
						</Message>';
			
			$reader = new MessageReader($message);
			$message = $reader->parseMessage();
			
			$service = $message->get("Service");
			$service->registerCommands();
			$service->processCall();
		}
		
		public function wsdl(){
			
		}
	}