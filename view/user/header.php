<header>
          <nav class="Nikenavbar navbar navbar-expand-lg container">
            <a class="navbar-brand n" href="#">NIKE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="fa-solid fa-bars text-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php?mod=page&act=home">Home</a>
                </li>
                <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Men</a>
                    <a class="dropdown-item" href="#">Women</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Kids</a>
                  </div>
                </li> --> <!-- thẻ con -->
                <li class="nav-item">
                  <a class="nav-link" href="index.php?mod=sanpham&act=loc_danhmuc&category=men">Men</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?mod=sanpham&act=loc_danhmuc&category=women">Women</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?mod=sanpham&act=loc_danhmuc&category=kid">Kids</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?mod=sanpham&act=allsanpham">Sale</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php?mod=sanpham&act=allsanpham">SNKRS</a>
                  </li>
              </ul>
              <!--SEARCH-->
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
              </form>
                <!--ACCOUTN-->
                  <ul class="ul_account">
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="#" id="navbar_ac" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle " ></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbar_ac">
                        <!-- giúp ẩn sign in sign sign up -->
                  <?php
                  if(!(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')) {
                      echo '<a href="?mod=user&act=dangnhap" class="dropdown-item">Sign In</a>';
                      echo '<a class="dropdown-item" href="?mod=user&act=dangky">Sign Up</a>';
                  }
                      ?>
                        <div class="dropdown sa-toolbar__item">
    <?php if(isset($_SESSION['user'])): ?>
        <button class="sa-toolbar-user" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
            data-bs-offset="0,1" aria-expanded="false">
            <span class="sa-toolbar-user__avatar sa-symbol sa-symbol--shape--rounded">
                <img type="file" src="upload/product/<?=$_SESSION['user']['anhtk']?>" width="64" height="64">
            </span>
            <span class="sa-toolbar-user__info ">
                <span class="sa-toolbar-user__title">
                    <?=$_SESSION['user']['hoten']?>
                </span>
    </br>
                <span class="sa-toolbar-user__subtitle">
                    <?=$_SESSION['user']['email']?>
                </span>
            </span>
        </button>
        <a class="dropdown-item" href="index.php?mod=thongtin&act=thongtin">Account information</a>
        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
            <li>
                <a class="dropdown-item" href="?mod=user&act=dangxuat">Sign Out</a>
            </li>
        </ul>
    <?php endif; ?>
</div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?mod=user&act=dangxuat">Sign Out</a>
                      </div>
                    </li>
                  </ul>
                <!--GIỎ HÀNG-->
                <div class="giohang">
                  <a href="index.php?mod=giohang&act=giohang"><i class="fa fa-cart-arrow-down"></i></a>
                </div>
          </nav>
        </div>
    </header>

    