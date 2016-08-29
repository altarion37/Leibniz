// $( document ).ready(function() {
    
	var width = window.innerWidth;
	var height = window.innerHeight;

	// // svg placeholder - everything gets placed in here
	// svgContainer = d3.select("#canvas").append("svg:svg")
	// 									.attr("width", width)
	// 									.attr("height", height);


function getEditorCode(){
	var editorContent = editor.getValue();
	document.getElementsByClassName("code_input").value = editorContent;
}



function saveModel(){
	var editorContent = editor.getValue();
	var jsn = JSON.stringify({editorContent});

	var applet = document.getElementById("myApplet");
	applet.setJSONData(jsn);


	console.log("So far, so good: " + editorContent);
}


function drawModel(){

	var width = window.innerWidth;
	var height = window.innerHeight;

	// svg placeholder - everything gets placed in here
	svgContainer = d3.select("#canvas").append("svg:svg")
										.attr("width", width)
										.attr("height", height);

	// function drawNode(300, 300, 30, "blablablabla");


}


function drawNode(){

	console.log("So far, so good: ");



	//Draw the Circle
	var circle = $("#canvas").append("circle")
	                         .attr("cx", 1000)
	                         .attr("cy", 1000)
	                         .attr("r", 30);


}


function drawNode(x, y, r, content){

	console.log("So far, so good: ");



	//Draw the Circle
	var circle = svgContainer.append("circle")
	                         .attr("cx", x)
	                         .attr("cy", y)
	                         .attr("r", r);


}


// });	