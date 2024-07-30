<h2 style="letter-spacing: 2px; text-align: center; padding-top: 40px;">personal information</h2>
<div class="row" style="padding-bottom: 50px;  padding-top: 20px; margin-left: 0; margin-right: 0;">

    <body style=" background-color: #F5F5F5;">
        <div class="col-8 container">
            <div class="row" style="border: 1px solid #DCDCDC; height: 70vh;">
                <div class="col-3" style="background-color:	#DCDCDC;">
                    <ul class="list-unstyled" style="padding-top: 50px;">
                        <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><a
                                class="text-decoration-none text-dark dropdown-item " data-target="#collapseExample"
                                href="index.php?mod=thongtin&act=thongtin">My profile</a></li>
                        <div class="collapse" id="collapseExample">
                            <li><a class="text-decoration-none text-dark dropdown-item "
                                    href="index.php?mod=thongtin&act=doipass&id=<?=$sp['matk']?>">Change Password</a>
                            </li>
                            <li><a class="text-decoration-none text-dark dropdown-item "
                                    href="index.php?mod=thongtin&act=doisdt&id=<?=$sp['matk']?>">Change phone number</a>
                            </li>
                            <li><a class="text-decoration-none text-dark dropdown-item "
                                    href="index.php?mod=thongtin&act=doiten&id=<?=$sp['matk']?>">Change username</a>
                            </li>
                        </div>
                        <li><a class="text-decoration-none text-dark dropdown-item " href="#">Purchased order</a></li>
                        <li><a class="text-decoration-none text-dark dropdown-item " href="#">Request account
                                deletion</a></li>

                    </ul>
                </div>
           
                <div class="col-9" style="padding-top: 30px; ">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mx-xxl-3 px-4 px-sm-5 pb-6">
            <div class="sa-layout">
                <div class="sa-layout__backdrop" data-sa-layout-sidebar-close=""></div>
                <div class="sa-layout__content">
                    <div class="card table-responsive" style="height: 400px; overflow-y: auto;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name product</th>
                                    <th>Quanlity</th>
                                    <th>Price</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Total amount</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
$tong = 0;
if (isset($_SESSION['order'])) {
    foreach ($_SESSION['order'] as $item) {
        extract($item);
        $tongtien = $gia * $soluong;
        $tong += $tongtien;

        echo '<tr>
                <td>
                    <div class="d-flex align-items-center">
                        <p class="me-4">
                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                <img src="img/' . $anhsp . '" alt="Sản phẩm ' . $masp . '" width="40" height="40" />
                            </div>
                        </p>
                        <div>
                            <p class="text-reset">' . $tensp . '</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="sa-price">
                        <span class="sa-price__integer">' . $soluong . '</span>
                    </div>
                </td>
                <td>
                    <div class="sa-price">
                        <span class="sa-price__integer">' . $gia . '</span>
                    </div>
                </td>
                <td>
                    <div class="sa-price">
                        <span class="sa-price__integer">' . $color . '</span>
                    </div>
                </td>
                <td>
                    <div class="sa-price">
                        <span class="sa-price__integer">' . $size . '</span>
                    </div>
                </td>
                <td>
                    <div class="sa-price">
                        <span class="sa-price__integer">' . $tongtien . '</span>
                    </div>
                </td>
            </tr>';

        // Hiển thị thông tin địa chỉ và trạng thái cho mỗi đơn hàng
        echo '<tr>
                <td colspan="6">
                    <div class="col-12">
                        <div class="sa-price">
                            <span class="sa-price__integer">Address : </span> <span>địa chỉ của đơn hàng</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="sa-price">
                            <span class="sa-price__integer">Status : </span> <span>trạng thái của đơn hàng</span>
                        </div>
                    </div>
                </td>
            </tr>';
    }
}
?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
            </div>
        </div>
    </body>
</div>

</form>