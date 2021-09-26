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
            console.log(result);
            var data = JSON.parse(result)
            if(data.status == 1){
                response = '<div class="gen alert alert-success">'+data.message+'</div>';
                form[0].reset();
            }else{
                response = '<div class="err alert alert-danger">'+data.message+'</div>';
            }
            $(form).find(".ajax-message").html(response).delay(5000).hide('slow');;
        })
    }


    // Adding Faculty
    $(".add_faculty").on("submit", function(e)
    {
        e.preventDefault();
        let form = $(this), action = 'new_faculty'
        add_handler(form, action);
    })

    // Updating Faculty 

    // Basic Info
    $(".update_faculty_basic_ifo").on("submit", function(e)
    {
        e.preventDefault();
        let form = $(this), action = 'faculty_basic_info'
        add_handler(form, action);
    })

    // Basic Info
    $(".update_faculty_social_ifo").on("submit", function(e)
    {
        e.preventDefault();
        let form = $(this), action = 'faculty_social_info'
        add_handler(form, action);
    })
    
})