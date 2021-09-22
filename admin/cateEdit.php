<?php
include 'inc/sidebar.php';
include 'inc/mainpanel.php';
?>
<?php include '../classes/category.php'; ?>
<?php
$cate = new category();
if(!isset($_GET['cateid']) || $_GET['cateid'] == NULL) {
    echo "<script>window.location='categoryList.php'</script>";
}
else{
    $id = $_GET['cateid'];
}
if($_SERVER['REQUEST_METHOD'] =='POST'){
    $cateName = $_POST['cateName'];
    $updateCate = $cate->update_category($cateName,$id);
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
        <?php if (isset($updateCate)) {
            echo $updateCate;
        } ?>
        <?php
        $get_cate_name = $cate->getcatebyId($id);
        if ($get_cate_name) {
            while ($result = $get_cate_name->fetch_assoc()) {
        ?>
                <form name="frmadd_video" action="" method="POST">

                    <div class="form-group">
                        <label style="font-weight:bold"></label>
                        <input type="text" value="<?php echo $result['cateName']; ?>" name="cateName" placeholder="Tên danh mục" class="form-control" value="">

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