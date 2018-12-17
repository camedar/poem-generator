<?php

require_once __DIR__ . '/PoemInterpreter.php';
require_once __DIR__ . '/Rule.php';

class PoemGenerator {

	private $mainDescriptor = '';

	public function __construct($id) {
		$this->mainDescriptor = $id;
	}

	public function process() {
		$poemInterpreter = new PoemInterpreter($this->mainDescriptor);
		$rule = new Rule();

		$ruleId = $poemInterpreter->searchRuleId();

		while( $ruleId != null) {
			$ruleDef = $rule->getRuleDefinition( str_replace( array("<",">"), "", $ruleId));
			$poemInterpreter->replaceRule( $ruleId, $ruleDef);

			$ruleId = $poemInterpreter->searchRuleId();
		}
		return str_replace( array('$END','$LINEBREAK'), array('','<br>'), $poemInterpreter->getPoemString());
	}

}