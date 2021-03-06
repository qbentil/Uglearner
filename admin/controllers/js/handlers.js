$(function()
{
    // CONSTANTS
    function add_handler(form, action) 
    {
        var response = '<div class="alert alert-warning alert-dismissable"> Processing.. </div>';
        
        // Process Logo
        var logo_property = $("#logo").get(0).files[0];
        var logo_name = logo_property.name;
        var logo_extension = logo_name.split('.').pop().toLowerCase();
        
        if(jQuery.inArray(logo_extension,['gif','jpg','jpeg','png']) == -1){
          response = '<div class="alert alert-danger alert-dismissable"> Invalid image file type for logo. </div>'
          $(form).find(".ajax-message").html(response).delay(5000).hide('slow');
          hasError = true;
        }
        
        //Process featured image
        var featured_image_property = $("#featured_image").get(0).files[0];
        var featured_image_name = featured_image_property.name;
        var featured_image_extension = featured_image_name.split('.').pop().toLowerCase();
        
        if(jQuery.inArray(featured_image_extension,['gif','jpg','jpeg','png']) == -1){
          response = '<div class="alert alert-danger alert-dismissable"> Invalid image file type for featured image. </div>'
          $(form).find(".ajax-message").html(response).delay(5000).hide('slow');
          hasError = true;
        }
        var imageData = new FormData();
        imageData.append("logo", logo_property);
        imageData.append("featured_image", featured_image_property);

        
        if(!hasError)
        {
            $(form).find(".ajax-message").html(response).show('slow');
            var formData  = $(form).serialize();
            var url		=	"../admin/controllers/php/handlers.php";
            $.ajax({
                url: url,
                method: 'POST',
                data: formData +'&action='+action, 
                contentType:false,
                cache:false,
                processData:false,       
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