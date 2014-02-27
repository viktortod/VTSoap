<?php
	namespace VTSoap\Common;
	
	class Message extends ComplexObject {
		/**
		 * @var \VTSoap\Common\Service
		 */
		protected $Service;
		
		public function bindData($data){
			$this->Service = current($data);
		}
	}