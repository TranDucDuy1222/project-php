
      <!-- đăng nhập -->

      <div class="container pb-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center font-weight-bold" style="font-size: 30px;">SIGN IN</div>
    
                    <div class="card-body">
                        <form action="" method="post" onsubmit="checkSign_in(event)">
                            <div class="form-group">
                                <label for="inputEmail">Your email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="please enter email address">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">password</label>
                                <input type="password" name="matkhau" class="form-control" id="password" placeholder="Please enter a password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label font-weight-bold" for="rememberMe" data-toggle="modal" data-target="#exampleModal">Agree to terms approximately</label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input type="submit" class="btn btn-dark" name="submit-signin" value="Sign In">
                            </div>
                            <div class="form-group">
                            </div>

                            </form>
                            </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Our terms</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="letter-spacing: 1px;">
      At Nike Shoe Store, we are committed to providing the best online shopping experience for our valued customers. To ensure a seamless shopping journey, we have outlined essential guidelines for customers making purchases:

Product Quality:
We assure you that all our Nike shoes are genuine and manufactured with the highest quality standards. Each product listing includes detailed information, allowing you to understand the unique features and materials used in the footwear.

Pricing and Payment:
The prices listed on our website reflect the base cost of the product and do not include shipping fees or applicable taxes. The payment process will be guided during the checkout.

Shipping and Delivery:
We offer various shipping options to cater to your specific needs. The delivery time may vary based on your shipping address and the chosen shipping method.

Return Policy:
We accept returns within 30 days from the date of purchase. To qualify for a return, the product must be in its original condition and accompanied by the purchase invoice.

Privacy and Data Security:
We are committed to safeguarding your personal information. We use your data solely for order processing and will not disclose it to any third party.

Customer Support:
Our customer support team is readily available to address any inquiries you may have. You can reach us via the provided phone number or email on our website.

Promotions and Special Offers:
We regularly provide exclusive promotions and special offers for our customers. Keep an eye on our website to take advantage of these opportunities.

We hope you have a pleasant shopping experience at Nike Shoe Store. Please do not hesitate to reach out if you require further assistance or have any questions. We sincerely appreciate your trust and choice of our products.
      </div>
    </div>
  </div>
</div>
    <script>
    function checkSign_in(event){
        var email = document.getElementById('inputEmail').value;
        var matkhau = document.getElementById('password').value;
        var dk = document.getElementById('rememberMe').checked;
// ho ten
        if(email==''){
            alert("You haven't entered your email yet, please enter your email!");
            event.preventDefault();
            return;
        }
        if(matkhau==''){
            alert("You haven't entered your password yet, please enter your password!");
            event.preventDefault();
            return;
        }
        if(dk==''){
            alert("You have not agreed to the terms, please agree to the terms!");
            event.preventDefault();
            return;
        }

// email
    }
</script>