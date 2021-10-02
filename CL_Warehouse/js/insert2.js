$(document).ready(function(){
    $("#btnSend").click(function(){
        $.ajax({
            type:"POST",
            url: "insertproduct.php",
            data: $("#addProduct").serialize(),
            success:function(result){
                alert("Record add Successfully")
               
            }
        })
    }) 
    $("#btnExp").click(function(){
        $.ajax({
            type:"POST",
            url: "insertexport.php",
            data: $("#addExport").serialize(),
            success:function(result){
                alert("Record add Successfully")
            }
        })
    }) 
})


