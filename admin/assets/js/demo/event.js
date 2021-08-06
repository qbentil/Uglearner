$(function(){
    $("#from").on("change", function(){
        $("#to").attr("min", $(this).val())
    })
})
