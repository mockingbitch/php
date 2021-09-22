<?php
include_once 'inc/sidebar.php';
include_once 'inc/mainpanel.php';
require_once("../classes/brand.php");
require_once("../classes/category.php");
?>
<?php include '../classes/product.php'; ?>
<?php
$product = new product();
if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script>window.location='productList.php'</script>";
} else {
    $id = $_GET['productid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

    $updateproduct = $product->update_product($_POST,$_FILES, $id);
}
?>
<div class="row">
    <div class="form-add col-lg-10 col-md-10 col-xs-10 col-sm-10">
        <style>
            .required {
                color: red;
            }
        </style>

        <h3>Sửa sản phẩm</h3>
        <?php if (isset($updateproduct)) {
            echo $updateproduct;
        } ?>
        <?php
        $get_product_by_id = $product->getproductbyId($id);
        if ($get_product_by_id) {

            while ($result_product = $get_product_by_id->fetch_assoc()) {



        ?>
                <form name="frmadd_video" action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label style="font-weight:bold">Tên sản phẩm</label>
                        <input type="text" name="productName" class="form-control" value="<?php echo $result_product['productName']; ?>">
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Danh mục:</label>
                        <select name="cateid" id="select" style="width:50%;height:50px;" class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option>aga</option>
                            <?php
                            $cate = new Category();
                            $cateList = $cate->show_category();
                            if ($cateList) {
                                while ($result = $cateList->fetch_assoc()) {
                            ?>
                                    <option
                                    <?php
                                    if($result['cateid']==$result_product['cateid']) {
                                        echo 'selected';
                                    }
                                    ?>
                                    value="<?php echo $result['cateid']; ?>"><?php echo $result['cateName']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Hãng :</label>
                        <select name="brandid" id="select" style="width:50%;height:50px;" class="form-select" aria-label="Default select example">
                            <?php
                            $brand = new brand();
                            $brandList = $brand->show_brand();
                            if ($brandList) {
                                while ($result = $brandList->fetch_assoc()) {
                            ?>
                                    <option
                                    <?php
                                    if($result['brandid']==$result_product['brandid']) {
                                        echo 'selected';
                                    }
                                    ?>
                                    value="<?php echo $result['brandid']; ?>"><?php echo $result['brandName']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Mô tả</label>
                        <input type="text" name="des" class="form-control" value="<?php echo $result_product['des']; ?>">
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Giá</label>
                        <input type="text" name="price" class="form-control" value="<?php echo $result_product['price']; ?>">
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Hình ảnh sản phẩm</label>
                        <img width="100" src="uploads/<?php echo $result_product['img']; ?>" alt="">
                        <input type="file" name="image" placeholder="Hình ảnh sản phẩm" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Loại</label>
                        <select name="type" id="select" style="width:50%;height:50px;" class="form-select" aria-label="Default select example">
                            <?php if ($result_product['type'] == 1) {
                            ?>
                            <option select value="1">Nổi bật</option>
                                <option value="2">Không nổi bật</option>
                            
                                
                            <?php
                            } else if($result_product['type'] == 2) {
                            ?>
                                <option value="1">Nổi bật</option>
                                <option selected value="2">Không nổi bật</option>
                            <?php 
                        } ?>
                        </select>
                    </div>

                    <input type="submit" name="update" value="Thêm" class="btn btn-primary">
                </form>
        <?php
            }
        }
        ?>
    </div>
</div>
<style>
    .form-add {
        margin: 20px;
    }
</style>
<?php include('inc/footer.php'); ?>