<?php
require_once('./Userdetail.php');
?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="form-container">
                <form class="form" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required="" placeholder="Please input product name">
                    </div>
                    <div class="form-group">
                        <label for="Regular_price">Regular_price</label>
                        <input type="text" id="regular_price" name="regular_price" required=""
                            placeholder="Please input your regular_price">
                    </div>
                    <div class="mb-3">
                        <label for="size">Size</label>
                        <select class="form-select form-select-sm">
                            <option selected>Pleace select your size</option>
                            <option value="1">XS</option>
                            <option value="2">S</option>
                            <option value="3">M</option>
                            <option value="4">L</option>
                            <option value="5">XL</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="color">Color</label>
                        <select class="form-select form-select-sm" name="color" id="">
                            <option value="1">Please select your color</option>
                            <option value="red">Red</option>
                            <option value="white">White</option>
                            <option value="black">Black</option>
                            <option value="grey">grey</option>
                            <option value="green">Green</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_detail">Product_detail</label>
                        <textarea class="form-control" rows="6" name="product_detail" id="product_area"
                            placeholder="Enter your product detail"></textarea>
                    </div>
                    <div class="mb-3">
                        <button>
                            <span class="text">Submit</span>
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>