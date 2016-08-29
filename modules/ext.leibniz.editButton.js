// console.log("Teeeeeeeest!");

(function($, mw) {

$(document).ready(function() {
	
	var pageTitle = mw.config.get('wgTitle');
	// console.log("pageTitle: " + pageTitle);

	var lang = mw.config.get('wgContentLanguage');
	// console.log("Content language: " + lang);

	var version = "0.9";

	// var user = CURRENTUSER;

	// var uri = pageTitle+"-"+version+"-"+lang+"-"+user;

	// console.log("URI: " + uri);

	//var editorURL = "http://localhost/Leibniz/extensions/Leibniz/modules/Editor.php";

	var svgEditorURL = "";
	var formEditorURL = "FormEditor.php?title="+pageTitle+"&version=1.4";

	// var flintEditorURL = "http://localhost/Leibniz/extensions/Leibniz/modules/ParserTest.php?title="+pageTitle+"&lang="+lang;

	var flintEditorURL = "./extensions/Leibniz/modules/ParserTest.php";
	// var flintEditorURL = "./ParserTest.php";



	var buttonContainer = $('<div id="buttonContainer"></div>');


	var editButtonsForm = $('<form action="' + flintEditorURL + '" method="post" id="editorForm" target=_></form> ');
		var page_title_input = $('<input name="pageTitle" id="page_title" class="code_input" class="editorButton" type="hidden">' );
		var source_of_law_input = $('<input name="sourceOfLaw" id="source_of_law" class="code_input" class="editorButton" type="hidden">' );
		var sol_date_input = $('<input name="solDate" id="sol_date" class="code_input" class="editorButton" type="hidden">' );
		var model_version_date_input = $('<input name="modelVersionDate" id="model_version_date" class="code_input" class="editorButton" type="hidden">' );
		var model_version_number_input = $('<input name="modelVersionNumber" id="model_version_number" class="code_input" class="editorButton" type="hidden">' );
		var model_language_input = $('<input name="modelLanguage" id="modelLanguage" class="code_input" class="editorButton" type="hidden">' );
		var model_author_input = $('<input name="modelAuthor" id="modelAuthor" class="code_input" class="editorButton" type="hidden">' );

		var flintEditorButton = $('<button id="flintEditorButton">Edit Flint code</button>');
		var svgEditorButton = $('<button id="svgEditorButton">Edit with graphical editor</button>');


		$(editButtonsForm).append(page_title_input);
		$(editButtonsForm).append(source_of_law_input);
		$(editButtonsForm).append(sol_date_input);
		$(editButtonsForm).append(model_version_date_input);
		$(editButtonsForm).append(model_version_number_input);
		$(editButtonsForm).append(model_author_input);

		$(editButtonsForm).append(flintEditorButton);
		$(editButtonsForm).append(svgEditorButton);



	$(buttonContainer).append(editButtonsForm);
	$('.mw-indicators').append(buttonContainer);

	// var svgEditorForm = $('<form action="' + svgEditorURL + '" method="post" id="editorForm" target=_></form> ');
	// var svgEditorButton = $('<button>Edit with graphical editor</button>');
	// $(svgEditorForm).append(svgEditorButton);

	// var flintEditorForm = $('<form action="' + flintEditorURL + '" method="post" id="editorForm"></form> ');
	// var flintEditorButton = $('<button>Edit Flint code</button>');
	// $(flintEditorForm).append(flintEditorButton);
	
	
	// $(buttonContainer).append(formEditorForm);
	// $(buttonContainer).append(svgEditorForm);
	// $(buttonContainer).append(flintEditorForm);


	$('#flintEditorButton').click(function(){
	   $('#editButtonsForm').attr('action', flintEditorURL );
	});


	var svgEditorURL = "./Leibniz/extensions/Leibniz/modules/res/svgedit/editor/svg-editor.html";
	$('#svgEditorButton').click(function(){
	   $('#editButtonsForm').attr('action', "./Leibniz/extensions/Leibniz/modules/res/svgedit/editor/svg-editor.html" );
	   	console.log("Nope...");
	});



	// Variable to hold request
var request;

// Bind to the submit event of our form
$("#editButtonsForm").submit(function(event){

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "/form.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

    // Prevent default posting of form
    event.preventDefault();
});


});

})(jQuery, mediaWiki);
