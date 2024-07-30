<!--SẢN PHẨM CHUNG-->
<section class="sanphamchung container-fluid">
        <div class="row">
            <div class="col-2">
                    <h2>category</h2>
                    <div class="overflow-hidden">
                      <div class="row container-fluid  overflow-auto" style="height: 800px;">
                        <div class="col-12">
                          <!--Gender-->
                          <div class="gender">
                            <P class="in_dam">Type</P>
                            <input type="checkbox" id="categoryCheckbox" onclick="allsp()"> <!-- trở vể trang tất cả snar phẩm -->
                            <label for="categoryCheckbox" id="categoryLabel">Product</label>
                            <br>
                            <input type="checkbox" id="categoryCheckbox" onclick="shoe()">
                            <label for="categoryCheckbox" id="categoryLabel">Shoe</label>
                            <br>
                            <input type="checkbox" id="categoryCheckbox" onclick="shirt()">
                            <label for="categoryCheckbox" id="categoryLabel">Shirt</label>
                            <br>
                            <input type="checkbox" id="categoryCheckbox" onclick="trousers()">
                            <label for="categoryCheckbox" id="categoryLabel" >Trousers</label>
                            <br>  
                          </div>      
                        <!--Shop By Price-->
                          <div class="shop_by_price">
                            <P class="in_dam">Shop By Price</P>
                            <input type="checkbox"> <label>$100 - $900</label>
                            <br>
                            <input type="checkbox"> <label>$1000 - $2000</label>
                            <br>
                            </div>                   
                        <!--Brand-->
                          <div class="brand">
                            <P class="in_dam">Brand</P>
                            <input type="checkbox"> <label>Nike Sportswear</label>
                            <br>
                            <input type="checkbox"> <label>Nike By You</label>
                            <br>
                          </div>
                        <!--Sports-->
                          <div class="sports">
                            <P class="in_dam">Sports</P>
                          <input type="checkbox"> <label>Nike Sportswear</label>
                          <br>
                          <input type="checkbox"> <label>Nike By You</label>
                          <br>
                          </div>
                        <!--Athletes-->
                          <div class="athletes">
                            <P class="in_dam">Athletes</P>
                            <input type="checkbox"> <label>LeBron James</label>
                            <br>
                          <input type="checkbox"> <label>Kevin Durant</label>
                          <br>
                          <input type="checkbox"> <label>Ja Morant</label>
                          <br>
                          <input type="checkbox"> <label>Tiger Woods</label>
                          <br>
                          <input type="checkbox"> <label>Serena Williams</label>
                          <br>
                          <input type="checkbox"> <label>Rafael Nadal</label>
                          <br>
                          <input type="checkbox"> <label>Naomi Osaka</label>
                          <br>
                          <input type="checkbox"> <label>Kylian Mbappé</label>
                          <br>
                          <input type="checkbox"> <label>Russell Westbrook</label>
                          <br>
                          <input type="checkbox"> <label>Giannis Antetokounmpo</label>
                          <br>
                          <input type="checkbox"> <label>Nyjah Huston</label>
                          <br>
                          <input type="checkbox"> <label>Jayson Tatum</label>
                          <br>
                          </div>
                       </div>
                </div>
                    </div>
                     
                </div>
                

                
                <div class="col-10">
    <div class="div1">
        <h2>All Products</h2>
        <div class="overflow-hidden">
            <div class="row container-fluid">
                <?php
                foreach ($sp as $item) {
                    extract($item);

                    if ($giakhuyenmai > 0) {
                        $gianew = $giakhuyenmai;
                        $giaold = '<del>' . $gia . '</del>';
                    } else {
                        $gianew = $gia;
                        $giaold = '';
                    }
                ?>
                    <div class="col-4 paddingbottom">
                        <img href="#" src="./img/<?php echo $anhsp; ?>" alt="">
                        <a hidden href="#"><?php echo $masp; ?></a>
                        <br>
                        <a href="index.php?mod=chitietsanpham&act=chitietsp&masp=<?php echo $masp; ?>"><?php echo $tensp; ?></a>
                        <br>
                        <label>Quantity:</label> <span href="#"><?php echo $soluong; ?></span>
                        <br>
                        <label>Price</label> <span>$<?php echo $gianew; ?></span>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
    </section>
    <script>
      function allsp(){
        window.location.href = `index.php?mod=sanpham&act=allsanpham`;
      }
          function shoe() {
              window.location.href = `index.php?mod=sanpham&act=loc_danhmuc&category=shoe`;
              // `admin.php?mod=sanpham&act=loc_danhmuc&category=shoe`; shoe là biến đặt bên trang controller sản phẩm
          }
          function shirt() {
              window.location.href = `index.php?mod=sanpham&act=loc_danhmuc&category=shirt`;
          }
          function trousers() {
              window.location.href = `index.php?mod=sanpham&act=loc_danhmuc&category=trousers`;
          }
    </script>