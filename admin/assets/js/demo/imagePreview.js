// Multip[le images
// $('#uploadProfile').change(function(e) {
//     var fileName = e.target.files[0].name;
//     $("#file").val(fileName);

//     var reader = new FileReader();
//     reader.onload = function(e) {
//         // get loaded data and render thumbnail.
//         document.getElementById("preview").src = e.target.result;
//         $("#preview").fadeIn();
//     };
//     // read the image file as a data URL.
//     reader.readAsDataURL(this.files[0]);
// });

// Pro-icon
$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:200,
            height:210
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();        
            img.attr('src', e.target.result);
            $(".image-preview-filename").val(file.name);    
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            // alert($('.image-preview-input input:file').val())
        }        
        reader.readAsDataURL(file);
    }); 
})


// in-form image
$(document).on('click', '#close-preview', function(){ 
    $('.image-preview-alt').popover('hide');
    // Hover befor close the preview
    $('.image-preview-alt').hover(
        function () {
           $('.image-preview-alt').popover('show');
        }, 
         function () {
           $('.image-preview-alt').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview-alt').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-alt-clear').click(function(){
        $('.image-preview-alt').attr("data-content","").popover('hide');
        $('.image-preview-alt-filename').val("");
        $('.image-preview-alt-clear').hide();
        $('.image-preview-alt-input input:file').val("");
        $(".image-preview-alt-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-alt-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:200,
            height:210
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-alt-input-title").text("Change");
            $(".image-preview-alt-clear").show();        
            img.attr('src', e.target.result);
            $(".image-preview-alt-filename").val(file.name);    
            $(".image-preview-alt").attr("data-content",$(img)[0].outerHTML).popover("show");
            // alert($('.image-preview-alt-input input:file').val())
        }        
        reader.readAsDataURL(file);
    }); 
})