<?php


class PoemInterpreter {

	private $poem = '';

	public function __construct($id) {
		$this->poem = $id;
	}

	public function getPoemString(){
		return $this->poem;
	}

	public function searchRuleId() {
		preg_match( '/<[A-Z]*>/', $this->poem, $match);
		if(!empty( $match)){
			return $match[0];
		}
		
		return null;
	}

	public function replaceRule( $ruleId, $ruleDef) {
		$strPos = strpos( $this->poem, $ruleId);
		$ruleStrA = substr( $this->poem, 0, $strPos);
		$ruleStrB = substr( $this->poem, $strPos + strlen($ruleId), strlen($this->poem));
		$this->poem = $ruleStrA . $ruleDef . $ruleStrB;
	}

}