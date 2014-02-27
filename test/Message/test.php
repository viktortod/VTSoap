<?php
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
				echo "<font color='green'>[Pass]</font>\n";
			} else {
				echo "<font color='red'>[FAILED]</font>";
			}
			
			echo "<br />";
		}
		
		
	}