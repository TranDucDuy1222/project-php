
        <div class="section_thanhtoan container section">
    <div class="row">
        <div class="col-6">
            <img src="./img/<?php echo $productInfo['anhsp']; ?>" alt="<?php echo $productInfo['tensp']; ?>">
        </div>
        <div class="col-6 thanhtoan_right">
            <h2><?php echo $productInfo['tensp']; ?></h2>
            <span>$<?php echo $productInfo['gia']; ?></span>
            <br>
            <p style="font-size: 20px; color: orangered;" id="alert"></p>
            <div class="color">
                    <label>Color: </label>
                    <button class="gray">White</button>
                    <button class="red">Red</button>
                    <button class="black">Black</button>
                    <button class="pink">Pink</button>
                    <button class="yellow">Yellow</button>
                    <button class="blue">Blue</button>
                    <button class="green">Green</button>
                </div>
                    <div class="size">
                    <label>size: </label>
                    <button id="gray">35</button>
                    <button id="gray">36</button>
                    <button id="gray">37</button>
                    <button id="gray">38</button>
                    <button id="gray">39</button>
                    <button id="gray">40</button>
                    <button id="gray">41</button>
                    <button id="gray">42</button>
                    <button id="gray">43</button>
                    </div>
            <div class="motangan">
                <?php echo $productInfo['motangan']; ?>
            </div>
            <div class="motangan_bottom">
            
                <li>
                Colour Shown: Phantom/Khaki/Light Orewood Brown/Medium Ash
                </li>
                <li>
                     Style: DX9016-006
                </li>
            <p data-toggle="modal" data-target="#exampleModal">View Product Details</p>
            </div>
            <div class="row btn-mua container">
            <div class="col-6" style="padding: 0px; padding-left: 90px;">
            <form action="index.php?mod=giohang&act=giohang" style="width: 150px;" method="post" id="myForm">
            <input type="hidden" name="masp" value="<?php echo $masp; ?>">
            <input type="hidden" name="tensp" value="<?php echo $productInfo['tensp']; ?>">
            <input type="hidden" id="color" name="color" value="">
            <input type="hidden" id="size" name="size" value="">
            <input type="hidden" name="soluong" value="1">
            <input type="hidden" name="anhsp" value="<?php echo $productInfo['anhsp']; ?>">
            <input type="hidden" name="gia" value="<?php echo $productInfo['gia']; ?>">
            <button type="submit" style="width: 100%;" class="btn_themgiohang"><a>Add to Cart</a></button>
            <!-- <button type="submit" class="btn_muangay"><a href="index.php?mod=giohang&act=giohang">Buy Now</a></button> -->
        </form>
            </div>
        <div class="col-6" style="padding: 0px; padding-right: 80px;">
        <form action="index.php?mod=buynow&act=buynow" style="width: 150px;" method="post">
            <input type="hidden" name="masp" value="<?php echo $masp; ?>">
            <input type="hidden" name="tensp" value="<?php echo $productInfo['tensp']; ?>">
            <input type="hidden" name="soluong" value="1">
            <input type="hidden" name="anhsp" value="<?php echo $productInfo['anhsp']; ?>">
            <input type="hidden" name="gia" value="<?php echo $productInfo['gia']; ?>">
            <button type="submit" class="btn_muangay" style="width: 100%;"><a>Buy Now</a></button>
        </form>
        </div>
            </div>
        </div>
    </div>
</div>
<div class="motalon container section">
    <div class="content_motalon">
        <h2>Description</h2>
        <?php echo $productInfo['motachitiet']; ?>
    </div>
</div>
<div class="motalon container section">
      <div class="overflow-hidden">
        <h2>similar product</h2>
        <div class="row container-fluid">
          <?php
          foreach ($product_random as $item) {
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
                  <a href="index.php?mod=chitietsanpham&act=chitietsp&masp=<?php echo $masp; ?>">
                    <img style="width: 320px" src="./img/<?php echo $anhsp; ?>" alt="">
                  </a>
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
          

<!--modal-->
<!-- Scrollable modal -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
     
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable"> <!-- Thêm class modal-dialog-scrollable -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Nội dung modal -->
        Gains aren't given, they're earned. Go get what's yours. We spring-loaded this do-it-all trainer with responsiveness for surges of off-the-rack energy. It can withstand the rigours of high-intensity exertion while sticking with you as you wind your way through the everyday paces.
        Take off
        A full-length Zoom Air unit on the bottom layer of the upper delivers an active response during cardio workouts and a little extra pop when putting force into your lifting routine.
        Stable comfort
        The low-to-the ground design offers stability for strength training. The upper sits low to the ground as well and is made from soft, synthetic suede that's airy and breathable.
        Dynamic Support
        A midfoot Dynamic Fit band offers engaged lacing, so you can feel secure.
        Smooth Moves
        See the lines on the outsole? They provide a smooth transition and feel for cardio movements. We paired it with a Waffle traction pattern for stability on multiple surfaces.
        More benefits
        The heel is stable and flat to the ground for containment.
        Foam midsole adds cushioning.
        Colour Shown: Phantom/Khaki/Light Orewood Brown/Medium Ash
        Style: DX9016-006
        Country/Region of Origin: Vietnam
        A midfoot Dynamic Fit band offers engaged lacing, so you can feel secure.
        Smooth Moves
        See the lines on the outsole? They provide a smooth transition and feel for cardio movements. We paired it with a Waffle traction pattern for stability on multiple surfaces.
        More benefits
        The heel is stable and flat to the ground for containment.
        Foam midsole adds cushioning.
        Colour Shown: Phantom/Khaki/Light Orewood Brown/Medium Ash
        Style: DX9016-006
        Country/Region of Origin: Vietnam
      </div>
      </div>
    </div>
  </div>
</div>
<script src="./view/js/size&color.js"></script>