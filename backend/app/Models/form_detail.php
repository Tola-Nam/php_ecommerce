<?php
require_once('./Userdetail.php');
?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="form-container">
                <form class="form" method="post">
                    <?php
                    if (isset($message) == "success") {
                        echo '<div class="alert alert-success" >Product is completed!!</div>';
                    } else if (isset($message) == "fail") {
                        echo '<div class="alert alert-danger" >Product is not completed!!!</div>';
                    }
                    ?>
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" id="name" name="title" required="" placeholder="Please input product title">
                    </div>
                    <div class="form-group">
                        <label for="Regular_price">Regular_price</label>
                        <input type="text" id="regular_price" name="regular_price" required=""
                            placeholder="Please input your regular_price">
                    </div>
                    <div class="mb-3">
                        <label for="size">Size</label>
                        <select class="form-select form-select-sm" name="size">
                            <option selected>Pleace select your size</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
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