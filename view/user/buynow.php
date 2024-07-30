<div class="container">
    <h2 class="text-center font-weight-bold" style="padding-top: 30px; letter-spacing: 1px;">Payment Page</h2>
    <div class="row">
    <div class="col">
      <!-- giohang -->
      <form action="" method="post" style="padding: 30px 0px;">
<!-- diachi giao hang -->
<a class="font-weight-bold" style="font-size: 20px; letter-spacing: 1px; text-decoration: none; color: black;">Delivery address</a> <a style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal">(add address)</a>
<?php foreach(get_diachi() as $sp): ?>   
    <div class="container">
            <span style="font-size: 16px; letter-spacing: 1px;">- <?=$sp['hoten']?>, <?=$sp['sdt']?>, <?=$sp['diachichitiet']?>, <?=$sp['quan']?>, <?=$sp['tp']?></span>  
            <a type="submit" class="btn btn-outline-secondary" href="index.php?mod=thanhtoan&act=edit&id=<?=$sp['madc']?>">Edit</a>
            <a onclick="deletediachi(<?=$sp['madc']?>)" class="btn btn-outline-secondary" href="#">Delete</a>
           <script>
            function deletediachi(id){
                var kq = confirm("Are you sure you want to delete this address?");
                if(kq){
                    window.location.search='?mod=thanhtoan&act=delete&id='+id; 
                }
            }
           </script>
        </div>
<?php endforeach; ?>
        <div class="container" style="padding: 30px 0px;"> 
            <table id="cart" class="table table-hover table-condensed"> 
                <thead> 
                     <tr> 
                        <th style="width:50%">Name Product</th> 
                        <th style="width:10%">Price</th> 
                        <th style="width:8%">Quanlity</th> 
                        <th style="width:32%" class="text-center">Into Money</th> 
                    </tr>  
                </thead> 
                <tbody>
                <?php 
                $tong = 0;
                        if (isset($_SESSION['giohang'])) {
                            foreach ($_SESSION['giohang'] as $item) {
                                extract($item);
                                global $gia;
                                $tongtien = $gia * $soluong;
                                $tong +=$tongtien;
                                echo '
                                <tr data-masp="'.$masp.'"> 
                                <td data-th="Product"> 
                                <div class="row"> 
                                    <div class="col-sm-2 hidden-xs">
                                        <img src="img/'.$anhsp.'" alt="Sản phẩm '.$masp.'" class="img-responsive" width="70">
                                    </div> 
                                    <div class="col-12"> 
                                        <h5 class="nomargin font-weight-bold" style="letter-spacing: 1px; font-size: 16px;">'.$tensp.'</h5> 
                                    </div> 
                                </div> 
                            </td> 
                            <td data-th="Price">$'.$gia.'</td> 
                            <td data-th="Quantity"><input class="form-control text-center" value="'.$soluong.'" type="number" min="1" onchange="updateQuantity(this, '.$masp.')"></td>
                            <td data-th="Subtotal" class="text-center">$'.$tongtien.'</td> 
                            <td class="actions" data-th="">
                                <a type="submit" class="btn btn-outline-dark" onclick="deleteItem(\''.$masp.'\')">Delete</a>
                            </td>
                                </tr>';
                            }
                        }
                        ?> 
                        <tr>
                    </tr>
                </tbody>
            </table>
           <div class="row container" >
            <div class="col-6"></div>
            <div class="col-6">
                <div class="row">
                    <div class="col-7">
                        <button type="button" class="btn btn-dark btn-tongtien">Total Amount: $<?php echo $tong; ?></button>  
                      </div>
                      <div class="col-3" style="padding: 0px; padding-bottom: 50px;">
                          <a type="submit" name="submit-order" class="btn btn-dark container btn-buy" onclick="clearCart()" >buy</a>
                      </div>
                </div>
            </div>
           </div>
        </div>
      </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New address</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="col">
            <form style="padding: 50px 0px;" method="post" onsubmit="check(event)">
                <h4 class="text-center font-weight-bold" style="letter-spacing: 1px;">Please enter your delivery information</h4>
                  <div class="form-group">
                    <label for="inputEmail4">Full name</label>
                    <input type="text" class="form-control" id="inputName" name="hoten" placeholder="Please enter your full name">
                  </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Please enter your phone number">
                      </div>
                        <div class="form-group">
                            <label for="inputCity">Province Or City</label>
                            <select id="inputCity" name="tp" class="form-control">
                              <option selected></option>
                              <option value="Hà Nội">Hà Nội</option>
                                <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                <option value="Hải Phòng">Hải Phòng</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Cần Thơ">Cần Thơ</option>
                                <option value="Quảng Ninh">Quảng Ninh</option>
                                <option value="Bình Dương">Bình Dương</option>
                                <option value="Đồng Nai">Đồng Nai</option>
                                <option value="Khánh Hòa">Khánh Hòa</option>
                                <option value="Hải Dương">Hải Dương</option>
                                <option value="Gia Lai">Gia Lai</option>
                                <option value="Long An">Long An</option>
                                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                <option value="Bắc Ninh">Bắc Ninh</option>
                                <option value="Nam Định">Nam Định</option>
                                <option value="Cà Mau">Cà Mau</option>
                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                <option value="Vĩnh Long">Vĩnh Long</option>
                                <option value="Ninh Bình">Ninh Bình</option>
                                <option value="Bình Thuận">Bình Thuận</option>
                                <option value="Phú Thọ">Phú Thọ</option>
                                <option value="Thái Nguyên">Thái Nguyên</option>
                                <option value="Bắc Giang">Bắc Giang</option>
                                <option value="Hòa Bình">Hòa Bình</option>
                                <option value="An Giang">An Giang</option>
                                <option value="Bình Phước">Bình Phước</option>
                                <option value="Tây Ninh">Tây Ninh</option>
                                <option value="Lào Cai">Lào Cai</option>
                                <option value="Đắk Lắk">Đắk Lắk</option>
                                <option value="Cao Bằng">Cao Bằng</option>
                                <option value="Yên Bái">Yên Bái</option>
                                <option value="Quảng Bình">Quảng Bình</option>
                                <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                <option value="Bắc Kạn">Bắc Kạn</option>
                                <option value="Tuyên Quang">Tuyên Quang</option>
                                <option value="Thái Bình">Thái Bình</option>
                                <option value="Điện Biên">Điện Biên</option>
                                <option value="Lạng Sơn">Lạng Sơn</option>
                                <option value="Thanh Hóa">Thanh Hóa</option>
                                <option value="Hà Tĩnh">Hà Tĩnh</option>
                                <option value="Nghệ An">Nghệ An</option>
                                <option value="Quảng Nam">Quảng Nam</option>
                                <option value="Quảng Trị">Quảng Trị</option>
                                <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                <option value="Bình Định">Bình Định</option>
                                <option value="Kon Tum">Kon Tum</option>
                                <option value="Gia Lai">Gia Lai</option>
                                <option value="Lâm Đồng">Lâm Đồng</option>
                                <option value="Đắk Nông">Đắk Nông</option>
                                <option value="Sơn La">Sơn La</option>
                                <option value="Hà Giang">Hà Giang</option>
                                <option value="Bạc Liêu">Bạc Liêu</option>
                                <option value="Bắc Ninh">Bắc Ninh</option>
                                <option value="Lai Châu">Lai Châu</option>
                                <option value="Điện Biên">Điện Biên</option>
                                <option value="Hà Nam">Hà Nam</option>
                                <option value="Hưng Yên">Hưng Yên</option>
                                <option value="Nam Định">Nam Định</option>
                                <option value="Phú Yên">Phú Yên</option>
                                <option value="Hà Tĩnh">Hà Tĩnh</option>
                                <option value="Ninh Thuận">Ninh Thuận</option>
                                <option value="Nghệ An">Nghệ An</option>
                                <option value="Sóc Trăng">Sóc Trăng</option>
                                <option value="Kon Tum">Kon Tum</option>
                                <option value="Quảng Trị">Quảng Trị</option>
                                <option value="Trà Vinh">Trà Vinh</option>
                                <option value="Tuyên Quang">Tuyên Quang</option>
                                <option value="Vĩnh Long">Vĩnh Long</option>
                                <option value="Hòa Bình">Hòa Bình</option>
                                <option value="Tây Ninh">Tây Ninh</option>
                                <option value="Bến Tre">Bến Tre</option>
                                <option value="Đồng Tháp">Đồng Tháp</option>
                                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                <option value="Bình Thuận">Bình Thuận</option>
                                <option value="Long An">Long An</option>
                                <option value="Cà Mau">Cà Mau</option>
                            </select>
                          </div>
                        <div class="form-group">
                          <label for="inputCity">District</label>
                          <select id="inputDistrict" name="quan" class="form-control">
                            <option selected></option>
                            <option>QUAN 1</option>
                            <option>QUAN 2</option>
                            <option>QUAN 3</option>
                            <option>QUAN 4</option>
                            <option>QUAN 5</option>
                            <option>QUAN 6</option>
                            <option>QUAN 7</option>
                            <option>QUAN 8</option>
                            <option>QUAN 9</option>
                            <option>QUAN 10</option>
                            <option>QUAN 11</option>
                            <option>QUAN 12</option>
                          </select>
                        </div>
                <div class="form-group">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" id="inputAddress" name="diachichitiet" placeholder="Please enter your address"> 
                  
                </div>
                <button type="submit" class="btn btn-outline-dark" name="submit-diachi">save</button>
              </form>
        </div>
        </div>
      </div>
    </div>
  </div>

<!-- code khác -->
<?php

?>
<!-- xóa sản phẩm -->
<script>
function deleteItem(masp) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === "success") {
                var row = document.querySelector('[data-masp="'+masp+'"]');
                var subtotal = parseFloat(row.querySelector('[data-th="Subtotal"]').textContent.substring(1));
                
                
                var totalAmountElement = document.querySelector('.btn.btn-dark');
                var totalAmount = parseFloat(totalAmountElement.textContent.substring(14));
                totalAmount -= subtotal;
                totalAmountElement.textContent = "Total Amount: $" + totalAmount.toFixed(2);
                
                row.parentNode.removeChild(row);
                
                // hàm thì để reload lại trang
                location.reload();
            } else {
                alert("Error deleting item.");
            }
        }
    };
    xhttp.open("GET", "controller/user/delete_cart.php?masp=" + masp, true);
    xhttp.send();
}
</script>
<!-- cập nhật số lượng -->
<script>
function updateQuantity(inputElement, masp) {
    var newQuantity = parseInt(inputElement.value);
    var row = inputElement.parentNode.parentNode;
    var price = parseFloat(row.querySelector('[data-th="Price"]').textContent.substring(1));
    var newTotal = newQuantity * price;

    // Update the total in the row
    row.querySelector('[data-th="Subtotal"]').textContent = "$" + newTotal.toFixed(2);

    // Update the session data
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === "success") {
                // Update the session data on the server
                location.reload(); // Tải lại trang
            } else {
                alert("Error updating quantity.");
            }
        }
    };
    xhttp.open("GET", "controller/user/soluong.php?masp=" + masp + "&soluong=" + newQuantity, true);
    xhttp.send();
}
</script>
 <!-- check form -->
<script>
        /*thêm biến event để lưu khi người dùng quên nhập ô nào đó thì không bị mất thông tin*/
        function check(event) {
    var hoten = document.getElementById('inputName').value;
    var sdt = document.getElementById('sdt').value;
    var tinh = document.getElementById('inputCity').value;
    var huyen = document.getElementById('inputDistrict').value;
    var diachi = document.getElementById('inputAddress').value;
    if (hoten == '') {
        alert('Please enter your correct full name!');
        event.preventDefault();
        return;
    }
    if(!isNaN(hoten)){
      alert('Full name must not contain a number, please re-enter full name!');
        event.preventDefault();
        return;
        /*/\d/.test(hoten) không được nhập số*/
    }
    if(/[!@#$%^&*(),;.?":{}|<>''"*+\-_/]/.test(hoten)){
    alert('Full name cannot contain special characters, please re-enter full name!');
    event.preventDefault();
    return;
}
    if(sdt =='' ){
      alert('Please enter your correct phone number!');
      event.preventDefault();
      return;
    }
    if(isNaN(sdt)){
      /*isnan là chữ*/
      alert('The phone number does not contain letters, please re-enter the phone number!');
      event.preventDefault();
      return;
    }
    if(sdt.length < 9 || sdt.length > 11){
      alert('Please enter your correct phone number!');
      event.preventDefault();
      return;
    }
    if(tinh==''){
      alert('Please select your province or city!');
      event.preventDefault();
      return;
    }
    if(huyen==''){
      alert('Please select your District!');
      event.preventDefault();
      return;
    }
    if(diachi==''){
        alert('Please select your Address!')
        event.preventDefault();
        return;
    }
    return false;
}
      </script>
<!-- xóa sản phẩm khi đặt hàng thành công  -->
<script>
function clearCart() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === "success") {
                // Xóa các hàng (items) khỏi bảng
                var cartTable = document.getElementById('cart');
                cartTable.querySelector('tbody').innerHTML = '';
                alert("You have successfully purchased, please check your order.");
                
                // Cập nhật tổng tiền thành 0
                var totalAmountElement = document.querySelector('.btn-tongtien');
                totalAmountElement.textContent = "Total Amount: $0";
                
            } else {
                alert("Payment failed, you don't have the product!");
            }
        }
    };
    xhttp.open("GET", "controller/user/clear_cart.php", true);
    xhttp.send();
}
</script>