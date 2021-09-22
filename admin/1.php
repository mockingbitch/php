<?php
include 'inc/sidebar.php';
include 'inc/mainpanel.php';
?>
<?php include '../classes/product.php'; ?>
<?php
$product = new product();
if(!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script>window.location='productList.php'</script>";
}
else{
    $id = $_GET['productid'];
}
if($_SERVER['REQUEST_METHOD'] =='POST'){
    $productName = $_POST['productName'];
    $updateproduct = $product->update_product($productName,$id);
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
        <?php if (isset($updateproduct)) {
            echo $updateproduct;
        } ?>
        <?php
        $get_product_name = $product->getproductbyId($id);
        if ($get_product_name) {
            while ($result = $get_product_name->fetch_assoc()) {
        ?>
                <form name="frmadd_video" action="" method="POST">

                    <div class="form-group">
                        <label style="font-weight:bold"></label>
                        <input type="text" value="<?php echo $result['productName']; ?>" name="productName" placeholder="Tên danh mục" class="form-control" value="">
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