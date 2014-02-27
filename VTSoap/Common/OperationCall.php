<?php
	namespace VTSoap\Common;
	
	class OperationCall extends ComplexObject{
		/**
		 * @var \VTSoap\Interfaces\ICommand
		 */
		protected $operation;
		
		public function bindData($data){
			$this->operation = current($data);
		}
	}