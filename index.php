<?php

$view = new stdClass();

if(isset($_GET['poem'])){
	require_once('Models/PoemGenerator.php');

	$poemGenerator = new PoemGenerator('<POEM>');
	
	$poem = $poemGenerator->process();
}

require_once('Views/poem_generator.phtml');