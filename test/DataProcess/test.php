<?php
	use VTSoap\Interfaces\ICommand;
use VTSoap\Common\Message;
	use VTSoap\MessageReader;
	
	require_once '../../autoload.php';
	
	$dir = dirname(__FILE__);
	
	$inputs = scandir($dir .'/input/');
	$testCase = new MessageTestCase();
	
	foreach($inputs as $input){
		if($input == '.' || $input == '..'){
			continue;
		}
		
		echo "<b>Testing input file {$input}. Result is: ";
		$testCase->test(file_get_contents($dir .'/input/' . $input));	
	}
	
	
	class MessageTestCase {
		public function test($data){
			$messageReader = new MessageReader($data);
			$message = $messageReader->parseMessage();
			
			if($message instanceof Message){
				$operation = $message->get("Service")->get("OperationCall")->get("operation");
				dump($operation);
				if($operation instanceof \VTSoap\Interfaces\ICommand){
					echo "<font color='green'>[PASS]</font>";
				} else {
					echo "<font color='red'>[FAILED]</font>";
				}
			} else {
				echo "<font color='red'>[FAILED]</font>";
			}
			
			echo "<br />";
		}
		
		
	}