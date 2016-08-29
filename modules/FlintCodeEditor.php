<?php

$title = $_GET['title'];
$version = $_GET['version'];

$lang = $_GET['lang'];

$parserURL = './FlintParser.php';
$parserTestURL = './ParserTest.php';
$svgEditURL = './Leibniz/extensions/Leibniz/modules/res/svgedit/editor/svg-editor.html';




$output = "<!DOCTYPE html><html><head>";
$output .= "<link rel='stylesheet' type='text/css' href='css/FlintCodeEditor.css'>";
$output .= "<title>Interpretation Model Editor</title>";
$output .= "<meta content='text/html;charset=utf-8' http-equiv='Content-Type'><meta content='utf-8' http-equiv='encoding'>";

// $output .= "<script src='js/jquery-3.1.0.min.js'></script>";
$output .= "<script src='js/FlintCodeEditor.js' type='text/javascript' charset='utf-8'></script>";


$output .= "<style type='text/css' media='screen'>
			    #editor {
					position: absolute;
			        width: 99%;
			        height: 90%;
			    }
			     </style></head>";


$demoCode = demoCode();

$output .= "<body><h2 id='editor_title'>Edit Interpretation Model <i>".$title."</i></h2>";
$output .= "<div id='editorFrame'>";
$output .= "<div id='editor'>".$demoCode."</div></div>";
// $output .= "</div>";


$output .= "<script src='res/ace/src-noconflict/ace.js' type='text/javascript' charset='utf-8'></script>";
$output .= "<script>var editor = ace.edit('editor'); editor.setTheme('ace/theme/monokai'); editor.getSession().setMode('ace/mode/javascript'); </script>";

// Submit buttons
$output .= "<div id='editorButtons'>";
$output .= 		'<form action="'.$svgEditURL.'" method="post" id="editorForm" target=_>';
$output .=			'<input name="flintCode" class="code_input" class="editorButton" type="hidden">';
$output .= 			'<button id="edit_cancel" class="editorButton" onclick="self.close()">Cancel</button>';
$output .= 			'<input onclick="getEditorCode()" id="edit_save" class="editorButton" value="Save changes" type="submit">';
$output .= 		'</form>';

// Parser test
$output .=    '<form action="'.$svgEditURL.'" method="post" id="parserTestForm" target=_>';
$output .=      '<input name="flintCode" class="code_input" class="editorButton" value="testValue" type="hidden">';
$output .=      '<input name="lang" id="lang" value="du" class="editorButton" type="hidden">';
$output .=      '<input onclick="getEditorCode()" id="parser_test" class="editorButton" value="Generate Diagram" type="submit">';
$output .=    '</form>';


$output .= 	"</div>";

$output .= "</body></html>";

echo $output;



function demoCode(){
$demoCode = "context Vw.16.1.a.

// Aanvraag VVR BEP
document Aanvraag

rol Minister
rol Vreemdeling

feit Vw.16.1.aanvraag(x: Aanvraag) {
}

feit Vw.16.1.a(a: Aanvraag) {
 geen MVV
}


feit Vw.16.1.a.afwijzing(a: Aanvraag) {
  De aanvraag tot het verlenen van een VVR BEP is afgewezen omdat de 
  vreemdeling niet beschikt over een geldige MVV die overeenkomt met het 
  verblijfsdoel waarvoor de VVR BEP is aangevraagd.
}

feit Vw.17.1.a(v: Vreemdeling) {
a. de vreemdeling die de nationaliteit bezit van één der door bij regeling van
Onze Minister in overeenstemming met Onze Minister van Buitenlandse Zaken aan 
te wijzen landen;
}

feit Vw.17.1.b(v: Vreemdeling) {
b. de gemeenschapsonderdaan, voorzover niet reeds vrijgesteld op grond van een 
aanwijzing als bedoeld onder a;
}

//

//


feit nietAndersBepaald() {
  id = iFeitAWB.4:1.tenzij
  juri = ...
  bron
  
  tenzij bij wettelijk voorschrift anders is bepaald

}

feit gezondheidOnverantwoord(v: Vreemdeling) {
  ref = Vw.17.1.c
  juri = sdlkfjsdklfjl
  source =
c. de vreemdeling voor wie het gelet op diens gezondheidstoestand niet verantwoord 
is om te reizen;
}

feit Vw.17.1.d(v: Vreemdeling) {
d. de vreemdeling die slachtoffer of getuige-aangever is van mensenhandel;
}

feit Vw.17.1.e(v: Vreemdeling) {
e. de vreemdeling die onmiddellijk voorafgaande aan de aanvraag in het bezit was 
van een verblijfsvergunning voor bepaalde tijd als bedoeld in artikel 28 dan wel
 van een verblijfsvergunning voor onbepaalde tijd als bedoeld in artikel 33;
}

feit Vw.17.1.f(v: Vreemdeling) {
f. de vreemdeling die tijdig een aanvraag heeft ingediend tot wijziging van een 
verblijfsvergunning;
}

feit Vw.17.1.g(v: Vreemdeling) {
g. de vreemdeling die behoort tot een bij algemene maatregel van bestuur 
aangewezen categorie;
}

feit Vw.17.1.h(v: Vreemdeling) {
h. een langdurig ingezetene uit een andere EU-lidstaat, dan wel diens echtgenoot
of minderjarig kind ingeval het gezin reeds was gevormd in die andere lidstaat.
}


//Artikel 16, eerste lid, aanhef en onder b, Vw
relatie RR.Vw.16.1.a(m: Minister, v: Vreemdeling, a: Aanvraag)
  m is bevoegd jegens v omtrent afwijzen(a)
wanneer
  Vw.16.1.aanvraag(v)
  en Vw.16.1.a(v)
  en niet (
    Vw.17.1.a(v)
    of Vw.17.1.b(v)
    of Vw.17.1.c(v)
    of Vw.17.1.d(v)
    of Vw.17.1.e(v)
    of Vw.17.1.f(v)
    of Vw.17.1.g(v)
    of Vw.17.1.h(v))
    
actie afwijzen(a: Aanvraag) 
 + Vw.16.1.a.afwijzing(a)";

return $demoCode;
}