<?php
	namespace VTSoap\Interfaces;
	
	interface IService{
		public function registerCommands();
		
		public function processCall();
	}