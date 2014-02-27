<?php
	namespace VTSoap\Common;
	
	use VTSoap\Serializer\ClassSerializer;

	class ComplexObject {
		public function getProperties(){
			return get_object_vars($this);
		}
		
		public function toXml(){
			ClassSerializer::serializeClass($this);
		}
		
		/**
		 * @return \VTSoap\Common\ComplexObject
		 */
		public function get($field){
			return $this->$field;
		}
		
		public function bindData($data){
			foreach($data as $key => $value){
				if(!property_exists($this, $key)){
					dump($this);
					throw new \Exception("Binding invalid key");
				}
				$methodName = "get" . ucfirst($key);
				if(!method_exists($this, $methodName)){
					$this->$key = $value;
				} else {
					$this->$methodName($value);
				}
			}
		}
	}