function preview_images() 
{
    var total_file=document.getElementById("images").files.length;
    for(var i=0;i<total_file;i++)
    {
        $('#image_preview').append("<div class='col-md-2'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
    }

    $('#image_preview').css("display", "block")
}
function reset_preview(){
    $('#image_preview').html("");
    $('#image_preview').css("display", "none")
}