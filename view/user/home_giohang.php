<!-- giohang -->
<div style="padding-bottom: 170px; padding-top: 55px;">

<!-- giỏ hàng -->
<div class="container"> 
    <h2 class="text-center font-weight-bold" style="letter-spacing: 1px;">YOUR CART</h2>
    <form method="post" action="index.php?mod=thanhtoan&act=thanhtoan">
    <table id="cart" class="table table-hover table-condensed"> 
        <thead> 
            <tr> 
                <th style="width:5%"></th>
                <th style="width:50%">Name Product</th>
                <th style="width:10%">Size</th>
                <th style="width:10%">Color</th>
                <th style="width:10%">Price</th> 
                <th style="width:8%">Quanlity</th> 
                <th style="width:22%" class="text-center">Into Money</th> 
                <th style="width:10%"> </th> 
            </tr> 
        </thead>
        
        <?php 
$tong = 0;
if (isset($_SESSION['giohang'])) {
    echo '<tbody>';
    foreach ($_SESSION['giohang'] as $item) {
            extract($item);
            $tongtien = $gia * $soluong;
            $tong +=$tongtien;
            echo '
            <tr data-masp="'.$masp.'">
            <td><input id="checkbox" type="checkbox" name="select_product[]" value="'.$masp.'"></td>
            <td data-th="Product"> 
            <div class="row"> 
                <div class="col-sm-2 hidden-xs">
                    <img src="img/'.$anhsp.'" alt="Sản phẩm '.$masp.'" class="img-responsive" width="80">
                </div> 
                <div class="col-sm-10"> 
                    <h4 class="nomargin font-weight-bold" style="letter-spacing: 1px; font-size: 18px;">'.$tensp.'</h4> 
                </div> 
            </div> 
        </td>
        <td >'.$size.'</td>
        <td >'.$color.'</td>
        <td data-th="Price">$'.$gia.'</td> 
        <td data-th="Quantity"><input class="form-control text-center" value="'.$soluong.'" type="number" min="1" onchange="updateQuantity(this, '.$masp.')"></td>
        <td data-th="Subtotal" class="text-center">$'.$tongtien.'</td> 
        <td class="actions" data-th="">
            <button class="btn btn-outline-dark" onclick="deleteItem(\''.$masp.'\')">Delete</button>
        </td>
            </tr>';
        }
    echo'
        <tr>
        <td colspan="5"></td>
        <td class="text-center" style="padding: 0px; padding-top: 25px; padding-right: 30px;"><button type="button" style="width: 250px;" class="btn btn-dark">Total Amount: $'.$tong.'</button></td>
        <td class="text-center" style="padding: 0px; padding-top: 25px;" >
            <button type="submit" style="width: 100px;" class="btn btn-dark">Pay</button>      
        </td>
        </tr>';
    echo'</tbody>';
}
?>
        

        
    </table>
    </form>
</div>
</div>
   <!-- code khác -->
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