<?php include 'inc/header.php' ?>
<?php
if(!isset($_GET['proid'])||$_GET['proid']==NULL){
    echo "<script>window.location='404.php'</script>";
}
else{
    $id = $_GET['proid'];
}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $addtocart =  $cart->add_to_cart($quantity,$id);
}
?>
<style>
    
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <?php
            $get_product_detail = $product->get_details($id);
            if($get_product_detail){
                while($result_detail = $get_product_detail->fetch_assoc()){ 
            ?>
            <div class="cont-desc span_1_of_2">
                <div class="grid images_3_of_2 col-lg-6 col-md-5 col-xs-6">
                    <img width="500px" src="admin/uploads/<?php echo $result_detail['img']; ?>" alt="" />
                </div>
                <div class="desc span_3_of_2 col-lg-6 col-md-5 col-xs-6">
                    <h2 style="font-size:50px"><?php echo $result_detail['productName']; ?></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                    <div class="price">
                        <p style="font-size:30px">Price:<?php echo $result_detail['price']; ?> </p>
                        <p style="font-size:30px">Category:<?php echo $result_detail['cateName']; ?> </p>
                        <p style="font-size:30px">Brand:<?php echo $result_detail['brandName']; ?> </p>
                    </div>
                    <div class="add-cart">
                        <form action=" " method="post">
                            <input type="number" class="buyfield" name="quantity" value="1" min='1' />
                            <input type="submit" class="buysubmit" name="submit" value="Buy Now" />
                        </form>
                        <?php 
                        if(isset($addtocart)){
                            echo '<span style="color:red; font-size:18px">Sản phẩm đã tồn tại trong giỏ hàng</span>';
                        } ?>
                    </div>
                </div>
                <div class="product-desc col-lg-12 col-md-12 col-xs-12">
                    <h2 style="font-size:60px;font-weight:bold" align="center">Product Details</h2>
                    <p style="margin: 100px; font-size:30px"><?php echo $result_detail['des']; ?></p>
                </div>

            </div>
            <?php
            }
        }
            ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>