function getEditorCode(){
	var editorContent = editor.getValue();
	document.getElementById("code_input").value = editorContent;
}


$('#parse_button').click(function() { 

		var flintCode = editor.getValue();
        $.ajax({
            url: '../Parser.php',
            type: 'POST',
            data: {'flintCode':flintCode}, // An object with the key 'submit' and value 'true;
            success: function (result) {

            }
        });  

});