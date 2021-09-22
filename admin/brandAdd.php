<?php
include 'inc/sidebar.php';
include 'inc/mainpanel.php';
?>
<?php include'../classes/brand.php'; ?>
<?php
$brand = new brand();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $brandName = $_POST['brandName'];
    $insertbrand = $brand->insert_brand($brandName);
}
 ?>
<div class="row">
    <div class="form-add col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <style>
            .required{
                color: red;
            }
        </style>
       
        <h3>Thêm mới sản phẩm</h3>
        <?php if(isset($insertbrand)){
                echo $insertbrand;
            } ?>
        <form name="frmadd_video" action="brandAdd.php" method="POST">
        
            <div class="form-group">
                <label style="font-weight:bold"></label>
                <input type="text" name="brandName" placeholder="Tên danh mục" class="form-control" value="">
                
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