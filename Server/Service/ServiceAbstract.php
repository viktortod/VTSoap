<?php
	namespace Server\Service;
	
	use VTSoap\Common\Service;

	use VTSoap\Common\ComplexObject;

	use VTSoap\Interfaces\IService;
	
	abstract class ServiceAbstract extends Service implements IService {
		protected $commands = array();
		
		protected $calledCommand = null;
		
		public function registerCommands(){}
		
		public function processCall(){
			$command = $this->get("OperationCall")->get("operation");
			$subject = $this->get("OperationSubject")->get("Subject");

			$commandNamespace = explode("\\",get_class($command));
			$commandBaseName = $commandNamespace[count($commandNamespace) - 1];
			
			if(in_array($commandBaseName, $this->commands)){
				$command->setSubject($subject);
				$command->execute();
			} else {
				echo "Incorrect command passed";
			}
		}
	}