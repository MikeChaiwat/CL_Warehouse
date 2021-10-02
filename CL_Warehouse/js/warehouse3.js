$(document).ready(function(){
    LoadWarehouseData()
    function LoadWarehouseData(){
        $.getJSON('sel_warehouse.php',function(result){
            console.log(result)
            text = "<table class='table table-bordered'>"+
                    "<thead class='thead-light'>"+
                    "<tr align='center'>"+
                    "<th>รูปภาพ</th>"+
                    "<th width='120'>รหัสโกดังสินค้า</th>"+
                    "<th>ชื่อโกดังสินค้า</th>"+
                    "<th width='200'>ที่อยู่โกดัง</th>"+
                    "<th width='150'>โซน</th>"+
                    "<th width='100'>ใช้พื้นที่ไปแล้ว</th>"+
                    "<th width=''>รายละเอียด</th>"+
                    "</thead>"

            for(i=0; i<result.length; i++){

                var percent_used = parseFloat(result[i].warehouse_used)*100/parseFloat(result[i].warehouse_max)
                text += "<tr>"
                text += "<td align='center'><img src='images/"+result[i].warehouse_image+"' class='rounded mx-auto d-block' width='250'></td>"
                text += "<td align='center'>"+result[i].warehouse_id+"</td>"
                text += "<td>"+result[i].warehouse_name+"</td>"
                text += "<td>"+result[i].warehouse_place+"</td>"
                text += "<td>"+result[i].zone_name+"</td>"
                text += "<td align='center'>"+percent_used+"%</td>"
                text += "<td><button id='info' class='btn btn-outline-info btn-sm' ><a href='warehouse_info.php?warehouse_id="+result[i].warehouse_id+"'>ดูข้อมูลเพิ่มเติม</a></button></td>"
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