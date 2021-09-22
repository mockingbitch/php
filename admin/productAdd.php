<?php
include_once 'inc/sidebar.php';
include_once 'inc/mainpanel.php';
require_once("../classes/brand.php");
require_once("../classes/category.php");
?>
<?php include'../classes/product.php'; ?>
<?php
$product = new product();
if($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['add'])){
    
    $insertproduct = $product->insert_product($_POST,$_FILES);
}
 ?>
<div class="row">
    <div class="form-add col-lg-10 col-md-10 col-xs-10 col-sm-10">
        <style>
            .required{
                color: red;
            }
        </style>
       
        <h3>Thêm mới product</h3>
        <?php if(isset($insertproduct)){
                echo $insertproduct;
            } ?>
        <form name="frmadd_video" action="productAdd.php" method="POST" enctype="multipart/form-data">
        
            <div class="form-group">
                <label style="font-weight:bold">Tên sản phẩm</label>
                <input type="text" name="productName" placeholder="Tên sản phẩm" class="form-control" value="">
            </div>
            <div class="form-group">
                <label style="font-weight:bold">Danh mục:</label>
                <select name="cateid" id="select" style="width:50%;height:50px;" class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option>aga</option>
                    <?php
                    $cate = new Category();
                    $cateList = $cate->show_category();
                    if($cateList){
                        while($result=$cateList->fetch_assoc()){
                    ?>
                    <option value="<?php echo $result['cateid']; ?>"><?php echo $result['cateName']; ?></option>
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
                    if($brandList){
                        while($result=$brandList->fetch_assoc()){
                    ?>
                    <option value="<?php echo $result['brandid']; ?>"><?php echo $result['brandName']; ?></option>
                    <?php
                }
            }
            ?>
                </select>
            </div>
            <div class="form-group">
                <label style="font-weight:bold">Mô tả</label>
                <input type="text" name="des" placeholder="Mô tả" class="form-control" value="">
            </div>
            <div class="form-group">
                <label style="font-weight:bold">Giá</label>
                <input type="text" name="price" placeholder="Giá" class="form-control" value="">
            </div>
            <div class="form-group">
                <label style="font-weight:bold">Hình ảnh sản phẩm</label>
                <input type="file" name="image" placeholder="Hình ảnh sản phẩm" class="form-control" value="">
            </div>
            <div class="form-group">
                <label style="font-weight:bold">Loại</label>
                <select name="type" id="select" style="width:50%;height:50px;" class="form-select" aria-label="Default select example">
                    <option value="1">Nổi bật</option>
                    <option value="2">Không nổi bật</option>
                </select>
            </div>
            
            <input type="submit" name="add" value="Thêm" class="btn btn-primary">
        </form>
    </div>
</div>
<style>
.form-add{
    margin: 20px;
}
</style>
<?php include('inc/footer.php'); ?>