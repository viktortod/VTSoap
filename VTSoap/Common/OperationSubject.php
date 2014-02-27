<?php
	namespace VTSoap\Common;
	
	class OperationSubject extends ComplexObject {
		/**
		 * @var \VTSoap\Interfaces\ISubject
		 */
		protected $Subject;
		
		public function bindData($data){
			$this->Subject = current($data);
		}
	}