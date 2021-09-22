$(function()
{
    // CONSTANTS
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
            // console.log(result);
            var data = JSON.parse(result)
            if(data.status == 1){
                response = '<div class="gen alert alert-success">'+data.message+'</div>';
                form[0].reset();
            }else{
                response = '<div class="err alert alert-danger">'+data.message+'</div>';
            }
            $(form).find(".ajax-message").html(response).show('slow');
        })
    }


    // Adding Faculty
    $("#add_faculty_btn").on("click", function(e)
    {
        e.preventDefault();
        let form = $(".add_faculty"), action = 'new_event'
        add_handler(form, action);
    })

    
    
})