<?php
	namespace Server\Subject;
	use VTSoap\Interfaces\ISubject;

	use VTSoap\Common\ComplexObject;

	class User extends ComplexObject implements ISubject{
		protected $username;
		
		protected $password;
	}