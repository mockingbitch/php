<?php
include 'inc/sidebar.php';
include 'inc/mainpanel.php';
?>
<?php include '../classes/product.php'; ?>
<?php
$product = new product();

if(isset($_GET['delproductid'])) {
    $id = $_GET['delproductid'];
    $delproductid = $product->delete_product($id);
}


?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Danh sách sản phẩm</h3>
        <?php
        if(isset($delproductid)){
            echo $delproductid;
        }
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Loại</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $show_product= $product->show_product();
                if ($show_product) {
                    $i = 0;
                    while ($result=$show_product->fetch_assoc()) {
                        $i++;
                ?>
                        <tr>
                            <td><?php echo $result['productid']; ?></td>
                            <td><?php echo $result['productName']; ?></td>
                            <td><?php echo $result['cateName']; ?></td>
                            <td><?php echo $result['brandName']; ?></td>
                            <td><?php echo $result['price']; ?></td>
                            <td><img width="100" src="uploads/<?php echo $result['img']; ?>" alt=""></td>
                            <td><?php 
                            if($result['type']==1){
                                echo "Nổi bật";
                            }
                            else{
                                echo "Không nổi bật";
                            }
                            
                            ?></td>
                            <td align="center"><a href="productEdit.php?productid=<?php echo $result['productid']; ?>"><img width="16" src="images/edit.png" alt=""></a></td>
                            <td align="center"><a onclick="return confirm('Bạn muốn xoá file này?');" href="?delproductid=<?php echo $result['productid']; ?>"><img width="16" src="images/delete.png" alt=""></a></td>
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