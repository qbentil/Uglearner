$(function()
{

    // contacts controller
    const sinput = document.getElementById("contact-search-input");
    const cform = document.getElementsByClassName("search-public-contact");
    const rstatus = document.getElementsByClassName("status");
    const def = $("#public-contacts").html();
    const def_courses = $("#reviews-container").html();
    function search_contact()
    {
        var formData  = $(cform[0]).serialize();
        var url		=	"../admin/controllers/php/contact.php";
        $.ajax({
            url: url,
            method: 'POST',
            data: formData +'&action=contact_search',        
        }).done(function(result){

            // console.log(formData);
            
            $("#public-contacts").html(result);

        })
    }

    function read_status()
    {
        $(rstatus).each(function()
        {
            $(this).click(function(){
                var status_reader = $(this).find(".status_reader");
                var data = $(status_reader).serialize();
                // console.log(data);
                var url		=	"../admin/controllers/php/contact.php";
                $.ajax({
                    url : url,
                    method: "POST",
                    data: data+"&action=read_status"
                }).done(function(result)
                {
                    console.log(result);
                })
                
            })
        })
    }


    function contact_lookup()
    {
        $(sinput).keyup(function()
        {
            if($.trim($(sinput).val()) == ''){
                $("#public-contacts").html(def);
            }else{
                search_contact()
            }      
        })
    }

    function search_course(query)
    {
        var url		=	"../admin/controllers/php/course.php";
        $.ajax({
            url: url,
            method: 'POST',
            data: "query="+query+'&action=course_search',        
        }).done(function(result){

            // console.log(formData);
            
            $("#reviews-container").html(result);

        })
        // alert(query);
    }

    function course_lookup()
    {
        $("#course_review_search").keyup(function()
        {
            if($.trim($(this).val()) == ''){
                $("#reviews-container").html(def_courses);
            }else{
                search_course($(this).val())
            }      
        })
    }
    


    // Init   function 
    function init_controller()
    {
        contact_lookup(); //search for contact
        course_lookup(); //search for contact
        read_status(); //read status
    }

    init_controller() // Init call
    
})