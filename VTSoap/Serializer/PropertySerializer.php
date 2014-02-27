<?php
	namespace VTSoap\Serializer;
	
	abstract class PropertySerializer{
		public function validate();
		
		public function process($property){
			if($this->validate()){
				return $this->serializeProperty($property);
			}
			
			throw new PropertySerializerException("This property cannot be unserialized");
		}
	} 