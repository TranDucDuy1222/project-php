
            <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                <div class="mx-xxl-3 px-4 px-sm-5">
                    <div class="py-5">
                        <div class="row g-4 align-items-center">
                            <div class="col">
                                <h1 class="h3 m-0">Orders</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-xxl-3 px-4 px-sm-5 pb-6">
                    <div class="sa-layout">
                        <div class="sa-layout__backdrop" data-sa-layout-sidebar-close=""></div>
                        <div class="sa-layout__content">
                            <div class="card table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="w-min">
                                                <input type="checkbox"
                                                    class="form-check-input m-0 fs-exact-16 d-block" />
                                            </th>
                                            <th class="min-w-20x">Account</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                
                                            
                                            <th class="w-min"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['dsorder'] as $sp): ?>   
                                            <tr>
                                            <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                                    aria-label="..." />
                                                </td>
                                                <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#" class="text-reset"><?=$sp['hovaten']?></a>
                                                        <div class="sa-meta mt-0">
                                                            <ul class="sa-meta__list">
                                                                <li class="sa-meta__item">ID:
                                                                    <span title="Click to copy product ID"
                                                                        class="st-copy"><?=$sp['madh']?></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                              
                                            </td>

                                            <td>
                                                <div class="sa-price">                                              
                                                       <span class="sa-price__integer"><?=$sp['diachichitiet']?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="sa-price">                                              
                                                       <span class="sa-price__integer"><?=$sp['sdt']?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sa-muted btn-sm" type="button"
                                                        id="product-context-menu-0" data-bs-toggle="dropdown"
                                                        aria-expanded="false" aria-label="More">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="product-context-menu-0">
                                                        <li>
                                                            <a class="dropdown-item" href="nhanvien.php?mod=order&act=edit&id=<?=$sp['madh']?>">Edit</a>
                                                        </li>
                            
                                                        <li>
                                                            <a onclick="deleteorder(<?=$sp['madh']?>)" class="dropdown-item text-danger" href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sa-app__body / end -->
           <script>
            function deleteorder(id){
                var kq = confirm("Are you sure you want to delete this product?");
                if(kq){
                    window.location.search='?mod=order&act=delete&id='+id; 
                }
            }
           </script>