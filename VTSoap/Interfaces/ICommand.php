<?php
	namespace VTSoap\Interfaces;
	
	interface ICommand {
		public function execute();
		
		public function setSubject(ISubject $subject);
	}