<?php
	namespace VTSoap;
	
	class ClassNamespace {
		private static $instance = null;
		
		private $namespaces;
		
		public static function getInstance(){
			if(self::$instance == null){
				self::$instance = new ClassNamespace();
			}
			
			return self::$instance;
		}
		
		private function __construct(){
			$this->namespaces = array(
				"\\VTSoap\\Common\\",
				"\\Server\\Command\\",
				"\\Server\\Service\\",
				"\\Server\\Subject\\",
			);
		}
		
		public function registerNamespace($namespace){
			$this->namespaces[] = $namespace;
		}
		
		public function locateClass($className){
			foreach($this->namespaces as $namespace){
				$class = $namespace . $className;
				if(class_exists($class)){
					return $class;
				}
				
			}
			
			throw new \Exception("{$className} not found.");
		}
	}