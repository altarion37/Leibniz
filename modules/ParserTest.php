<?php


// require 'DutchParser.php';

$flintCode = $_POST['flintCode'];

$lang = $_POST['lang'];
$title = $_POST['title'];


// echo "Language: ".$lang." title: ".$title;

// echo "Alrighty! (:";


$parserURL = './DutchParser.php';




$output = "<!DOCTYPE html><html><head>";



$output = "<!DOCTYPE html>";
$output .= "<html>";
$output .= 	"<head>";
$output .= 		"<title>AceTest</title>";
$output .=    '<meta content="text/html;charset=utf-8" http-equiv="Content-Type"><meta content="utf-8" http-equiv="encoding">';

$output .= 		"<link rel='stylesheet' type='text/css' href='css/ParserTest.css'>";
$output .=    '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>';
$output .= 		"<script src='js/ParserTest.js' type='text/javascript' charset='utf-8'></script>";
$output .=    "<script src='js/Parser.js' type='text/javascript' charset='utf-8'></script>";

$output .= 		'<script src="res/ace/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>';
$output .= 		'<script src="res/ace/src-noconflict/theme-twilight.js" type="text/javascript" charset="utf-8"></script>';
// $output .= 		'<script src="mode-xml.js" type="text/javascript" charset="utf-8"></script>';

$output .= 	"</head>";
$output .= 	"<body>";
$output .= 	"<style>";
$output .= 	"#editor {
			    position: absolute;
			    width: 100%;
			    height: 97%;
			}
			#editor2 {
			    position: absolute;
			    width: 100%;
			    height: 100%;
			}
			</style>";

// Get dummy code
$demoCode = demoCode();

// $output .= 	'<div id="canvas">';
$output .= '<div id="editor_title">Flint Code Parser Tester</div>';
$output .= 	'<div id="editorWrapper">';

// FlintCode Editor
$output .= 	'<div class="editorFrame" id="flintEditorFrame" >';
$output .= 	'&nbsp;';
$output .= 	'<div id="editor">'.$demoCode.'</div>';
$output .= 	'</div>';

$parseResults = parseResults();

// Parser Results
$output .= 	'<div class="editorFrame" id="parserResultFrame" >';
$output .= 	'&nbsp;';
$output .= 	'<div id="editor2">'.$parseResults.'</div>';
$output .= 	'</div>';



// Submit buttons
$output .= "<div id='editorButtons'>";
$output .= 		'<form id="editorForm" action="./Leibniz/extensions/Leibniz/modules/FlintCodeEditor.php">';
$output .=			'<input name="flintCode" id="code_input" class="editorButton" type="hidden">';
// $output .= 			'<button class="editorButton" onclick="parse" type="hidden">Parse Flint code</button>';
$output .= 			'<input onclick="getEditorCode()" id="edit_save" class="editorButton" value="Generate Flint Code" type="submit">';
$output .= 		'</form>';
$output .= 	'</div>';

// editorWrapper
$output .= 	'</div>';

// Canvas
// $output .= 	'</div>';



$output .= 	'<script>';
$output .= 	'window.onload = function() {
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/twilight");
    // var XmlMode = require("ace/mode/xml").Mode;
    // editor.getSession().setMode(new XmlMode());

    var editor2 = ace.edit("editor2");
    editor2.setTheme("ace/theme/twilight");
    // editor2.getSession().setMode(new XmlMode());

};
</script>';


$output .= 	'</body>';
$output .= 	'</html>';






echo $output;

function parseResults(){
  $demoResults = '
    VERB:       rejected   [reject, CONCEPT reject]
    SUBJECT:    
    OBJECT:     application (to grant a temporary residence permit)   [CONCEPT Application]


    INDIRECT VOICE:   "the application ... is rejected "
  ';

  return $demoResults;
}





function demoCode(){

$demoCode = "the application to grant a temporary residence permit is
  rejected because the alien constitutes a threat to public
  order or national security";


$demoCode2 = "context Vw.16.1.a.

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







































// $output .= "<link rel='stylesheet' type='text/css' href='css/ParserTest.css'>";
// $output .= "<title>Flint Code Parser Test</title>";
// $output .= "<meta content='text/html;charset=utf-8' http-equiv='Content-Type'><meta content='utf-8' http-equiv='encoding'>";



// // $output .= "</head>";


// // // $output .= "<script src='js/jquery-3.1.0.min.js'></script>";
// $output .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>';
// $output .= "<script src='js/FlintCodeEditor.js' type='text/javascript' charset='utf-8'></script>";


// $output .= "<style type='text/css' media='screen'>
// 			    #flintCodeEditor {
// 					position: absolute;
// 			        width: 20%;
// 			        height: 20%;
// 			    }
// 			    #outputArea {
// 					position: absolute;
// 			        width: 49%;
// 			        height: 40%
// 			    }
// 			     </style></head>";





// $demoCode = "blablablablablabla";



// $output .= "<body>";

// $output .= "<div id='code_editors>";
// $output .= "<h2 id='editor_title'>Flint Code Parser Tester <i>".$title."</i></h2>";

// // Flint code editor
// $output .= "<div id='flintEditorFrame'>";
// $output .= 		"<div id='flintCodeEditor'>".$demoCode."</div>";
// $output .= 		"<script src='res/ace/src-noconflict/ace.js' type='text/javascript' charset='utf-8'></script>";
// $output .= 		"<script>var flintCodeEditor = ace.edit('flintCodeEditor'); flintCodeEditor.setTheme('ace/theme/monokai'); flintCodeEditor.getSession().setMode('ace/mode/javascript'); </script>";
// $output .= "</div>";

// // Output area 
// $output .= "<div id='outputAreaFrame'>";
// $output .= "<div id='outputArea'>".$demoCode."</div>";
// $output .= "<script src='res/ace/src-noconflict/ace.js' type='text/javascript' charset='utf-8'></script>";
// $output .= "<script>var outputEditor = ace.edit('outputArea'); outputEditor.setTheme('ace/theme/monokai'); outputEditor.getSession().setMode('ace/mode/javascript'); </script>";
// $output .= "</div>";

// // code_editors
// $output .= "</div>";






// $output .= "</body></html>";




