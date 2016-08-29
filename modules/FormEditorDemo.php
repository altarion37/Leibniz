<?php

$title = $_GET['title'];
$version = $_GET['version'];

// Head, imports
$output = "<!DOCTYPE html><html><head>";
$output .= "<link rel='stylesheet' type='text/css' href='css/FormEditor.css'>";
$output .= "<meta content='text/html;charset=utf-8' http-equiv='Content-Type'><meta content='utf-8' http-equiv='encoding'>";
$output .= "<script src='js/FormEditor.js' type='text/javascript' charset='utf-8'></script>";
$output .= "<title>Interpretation Model Form Editor</title>";
$output .= "</head><body>";

$output .= "<div id='editor_title'>Edit Interpretation Model <i>".$title."</i></div>";
$output .= "<div id='editorFrame'>";


// Pre- and Post-conditions
$output .= 		"<div id='pre_post_conditions' class='section'>";
$output .= 			"<div class='section_header'>";
$output .=				"<div class='section_title'>Pre-/Post-Conditions</div>";
$output .=				"<input type='button' class='add_item' value='Add Pre-/Post-condition' />";
$output .=			"</div>";
$output .=			"<div class='section_items'>";
$output .= 				drawPrePostconditions();
$output .=			"</div>";
$output .= 		"</div>";

// Normative Relations
$output .= 		"<div id='normative_relations' class='section'>";
$output .= 			"<div class='section_header'>";
$output .=				"<div class='section_title'>Normative Relations</div>";
$output .=				"<input type='button' class='add_item' value='Add Normative Relation' />";
$output .=			"</div>";
$output .=			"<div class='section_items'>";
$output .= 				drawNormativeRelations();
$output .=			"</div>";
$output .= 		"</div>";

// iFacts
$output .= 		"<div id='iFacts' class='section'>";
$output .= 			"<div class='section_header'>";
$output .=				"<div class='section_title'>iFacts</div>";
$output .=				"<input type='button' class='add_item' value='Add iFact' />";
$output .=			"</div>";
$output .=			"<div class='section_items'>";
$output .= 				drawiFacts();
$output .=			"</div>";
$output .= 		"</div>";

// Edges
$output .= 		"<div id='edges' class='section'>";
$output .= 			"<div class='section_header'>";
$output .=				"<div class='section_title'>Edges</div>";
$output .=				"<input type='button' class='add_item' value='Add Edge' />";
$output .=			"</div>";
$output .=			"<div class='section_items'>";
$output .= 				drawEdges();
$output .=			"</div>";
$output .= 		"</div>";


// ANDs/ORs
$output .= 		"<div id='ands_ors' class='section'>";
$output .= 			"<div class='section_header'>";
$output .=				"<div class='section_title'>ANDs/ORs</div>";
$output .=				"<input type='button' class='add_item' value='Add AND/OR' />";
$output .=			"</div>";
$output .=			"<div class='section_items'>";
$output .= 				drawAndsOrs();
$output .=			"</div>";
$output .= 		"</div>";

// Negations
$output .= 		"<div id='negations' class='section'>";
$output .= 			"<div class='section_header'>";
$output .=				"<div class='section_title'>Negations</div>";
$output .=				"<input type='button' class='add_item' value='Add Negation' />";
$output .=			"</div>";
$output .=			"<div class='section_items'>";
$output .= 				drawNegations();
$output .=			"</div>";
$output .= 		"</div>";


// Power
$output .= 		"<div id='power' class='section'>";
$output .= 			"<div class='section_header'>";
$output .=				"<div class='section_title'>Powers</div>";
$output .=				"<input type='button' class='add_item' value='Add Power' />";
$output .=			"</div>";
$output .=			"<div class='section_items'>";
$output .= 				drawPowers();
$output .=			"</div>";
$output .= 		"</div>";


// Negations
$output .= 		"<div id='acts' class='section'>";
$output .= 			"<div class='section_header'>";
$output .=				"<div class='section_title'>Acts</div>";
$output .=				"<input type='button' class='add_item' value='Add Act' />";
$output .=			"</div>";
$output .=			"<div class='section_items'>";
$output .= 				drawActs();
$output .=			"</div>";
$output .= 		"</div>";

$output .= "<input type='button' value='Generate diagram' />";



// Closing editorFrame
// $output .= "</div>";
$output .= "</body></html>";

echo $output;



//Retrieving data and drawing forms

function drawPowers(){
	return drawPower().drawPower();
}

function drawActs(){
	return drawAct().drawAct();
}

function drawNegations(){
	return drawNegation().drawNegation();
}

function drawAndsOrs(){
	return drawAndOr().drawAndOr();
}

function drawPrePostconditions(){
	return drawPrePostcondition() . drawPrePostcondition();
}

function drawEdges(){
	return drawEdge().drawEdge();
}

function drawiFacts(){
	return drawiFact().drawiFact();
}

function drawNormativeRelations(){
	return drawNormativeRelation().drawNormativeRelation();
}



// Drawing single items


function drawPower(){
	$power .= "<div class='edge item'>
						<div class='item_title'>Power Title</div>
						<div class='item_attr'>
							<label for='power_uid'>Precondition URI: </label>
							<input type='text' class='UID' name='power_uid' value='Power URI (auto-generated)'/>
						</div>
						<div class='item_attr'>
							<label for='power_actor'>Actor: </label>
							<input type='text' class='precond_title' name='power_actor' value='E.g. Minister'/>
						</div>
						<div class='item_attr'>
							<label for='power_recipient'>Recipient: </label>
							<input type='text' class='precond_title' name='power_recipient' value='E.g. Alien'/>
						</div>						
						<div class='item_attr'>
							<label for='power_object'>Object: </label>
							<input type='text' name='power_object' value='E.g. Application'/>
						</div>
					</div>";

	return $power;
}


function drawAct(){
	$power .= "<div class='edge item'>
						<div class='item_title'>Act Title</div>
						<div class='item_attr'>
							<label for='act_uid'>Act URI: </label>
							<input type='text' class='UID' name='act_uid' value='Act URI (auto-generated)'/>
						</div>
						<div class='item_attr'>
							<label for='power_type'>Type: </label>
							<input type='text' name='power_type' value='E.g. Rejection'/>
						</div>
						<div class='item_attr'>
							<label for='act_object'>Recipient: </label>
							<input type='text' name='act_object' value='E.g. Application'/>
						</div>						
					</div>";

	return $power;
}


function drawNormativeRelation(){
	$normativeRelation .= "<div class='edge item'>
						<div class='item_title'>Normative Relation Title</div>
						<div class='item_attr'>
							<label for='norm_rel_uid' >Precondition URI: </label>
							<input type='text' class='UID' name='norm_rel_uid' value='Power URI (auto-generated)'/>
						</div>
						<div class='item_attr'>
							<label for='norm_rel_title' >Title: </label>
							<input type='text' name='norm_rel_title' value='E.g. Normative Relation 1'/>
						</div>
						<div class='item_attr'>
							<label for='precond_type'>Type: </label>
							<input type='text' name='precond_type' value='E.g. CLAIMRIGHT-DUTY'/>
						</div>
					</div>";

	return $normativeRelation;
}


function drawNegation(){
	$iFact .= "	<div class='not item'>
						<div class='item_title'>Title = NOT URI</div>
						<div>
							<div class='item_attr'>
								<label for='not_uid'>NOT URI: </label>
								<input type='text' name='not_uid' class='UID' value='NOT URI (auto-generated)'/>
							</div>
							<div class='item_attr'>
								<label for='not_in' class='item_attr'>Incoming object: </label>
								<input type='text' name='not_in' value='Incoming object URI'/>
							</div>
							<div class='item_attr'>
								<label for='not_out' class='item_attr'>Outgoing object: </label>
								<input type='text' name='not_out' value='Outgoing object URI'/>
							</div>
						</div>
					</div>";

	return $iFact;
}


function drawAndOr(){
	$iFact .= "	<div class='and_or item'>
						<div class='item_title'>AND/OR title = URI</div>
						<div>
							<div class='item_attr'>
								<label for='and_or_uid' >AND/OR URI: </label>
								<input type='text' name='and_or_uid' class='UID' value='AND/OR URI (auto-generated)'/>
							</div>
							<div class='item_attr'>
								<label for='and_or_type'>Type: </label>
								<input type='text' name='and_or_type' value='and or or '/>
							</div>
							<div class='item_attr'>
								<label for='and_or_in1' class='item_attr'>Incoming object 1: </label>
								<input type='text' name='and_or_in1' value='Incoming object URI'/>
							</div>
							<div class='item_attr'>
								<label for='and_or_in2' class='item_attr'>Incoming object 2: </label>
								<input type='text' name='and_or_in2' value='Incoming object URI'/>
							</div>
							<div class='item_attr'>
								<label for='and_or_in3' class='item_attr'>Incoming object 3: </label>
								<input type='text' name='and_or_in3' value='Incoming object URI'/>
							</div>
							<div class='item_attr'>
								<label for='and_or_out' class='item_attr'>Outgoing target: </label>
								<input type='text' name='and_or_out' value='Outgoing object URI'/>
							</div>
						</div>
					</div>";

	return $iFact;
}


function drawPrePostcondition(){
	$precondition .= "<div class='edge item'>
						<div class='item_title'>Precondition Title</div>
						<div class='item_attr'>
							<label for='precond_uid' >Precondition URI: </label>
							<input type='text' class='UID' name='precond_uid' value='Precondition URI (auto-generated)'/>
						</div>
						<div class='item_attr'>
							<label for='precond_def' >Definition: </label>
							<input type='text' class='precond_title' name='precond_def' value='Description'/>
						</div>
						<div class='item_attr'>
							<label for='precond_type'>Pre/Post: </label>
							<input type='text' name='precond_type' value='pre OR post'/>
						</div>
					</div>";

	return $precondition;
}


function drawEdge(){
	$edge .= "	<div class='edge item'>
					<div class='item_title'>Edge title = Edge URI</div>
						<div class='item_attr'>
							<label for='edge_uid' >Edge URI: </label>
							<input type='text' class='UID' name='edge_uid' value='Edge URI (auto-generated)'/>
						</div>
						<div class='item_attr'>
							<label for='target1'>Target 1: </label>
							<input type='text' name='target1' value='target URI'/>
						</div>
						<div class='item_attr'>
							<label for='target2' class='item_attr'>Target 2: </label>
							<input type='text' name='target2' value='target URI'/>
						</div>
						<div class='item_attr'>
							<label for='arrow' class='item_attr'>Arrow at target URI: </label>
							<input type='text' name='arrow' value='Default NULL or target URI'/>
						</div>
						<div class='item_attr'>
							<label for='plus_minus' class='item_attr'>Plus or Minus: </label>
							<input type='text' name='plus_minus' value='Default NULL or plus or minus' />
						</div>
				</div>";

	return $edge;
}


function drawiFact(){
	$iFact .= "	<div class='iFact item'>
					<div class='item_title'>iFact title = iFact name</div>
					<div>
						<div class='item_attr'>
							<label for='iFact_uid' >iFact URI: </label>
							<input type='text' name='iFact_uid' class='UID' value='iFact URI (auto-generated)'/>
						</div>
						<div class='item_attr'>
							<label for='iFact_name'>Name: </label>
							<input type='text' name='iFact_name' value='iFact name'/>
						</div>
						<div class='item_attr'>
							<label for='def_long' class='item_attr'>Definition long: </label>
							<input type='text' name='def_long' value='Elaborate definition'/>
						</div>
						<div class='item_attr'>
							<label for='def_short' class='item_attr'>Definition short: </label>
							<input type='text' name='def_short' value='Short def. for the diagram node'/>
						</div>
						<div class='item_attr'>
							<label for='jurisconnect' class='item_attr'>Jurisconnect-code: </label>
							<input type='text' name='jurisconnect' value='Jurisconnect-code'/>
						</div>
						<div class='item_attr'>
							<label for='legal_link' class='item_attr'>Legal link: </label>
							<input type='text' name='legal_link' value='Legal link'/>
						</div>
						<div class='item_attr'>
							<label for='iFact_note' class='item_attr'>Remarks: </label>
							<input type='text' name='iFact_note' value='Remarks'/>
						</div>
						<div class='item_attr'>
							<label for='iFact_used' class='item_attr'>iFact used: </label>
							<input type='text' name='iFact_used' value='(not sure if this is required)'/>
						</div>
						<div class='item_attr'>
							<label for='iFact_lang' class='item_attr'>Language: </label>
							<input type='text' name='iFact_lang' value='dutch or english'/>
						</div>
						<div class='item_attr'>
							<label for='iFact_author' class='item_attr'>iFact author: </label>
							<input type='text' name='iFact_author' value='Author name'/>
						</div>
					</div>
				</div>";

	return $iFact;
}