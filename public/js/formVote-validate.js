<script>
  function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var comment = document.getElementById("comment").value;
    var emails = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    var phones = /^[0-9-+]+$/;
    if (name == "") {
        alert("Bạn chưa nhập tên");
        return false;
    }
    if (email == "") {
        alert("Bạn chưa nhập email");
        return false;
    }
    if (email != phones.test(emails)){
        alert("Định dạng email không đúng");
        return false;
    }
    if (phone == "") {
        alert("Bạn chưa nhập số điện thoại");
        return false;
    }
    if (phone != phones.test(phones)) {
        alert("Số điện có 10 hoặc 11 số");
        return false;
    }
    if (comment == "") {
        alert("Bạn chưa nhập bình luận");
        return false;
    }
    if (comment.count > 3) {
        alert("Bình luận tối thiểu 80 ký tự");
        return false;   
    }
  }
</script>