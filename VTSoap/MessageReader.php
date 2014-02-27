<?php
	namespace VTSoap;
	
	use VTSoap\Common\Message;

	class MessageReader {
		private $xml;
		
		private $data;
		
		private $dom;
		
		public function __construct($message){
			$this->xml = $message;
			$this->data = array();
			
			$this->dom = new \DOMDocument();
			$this->dom->loadXML($this->xml);
		}
		
		public function parseMessage(){
			$message = $this->dom->firstChild;
			if($message->nodeName != "Message"){
				exit("No message");
			}
			
			$messageInstance = new Message();
			
			foreach($message->childNodes as $child){
				if($child->nodeName == '#text'){
					continue;
				}
				$this->constructElements($child, $messageInstance);
			}
			
			return $messageInstance;
		}
		
		protected function constructElements(\DOMElement $element, $parentObject){
			$object = $this->createObject($element->nodeName);
			$name = $element->nodeName;
			
			
			if($element->hasAttributes()){			
				foreach($element->attributes as $attribute){
					$object->bindData(array(
						$attribute->nodeName => $attribute->nodeValue
					));
				}
			} 
			$parentObject->bindData(array(
				$name => $object
			));
			if($element->hasChildNodes()){
				foreach($element->childNodes as $node){
					if($node->nodeName == "#text"){
						continue;
					}
					
					$this->constructElements($node, $object);
				}
			}
		}
		
		protected function createObject($name){
			$class = ClassNamespace::getInstance()->locateClass($name);
			
			return new $class();
		}
	}