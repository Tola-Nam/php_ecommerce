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