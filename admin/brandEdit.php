<?php
include 'inc/sidebar.php';
include 'inc/mainpanel.php';
?>
<?php include '../classes/brand.php'; ?>
<?php
$brand = new brand();
if(!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
    echo "<script>window.location='brandList.php'</script>";
}
else{
    $id = $_GET['brandid'];
}
if($_SERVER['REQUEST_METHOD'] =='POST'){
    $brandName = $_POST['brandName'];
    $updatebrand = $brand->update_brand($brandName,$id);
}

?>
<div class="row">
    <div class="form-add col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <style>
            .required {
                color: red;
            }
        </style>

        <h3>Sửa danh mục</h3>
        <?php if (isset($updatebrand)) {
            echo $updatebrand;
        } ?>
        <?php
        $get_brand_name = $brand->getbrandbyId($id);
        if ($get_brand_name) {
            while ($result = $get_brand_name->fetch_assoc()) {
        ?>
                <form name="frmadd_video" action="" method="POST">

                    <div class="form-group">
                        <label style="font-weight:bold"></label>
                        <input type="text" value="<?php echo $result['brandName']; ?>" name="brandName" placeholder="Tên danh mục" class="form-control" value="">
                    </div>

                    <input type="submit" name="add" value="Sửa" class="btn btn-primary">
                </form>
        <?php
            }
        } ?>
    </div>
</div>
<style>
    .form-add {
        margin: 20px;
    }
</style>
<?php include('inc/footer.php'); ?>