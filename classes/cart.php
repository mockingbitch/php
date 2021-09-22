<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_to_cart($quantity,$id){
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link,$quantity);
        $id = mysqli_real_escape_string($this->db->link,$id);
        $sessionid = session_id();
        
        $query = "SELECT * FROM tbl_product WHERE productid = '$id'"; 
        $result = $this->db->select($query)->fetch_assoc();
        $img = $result['img'];
        $productName = $result['productName'];
        $price = $result['price'];
       
            $query_insert_cart = "INSERT INTO tbl_cart(productid,productName,price,quantity,img,sessionid) VALUES ('$id','$productName','$price','$quantity','$img','$sessionid')";
             $result_insert_cart = $this->db->insert($query_insert_cart);
            if ($result) {
               header('Location:cart.php');
            } else {
               header('Location:404.php');
            }
        
    }
    public function get_product_cart(){
        $sessionid = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sessionid='$sessionid'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_quantity($quantity,$cartid){
        $quantity = mysqli_real_escape_string($this->db->link,$quantity);
        $cartid = mysqli_real_escape_string($this->db->link,$cartid);
    }
}
?>