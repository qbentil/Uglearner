const login_form = document.getElementsByClassName("login-form");

function login()
{
    var response = '<div class="alert alert-warning alert-dismissable"> Please wait.... </div>';
    $('.login-form .ajax-message').html(response).show('slow');
    var formData  = $(login_form).serialize();
    var url		=	"./controllers/php/auth.php";
    $.ajax({
        url: url,
        method: 'POST',
        data: formData +'&action=login',        
    }).done(function(result){
        // console.log(result);
        var data = JSON.parse(result)
        if(data.status == 1){
            // response = '<div class="gen alert alert-success">'+data.message+'</div>';
            location.replace("./admin");
            login_form[0].reset();
        }else{
            response = '<div class="err alert alert-danger">'+data.message+'</div>';
        }
        $('.login-form .ajax-message').html(response).delay(5000).hide('slow');

    })

}

$(login_form).submit(function(e){
    e.preventDefault();
    login();
})