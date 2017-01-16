MONKEY WEB

	Monkey web is a php templating engine that is light weight. It allows you to populate your html templates with data only. This means that there are no control/ternary statement options built into Monkey Web and you would have to ensure that those codes are placed in your application's controller section.

FEATURES

	1) Define individual fields to be parsed.
	2) Define groups of information to be parsed.

REQUIREMENTS

	Any server that is able to run php.


INSTALLATION

	Clone project in your working directory and run the index.php file.


USAGE


	This project comes with the following layout:
	1) monkey_web/class/monkey_web_parser.class.php
	2) monkey_web/templates/example.template.html
	3) monkey_web/index.php
	4) monkey_web/README.mb

STEP 1

	In your *.template.html file:

		You can define the fields that your template is expecting in curley braces:
		
		{header1}

		You can also define groups of information that you are expecting to be replaced:
	
		{siblings:begin}
			{first_name} {last_name} {age}
		{siblings:end}

		{header2}
		{pets:begin}
			{name} {animal_type}
		{pets:end}

STEP 2

	In your *.php file:


	You would instansiate the class
	require_once("classes/monkey_web_parser.class.php");

	$parser = new parser ; 

	You can then define your array as follows:
	$data['header1'] 		= 'Example 1';
	$data["siblings"][0] 	= array('first_name'=>"Jason","last_name"=>"Brown","age"=>20) ;	
	$data["siblings"][1]	= array('first_name'=>"Karen","last_name"=>"Christy","age"=>21) ; 				
	$data["header2"]		="Example 2";
	$data["pets"][0]		= array("name"=>"Shaggy","animal_type"=>"dog"); 
	$data["pets"][1]		= array("name"=>"Pretty","animal_type"=>"parrot");		
		
	
	$template 				= 'templates/example.template.html' ;
	$html 					= $parser->parse_file($template, NULL, $data) ;	

	echo $html ;
