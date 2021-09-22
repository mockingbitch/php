<?php
include 'inc/sidebar.php';
include 'inc/mainpanel.php';
?>
<?php include '../classes/brand.php'; ?>
<?php
$brand = new brand();

if(isset($_GET['delbrandid'])) {
    $id = $_GET['delbrandid'];
    $delbrandid = $brand->delete_brand($id);
}


?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Danh sách video</h3>
        <?php
        if(isset($delbrandid)){
            echo $delbrandid;
        }
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $show_brand= $brand->show_brand();
                if ($show_brand) {
                    $i = 0;
                    while ($result=$show_brand->fetch_assoc()) {
                        $i++;
                ?>
                        <tr>
                            <td><?php echo $result['brandid']; ?></td>
                            <td><?php echo $result['brandName']; ?></td>
                            <td align="center"><a href="brandEdit.php?brandid=<?php echo $result['brandid']; ?>"><img width="16" src="images/edit.png" alt=""></a></td>
                            <td align="center"><a onclick="return confirm('Bạn muốn xoá file này?');" href="?delbrandid=<?php echo $result['brandid']; ?>"><img width="16" src="images/delete.png" alt=""></a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<?php include 'inc/footer.php'; ?>