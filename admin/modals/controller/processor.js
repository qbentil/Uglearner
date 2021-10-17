$(document).ready(function(){

    // edit roles modal
    $(".edit_admin_role_btn").click(function(){
        var id =$(this).data('id');
        
        $.ajax({
            url:"../admin/modals/controller/processor.php",
            method:"post",
            data:"id="+id+"&action=edit_admin_role",
            success:function(response){
                // console.log(response);
                $("#edit_admin_role_modal .modal-body").html(response);
                $("#edit_admin_role_modal").modal('show'); 
            }
        })
    })
    
    // view admin roles details modal
    $(".view_admin_role_btn").click(function(){
        var id =$(this).data('id');
        
        $.ajax({
            url:"../admin/modals/controller/processor.php",
            method:"post",
            data:"id="+id+"&action=view_admin_role",
            success:function(response){
                // console.log(response);
                $("#view_admin_role .modal-body").html(response);
                $("#view_admin_role").modal('show'); 
            }
        })
    })
    
    // toggle role dscription
    $("#role-select").change(function()
    {
        var $option = $(this).find('option:selected');
        var desc = $option.data("desc");
        $("#selected-role-desc").html(desc)
    })

    // view admin info
    $(".view_admin_info_btn").click(function(){
        var id =$(this).data('id');
        // console.log(id);
        $.ajax({
            url:"../admin/modals/controller/processor.php",
            method:"post",
            data:"id="+id+"&action=view_admin_info",
            success:function(response){
                // console.log(response);
                $("#view_admin_info .modal-body").html(response);
                $("#view_admin_info").modal('show'); 
            }
        })
    })
    // view event info
    $(".view_event_info_btn").click(function(){
        var id =$(this).data('id');
        $.ajax({
            url:"../admin/modals/controller/processor.php",
            method:"post",
            data:"id="+id+"&action=view_event_info",
            success:function(response){
                // console.log(response);
                $("#view_event_info .modal-body").html(response);
                $("#view_event_info").modal('show'); 
            }
        })
    })

    // view course info
    $(".view_course_info_btn").click(function(){
        var id =$(this).data('id');
        $.ajax({
            url:"../admin/modals/controller/processor.php",
            method:"post",
            data:"id="+id+"&action=view_course_info",
            success:function(response){
                // console.log(response);
                $("#view_course_info .modal-body").html(response);
                $("#view_course_info").modal('show'); 
            }
        })
    })

    // edit event info
    $(".edit_event_info_btn").click(function(){
        var id =$(this).data('id');
        // console.log(id); //log
        $.ajax({
            url:"../admin/modals/controller/processor.php",
            method:"post",
            data:"id="+id+"&action=edit_event_info",
            success:function(response){
                // console.log(response);
                $("#update_event_info .modal-body").html(response);
                $("#update_event_info").modal('show'); 
            }
        })
    })

    // courses approval/revoke
    $(".course_status_toggler").click(function()
    {
        var id = $(this).data("id")
        alert(id)
    })

    // view community info
    $(".view_community_info_btn").click(function(){
        var id =$(this).data('id');
        $.ajax({
            url:"../admin/modals/controller/processor.php",
            method:"post",
            data:"id="+id+"&action=view_com_info",
            success:function(response){
                // console.log(response);
                $("#view_community_info .modal-body").html(response);
                $("#view_community_info").modal('show'); 
            }
        })
    })

    // edit portfolio
    $(".edit_portfolio_info_btn").click(function(){
        var id =$(this).data('id');
        
        $.ajax({
            url:"../admin/modals/controller/processor.php",
            method:"post",
            data:"id="+id+"&action=edit_portfolio_info",
            success:function(response){
                // console.log(response);
                $("#edit_portfolio_info .modal-body").html(response);
                $("#edit_portfolio_info").modal('show'); 
            }
        })
    })
        // view faculty info
    $(".view_faculty_info_btn").click(function(){
        var id =$(this).data('id');
        $.ajax({
            url:"../admin/modals/controller/processor.php",
            method:"post",
            data:"id="+id+"&action=view_faculty_info",
            success:function(response){
                // console.log(response);
                $("#view_faculty_info .modal-body").html(response);
                $("#view_faculty_info").modal('show'); 
            }
        })
    })
    

    
    // redirections
    $(".edit_admin_info_btn").click(function()
    {
        var id = $(this).data("id");
        location.href ="editadmin.php?id="+id;
    })
    $(".edit_course_info_btn").click(function()
    {
        
        var id = $(this).data("id");
        location.href ="update-course.php?id="+id;
    })
    $(".edit_community_info_btn").click(function()
    {
        
        var id = $(this).data("id");
        location.href ="edit-community.php?id="+id;
    })
    $(".edit_faculty_info_btn").click(function()
    {
        var id = $(this).data("id");
        location.href ="update-faculty.php?id="+id;
    })
    $(".power-off").click(function()
    {
        // alert("Log out!!!!!!")
        location.href = "?logout=true";
    })



    // MCQ HANDLER
    function upload_questions()
    {
        var response = '<div class="alert alert-warning alert-dismissable"> Processing.. </div>';
        var hasError = false;
        const form = $(".uploadQuestions");
        if(!hasError)
        {
            $(form).find(".ajax-message").html(response).show('slow');
            var formData = new FormData();
            var uploadFiles = document.getElementById('upload-file').files;
            // console.log(uploadFiles[0]);
            formData.append("questions", uploadFiles[0]);
            console.log(formData);
            var url		=	"../admin/modals/controller/processor.php";
            $.ajax({
                url: url,
                method: 'POST',
                data: formData +'&action=upload_question', 
                contentType:false,
                cache:false,
                processData:false,       
            }).done(function(result){
                console.log(result);
                return;
                var data = JSON.parse(result)
                if(data.status == 1){
                    response = '<div class="gen alert alert-success">'+data.message+'</div>';
                    // form[0].reset();
                }else{
                    response = '<div class="err alert alert-danger">'+data.message+'</div>';
                }
                $(form).find(".ajax-message").html(response).delay(5000).hide('slow');;
            })
        }
    }

    $("#upload").on("click", function(e){
        e.preventDefault();
        upload_questions();
    })

})