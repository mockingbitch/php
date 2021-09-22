<?php include 'inc/header.php'; ?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
$cartid = $_POST['cartid'];
$quantity = $_POST['quantity'];
$update_quantiy = $cart->update_quantiy($quantity,$cartid);
}
?>
<div class="main">
    <div class="content" style="padding-bottom:200px">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Giỏ hàng</h2>
                <table class="tbl">
                    <tr>
                        <th width="20%">Sản phẩm </th>
                        <th width="10%">Hình ảnh</th>
                        <th width="15%">Giá tiền</th>
                        <th width="25%">Số lượng</th>
                        <th width="20%">Tổng tiền</th>
                        <th width="10%">Action</th>
                    </tr>
                   <?php
                   
                   $get_product_cart = $cart->get_product_cart();
                        if($get_product_cart){
                            $subtotal = 0;
                            while($result_cart = $get_product_cart->fetch_assoc()){
                   ?>
                    <tr>
                        <td><?php echo $result_cart['productName'] ?></td>
                        <td><img width="100px" src="admin/uploads/<?php echo $result_cart['img'];?>" alt=""></td>
                        <td><?php echo $result_cart['price']; ?></td>
                        <td>
                            <form action ="" method="post">
                            <input type="hidden" name="cartid" value="<?php echo $result_cart['quantity']; ?>"/>
                                <input type="number" name="quantity" value="<?php echo $result_cart['quantity']; ?>"/>
                                <input type="submit" name="updatequantity" value="update"/>
                            </form>
                        </td>
                        <td><?php echo $total = $result_cart['price']*$result_cart['quantity']; ?></td>
                        <td><a href="">X</a></td>
                    </tr>
                    <?php 
                    $subtotal += $total;
                       }
                    }
                    ?>
                    
                </table>
                <table style="float:right;text-align:left;" width="40%">
                    <tr>
                        <th>Thành tiền: </th>
                        <td><?php echo $subtotal; ?></td>
                    </tr>
                    <tr>
                        <th>Phí ship: </th>
                        <td>TK. <?php $shipping = '30000';
                        echo $shipping; ?></td>
                    </tr>
                    <tr>
                        <th>Tổng: </th>
                        <td><?php echo ($grandtotal = $subtotal+$shipping).' Đ'; ?></td>
                    </tr>
                </table>
            </div>
            <div class="shopping">
                <div class="shopleft">
                    <a href="">Continue shopping</a>
                </div>
                <div class="shopright">
                    <a href="">Check out</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>