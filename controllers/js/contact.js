const conact_btn = document.getElementById('contact_btn');
const contact_form = document.getElementById("contact_us");
const subscription_form = document.getElementsByClassName("subscription-form");

function contact_us()
{
    var response = '<div class="alert alert-warning alert-dismissable"> Processing.. </div>';
    $('#contact_us .ajax-message').html(response).show('slow');
    var formData  = $(contact_form).serialize();
    var url		=	"./controllers/php/contact.php";
    $.ajax({
        url: url,
        method: 'POST',
        data: formData +'&action=contact_us',        
    }).done(function(result){
        // console.log(result);
        var data = JSON.parse(result)
        if(data.status == 1){
            response = '<div class="gen alert alert-success">'+data.message+'</div>';
            contact_form.reset();
        }else{
            response = '<div class="err alert alert-danger">'+data.message+'</div>';
        }
        $('#contact_us .ajax-message').html(response).delay(5000).hide('slow');

    })

}
function subscribe()
{
    var response = '<div class="alert alert-warning alert-dismissable">Subscribing... </div>';
    $('.subscription-form .ajax-message').html(response).show('slow');
    var formData  = $(subscription_form).serialize();
    var url		=	"./controllers/php/subscribe.php";
    $.ajax({
        url: url,
        method: 'POST',
        data: formData +'&action=subscribe',        
    }).done(function(result){
        // console.log(result);
        var data = JSON.parse(result)
        if(data.status == 1){
            response = '<div class="gen alert alert-success">'+data.message+'</div>';
            subscription_form[0].reset();
        }else{
            response = '<div class="err alert alert-danger">'+data.message+'</div>';
        }
        $('.subscription-form .ajax-message').html(response).delay(5000).hide('slow');

    })

}

// on submit
// conact_btn.addEventListener("click", function(e)
// {
//     e.preventDefault();
//     contact_us();
// })

$(contact_form).submit(function(e){
    e.preventDefault();
    contact_us();
})
$(subscription_form).submit(function(e){
    e.preventDefault();
    subscribe();
})


$(":input").blur(function() {
    if($(this).val() === ""){
        $(this).addClass("border-danger")
        $(this).removeClass("border-success")
    }else{
        $(this).removeClass("border-danger")
        $(this).addClass("border-success")
    }
 });

