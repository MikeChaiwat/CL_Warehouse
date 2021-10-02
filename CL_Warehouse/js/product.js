$(document).ready(function(){
    LoadWarehouseData()
    function LoadWarehouseData(){
        $.getJSON('sel_product.php',function(result){
            console.log(result)
            text = "<table class='table table-bordered'>"+
                    "<thead class='thead-light'>"+
                    "<tr align='center'>"+
                    "<th width='120'>รหัสสินค้า</th>"+
                    "<th>ชื่อสินค้า</th>"+
                    "<th width='200'>จำนวน (ลูกบาศก์เมตร)</th>"+
                    "<th width='150'>ประเภทสินค้า</th>"+
                    "<th width='150'>นำเข้าวันที่</th>"+
                    "<th width=''>คลังเก็บสินค้า</th>"+
                    "</thead>"

            for(i=0; i<result.length; i++){
                text += "<tr>"
                text += "<td align='center'>"+result[i].product_id+"</td>"
                text += "<td>"+result[i].product_name+"</td>"
                text += "<td>"+result[i].product_qty+"</td>"
                text += "<td>"+result[i].type_name+"</td>"
                text += "<td>"+result[i].time+"</td>"
                text += "<td>"+result[i].warehouse_name+"</td>"
                text += "<td><button id='info' class='btn btn-outline-info btn-sm' ><a href='exportproduct.php?product_id="+result[i].product_id+"'>ส่งออกสินค้า</a></button></td>"
                text += "</tr>"
               
            }
            text += "</table>"
            $(".records-content").html(text)
        }) 
    }
    /*$("#btnSubmit").click(function(){
        alert("OK")
        var image = $("#image").val()
        $.ajax({
            type:"POST",
            enctype: 'multipart/form-data',
            url: "insert_warehouse.php",
            data: $("#formWarehouse").serialize()+image,
            dataType: "text",
            success:function(result){
                alert(result.message)
                console.log(result.message)
            }
        })
    }) */
    

    
})