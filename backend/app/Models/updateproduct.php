<?php
require_once('./Userdetail.php');
require_once('../Controllers/functoinupload.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $code = $_POST['code'];
    $title = $_POST['title'];
    $regular_price = $_POST['regular_price'];
    // $Thumbnail = $_POST['Thumbnail'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $product_detail = $_POST['product_detail'];
    $sourcefile = $_FILES['Thumbnail'];
    $filename = imageuploader($sourcefile);

    $updatequery = "UPDATE `products` SET `title` = '$title',`regular_price` = '$regular_price',`size` = '$size',`color` = '$color',`Thumbnail` = '$filename' WHERE `code` = '$code';";
    database_connection()->query($updatequery);
}

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $Query = "SELECT * FROM `products` WHERE `code`='$code'";
    // print_r($Query);
    $getresult = database_connection()->query($Query);
    if (isset($getresult)) {
        $getdata = mysqli_fetch_assoc($getresult);
    }
}
?>

<div class="col-4">
    <div class="form-container">
        <form class="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" value="<?php echo $getdata['code'] ?>" id="name" name="code">
            </div>
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" value="<?php echo $getdata['title'] ?>" id="name" name="title" required=""
                    placeholder="Please input product title">
            </div>
            <div class="form-group">
                <label for="Regular_price">Regular_price</label>
                <input type="text" value="<?php echo $getdata['regular_price'] ?>" id="regular_price"
                    name="regular_price" required="" placeholder="Please input your regular_price">
            </div>
            <div class="mb-3">
                <label for="size">Size</label>
                <select class="form-select form-select-sm" name="size">
                    <option selected><?php echo $getdata['size'] ?></option>
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
                    <option value="1"><?php echo $getdata['color'] ?></option>
                    <option value="red">Red</option>
                    <option value="white">White</option>
                    <option value="black">Black</option>
                    <option value="grey">grey</option>
                    <option value="green">Green</option>
                </select>
            </div>
            <div class="form-group">
                <!-- Display the current image (if available) -->
                <?php if (!empty($getdata['Thumbnail'])): ?>
                    <img src="../Asset/image/<?php echo $getdata['Thumbnail']; ?>" alt="Current Thumbnail" width="100">
                <?php endif; ?>
                <!-- File input for uploading a new file -->
                <input type="file" id="Thumbnail" name="Thumbnail" class="form-control" required
                    placeholder="Please input your regular_price">

            </div>
            <div class="mb-3">
                <label for="product_detail">Product_detail</label>
                <textarea class="form-control" rows="6" name="product_detail" id="product_area"
                    placeholder="Enter your product detail"><?php echo $getdata['product_detail'] ?></textarea>
            </div>
            <div class="mb-3">
                <button>
                    <span class="text">Submit</span>
                </button>
            </div>
    </div>
    </form>
</div>