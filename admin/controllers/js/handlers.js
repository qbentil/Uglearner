$(function()
{
    
    // CONSTANTS
    // const form = document.getElementsByClassName("event_form ");
    // const submit_btn = $(events_form).find("#add_event_btn")
    function add_handler(form, action) 
    {
        var response = '<div class="alert alert-warning alert-dismissable"> Processing.. </div>';
        $(form).find(".ajax-message").html(response).show('slow');
        var formData  = $(form).serialize();
        var url		=	"../admin/controllers/php/handlers.php";
        $.ajax({
            url: url,
            method: 'POST',
            data: formData +'&action='+action,        
        }).done(function(result){
            console.log(result);
            // var data = JSON.parse(result)
            // if(data.status == 1){
            //     form.reset();
            //     response = '<div class="gen alert alert-success">'+data.message+'</div>';
            // }else{
            //     response = '<div class="err alert alert-danger">'+data.message+'</div>';
            // }
            // $(form).find(".ajax-message").html(response).show('slow');
        })
    }

    $("#add_faculty_btn").on("click", function(e)
    {
        e.preventDefault();
        let form = $(".add_faculty"), action = 'new_event'
        add_handler(form, action);
    })

    
    
})