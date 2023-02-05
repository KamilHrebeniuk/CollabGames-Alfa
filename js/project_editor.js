$(function(){
    //file input field trigger when the drop box is clicked
    $("#project_editor-slider-main-image-container").click(function(){
        $("#project_editor-miniature-input").click();
    });

    //prevent browsers from opening the file when its dragged and dropped
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    //call a function to handle file upload on select file
    $('input[type=file]').on('change', fileUpload);
});

function fileUpload(event){
    //notify user about the file upload status
    $("#project_editor-slider-main-image-container").html(event.target.value+" uploading...");

    //get selected file
    files = event.target.files;

    //form data check the above bullet for what it is
    var data = new FormData();

    //file data is presented as an array
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if(!file.type.match('image.*')) {
            //check file type
            $("#project_editor-slider-main-image-container").html("Please choose an images file.");
        }else if(file.size > 1048576){
            //check file size (in bytes)
            $("#project_editor-slider-main-image-container").html("Sorry, your file is too large (>1 MB)");
        }else{
            //append the uploadable file to FormData object
            data.append('file', file, file.name);

            //create a new XMLHttpRequest
            var xhr = new XMLHttpRequest();

            //post file data for upload
            xhr.open('POST', 'upload.php', true);
            xhr.send(data);
            xhr.onload = function () {
                //get response and show the uploading status
                var response = JSON.parse(xhr.responseText);
                if(xhr.status === 200 && response.status == 'ok'){
                    var tmp = '<img class="project_editor-slider-main-image" src="uploads/' + file.name + '"/>';
                    $("#project_editor-slider-main-image-container").html(tmp);
                    tmp = '<img class="project_editor-slider-main-image" src="uploads/' + file.name + '"/>';
                    $(".project_page-project-main-image").html(tmp);
                    var target = document.getElementById("project_page-background-image");
                    target.src = 'uploads/' + file.name;
                }else if(response.status == 'type_err'){
                    $("#project_editor-slider-main-image-container").html("Please choose an images file. Click to upload another.");
                }else{
                    $("#project_editor-slider-main-image-container").html(response.status);
                }
            };
        }
    }
}