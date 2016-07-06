<?php 

require_once("classes/monkey_web_parser.class.php") ;


	$parser 				= new parser ; 



	$data['header'] 		= 'Example';
	$data["siblings"][0] 	= array('first_name'=>"Jason","last_name"=>"Brown","age"=>20) ;	
	$data["siblings"][1]	= array('first_name'=>"Karen","last_name"=>"Christy","age"=>21) ; 

	//				
	$data["pets"][0]		= array("name"=>"Shaggy","animal_type"=>"dog"); 
	$data["pets"][1]		= array("name"=>"Pretty","animal_type"=>"parrot");

	//define groups		
	$group 					= array('siblings','pets');				
	
	$template 				= 'templates/example.template.html' ;
	$html 					= $parser->parse_file($template, NULL, $data, $group) ;	

	echo $html;