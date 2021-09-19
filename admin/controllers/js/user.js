$(function()
{
    // CONSTANTS
    const edit_profile_form = document.getElementsByClassName("update-profile");
    // const edit_profile_photo = document.getElementsById("change_profile");
    const profile_form_btn = document.getElementsByClassName("pf_btn");

    // FUNCTIONS
    function update_user_info(id, action) 
    {
        var response = '<div class="alert alert-warning alert-dismissable"> Processing.. </div>';
        $(edit_profile_form[id]).find(".ajax-message").html(response).show('slow');
        var formData  = $(edit_profile_form[id]).serialize();
        var url		=	"../admin/controllers/php/profile.php";
        $.ajax({
            url: url,
            method: 'POST',
            data: formData +'&action='+action,        
        }).done(function(result){
            // console.log(result);
            var data = JSON.parse(result)
            if(data.status == 1){
                edit_profile_form[3].reset();
                response = '<div class="gen alert alert-success">'+data.message+'</div>';
            }else{
                response = '<div class="err alert alert-danger">'+data.message+'</div>';
            }
            $(edit_profile_form[id]).find(".ajax-message").html(response).show('slow');
        })
    }

    function showPassword()
    {
        var inputs = $(edit_profile_form[3]).find("input");
        for (let i = 0; i < inputs.length; i++) {
            if($(inputs[i]).attr("type") == "password")
            {
                $(inputs[i]).attr("type", "text");
            }else{
                $(inputs[i]).attr("type", "password");
            }
        }
    }

    // CALLS  
    $(profile_form_btn[1]).on("click",function(e)  //Personal info
    { 
        e.preventDefault();
        update_user_info(1, "update_personal_info");
    })
    
    $(profile_form_btn[2]).on("click",function(e)  // social links
    {
        e.preventDefault();
        update_user_info(2, "update_social_info");
    })
    
    $(profile_form_btn[3]).on("click",function(e)  // Password
    {
        e.preventDefault();
        update_user_info(3, "update_password");
    })

    $(profile_form_btn[0]).on("click", function(e)  // imAGE
    {
        e.preventDefault();
        update_user_info(0, "change_photo");
    })
    

    // show password
    $(edit_profile_form[3]).find("#pshow").on("click", function()
    {
        showPassword();
    })
    
})