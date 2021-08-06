$(function()
{
    // CONSTANTS
    const events_form = document.getElementsByClassName("event_form ");
    const submit_btn = $(events_form).find("#add_event_btn")
    function add_event() 
    {
        var response = '<div class="alert alert-warning alert-dismissable"> Processing.. </div>';
        $(events_form[0]).find(".ajax-message").html(response).show('slow');
        var formData  = $(events_form[0]).serialize();
        var url		=	"../admin/controllers/php/events.php";
        $.ajax({
            url: url,
            method: 'POST',
            data: formData +'&action=null',        
        }).done(function(result){
            console.log(result);
            // var data = JSON.parse(result)
            // if(data.status == 1){
            //     events_form[0].reset();
            //     response = '<div class="gen alert alert-success">'+data.message+'</div>';
            // }else{
            //     response = '<div class="err alert alert-danger">'+data.message+'</div>';
            // }
            // $(events_form[0]).find(".ajax-message").html(response).show('slow');
        })
    }

    $(submit_btn).on("click", function(e)
    {
        e.preventDefault();
        add_event()
    })

    
    
})