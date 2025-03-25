<?php
require_once('./Userdetail.php');
?>
<style>
    .truncate {
        white-space: nowrap;
        /* Prevent text from wrapping */
        overflow: hidden;
        /* Hide overflow */
        text-overflow: ellipsis;
        /* Show "..." for overflow text */
        max-width: 150px;
        /* Adjust width as needed */
        display: inline-block;
        /* Keep it inline */
    }
</style>

<div class="container">
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="thead-dark">
                <tr>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Regular_Price</th>
                    <th class="d-none d-md-table-cell">Size</th>
                    <th class="d-none d-md-table-cell">Color</th>
                    <th class="d-none d-lg-table-cell">Product_Detail</th>
                    <th class="d-none d-lg-table-cell">Created_At</th>
                    <th class="d-none d-xl-table-cell">Author_ID</th>
                    <th class="d-none d-xl-table-cell">Viewers</th>
                    <th class="d-none d-xl-table-cell">Thumbnail</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php getproduct(); ?>
            </tbody>
        </table>
    </div>
</div>
<!-- New Modal -->
<div class="modal fade" id="newModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header alert alert-danger">
                <h5 class="modal-title" id="exampleModalLabel">Sir do you want to delete product?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        if (isset($_POST['code'])) {

                            $code = $_POST['code'];

                            $deletedQuery = " DELETE FROM `products` WHERE `code` = '$code';";

                            database_connection()->query($deletedQuery);
                        }
                    }
                    ?>
                    <input id="deleted_code" name="code" type="hidden">
                    <button class="btn btn-success" type="button" data-bs-dismiss="modal">Cancle</button>
                    <button class=" btn btn-danger" type="submit">Deleted</button>
                </form>
            </div>
        </div>
    </div>
    <!-- jquey for alert id deleted  -->
    <script>
        $(document).ready(function () {
            $(document).on('click', '.btn-deleted', function () {
                // const code = $(this).data('code');
                $('#deleted_code').val($(this).data('code'));
            });
        });
    </script>