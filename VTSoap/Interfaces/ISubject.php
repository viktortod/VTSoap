<?php
	namespace VTSoap\Interfaces;
	
	interface ISubject {
		public function bindData($data);
		
		public function getProperties();
	}