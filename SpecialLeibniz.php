<?php

class SpecialLeibniz extends SpecialPage {
	function __construct() {
		parent::__construct( 'Leibniz' );
	}

	function execute( $par ) {
		$request = $this->getRequest();
		$output = $this->getOutput();
		$this->setHeaders();

		# Get request data from, e.g.
		$param = $request->getText( 'param' );

		# Do stuff
		# ...
		// $wikitext = 'TestText';
		// $output->addWikiText( $wikitext );

		$html = '<form name="query" action="./Leibniz/extensions/Leibniz/modules/ParserTest.php" method="POST">';

		$html .= '<div class="sol_input"><label for="url">URL to on-line source:</label><input type="text" id="url" value="URL to on-line source:"/></div>';		
		$html .= '<div class="sol_input"><label for="sol">Legal text identifier:</label><input type="text" id="sol" value="Legal text identifier:"/></div>';
		$html .= '<div class="sol_input"><label for="sol_date">Legal text valid since (date):<input type="text" id="sol_date" value="Legal text valid since (date):"/></div>';
		$html .= '<div class="sol_input"><label for="sol_text">Legal text:<input type="text" height="50px" id="sol_text" value="the application to grant a temporary residence permit is
  rejected because the alien constitutes a threat to public
  order or national security"/></div>';

		$html .= '<button type="submit"/>Query legal text</button>';
		$html .= '</form>';


		$output->addHTML( $html );
	}
}