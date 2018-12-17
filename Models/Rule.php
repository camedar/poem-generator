<?php

class Rule {

	protected $rules = array();


	public function __construct() {
		$gramaticaRulesFile = fopen('assets/gramatical_rules.txt','r');
		while ($line = fgets($gramaticaRulesFile)) {

			 $rulesArr = explode( ":",  utf8_encode($line));
			 $this->rules[$rulesArr[0]] = str_replace( "\n", "",$rulesArr[1]);
		}
		fclose($gramaticaRulesFile);
		
	}

	public function getRuleDefinition($idx) {
		if(isset($this->rules[$idx])){
			$ruleStr = "";
			$segments = explode( " ", $this->rules[$idx]);
			foreach ($segments as $val) {
				if(strpos( $val, "|") === false){
					$ruleStr .= $val . " ";
				}
				else {
					$optionsArr = explode( "|", $val);
					$numOfElem = sizeof($optionsArr);
					$ruleStr .= $optionsArr[rand( 0, $numOfElem - 1)] . " ";
				}
			}
			return substr( $ruleStr, 0, strlen($ruleStr) - 1);
		}

		return null;
	}
}