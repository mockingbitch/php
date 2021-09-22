<?php
include 'inc/sidebar.php';
include 'inc/mainpanel.php';
?>
<?php include '../classes/category.php'; ?>
<?php
$cate = new category();

if(isset($_GET['delcateid'])) {
    $id = $_GET['delcateid'];
    $delcateid = $cate->delete_category($id);
}


?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Danh sách video</h3>
        <?php
        if(isset($delcateid)){
            echo $delcateid;
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
                
                $show_cate= $cate->show_category();
                if ($show_cate) {
                    $i = 0;
                    while ($result=$show_cate->fetch_assoc()) {
                        $i++;
                ?>
                        <tr>
                            <td><?php echo $result['cateid']; ?></td>
                            <td><?php echo $result['cateName']; ?></td>
                            <td align="center"><a href="cateEdit.php?cateid=<?php echo $result['cateid']; ?>"><img width="16" src="images/edit.png" alt=""></a></td>
                            <td align="center"><a onclick="return confirm('Bạn muốn xoá file này?');" href="?delcateid=<?php echo $result['cateid']; ?>"><img width="16" src="images/delete.png" alt=""></a></td>
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