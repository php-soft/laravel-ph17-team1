var modal1 = document.getElementById('myModal1');

// Get the button that opens the modal
var btn1 = document.getElementsByClassName("myBtn1");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn1.onclick = function() {
    modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
    modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
$(document).on('click', '.btn-del', function(e) {
            var id =$(this).val();
            swal({
                title: "Bạn cón muốn xóa?",
                text: "Mọi dữ liệu sẽ bị mất đi!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Vâng, Xóa!",
                cancelButtonText: "Hủy, hủy thao tác!",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            type : "get",
                            url  : '/admin/orders/deleteRecord/'+id,
                            dataType: "JSON",
                            data : {"id": id},
                            success:function(data)
                            {
                                if(data == "Bảng ghi đã được xử lý, không thể xóa!"){
                                    swal("Cancelled", "Bảng ghi đã được xử lý, không thể xóa!",
                                     "error");
                                } else {
                                    swal("Xóa thành công!", "Dữ liệu đã được xóa thành công.", "success");
                                    window.location.href = "/admin/orders";
                                }
                            }
                        })    
                        
                    } else {
                        swal("Cancelled", "Hủy thao tác :)", "error");
                    }
                });
        });
        $(document).on('click', '.adm-btn-view', function(e) {
            var id = $(this).val();
            $.get("/admin/orders/detail/"+id, function(data){
                $(".order-detail").html(data);
            });
        });
        $(document).on('click', '.adm-btn-edit', function(e) {
            var id = $(this).val();
            $.get("/admin/orders/edit/order/"+id, function(data){
                $(".order-detail").html(data);
            })
        });
    $(document).ready(function() {
    $('#table').DataTable({
        lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
        pageLength: 5,
    });

} );