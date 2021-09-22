<?php
include 'inc/sidebar.php';
include 'inc/mainpanel.php';
?>
<?php include'../classes/category.php'; ?>
<?php
$cate = new category();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cateName = $_POST['cateName'];
    $insertCate = $cate->insert_category($cateName);
}
 ?>
<div class="row">
    <div class="form-add col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <style>
            .required{
                color: red;
            }
        </style>
       
        <h3>Thêm mới danh mục</h3>
        <?php if(isset($insertCate)){
                echo $insertCate;
            } ?>
        <form name="frmadd_video" action="addcategory.php" method="POST">
        
            <div class="form-group">
                <label style="font-weight:bold"></label>
                <input type="text" name="cateName" placeholder="Tên danh mục" class="form-control" value="">
                
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