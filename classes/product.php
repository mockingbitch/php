<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data,$files)
    {
        
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $cateid = mysqli_real_escape_string($this->db->link, $data['cateid']);
        $brandid = mysqli_real_escape_string($this->db->link, $data['brandid']);
        $des = mysqli_real_escape_string($this->db->link, $data['des']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "../admin/uploads/".$unique_image;
        
        

        if (empty($productName)||empty($cateid)||empty($brandid)||empty($des)||empty($price)||empty($type)||empty($file_name)) {
            $alert = "Fields must be not empty";
            return $alert;
        } else {
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_product(productName,cateid,brandid,des,price,img,type) VALUES ('$productName','$cateid','$brandid','$des','$price','$unique_image','$type')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success' style = 'color:green; font-weight:bold'>Thêm " . $productName . " thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
                return $alert;
            }
        }
    }
    public function show_product()
    {
        
        //  $query = "SELECT * FROM tbl_product.*,tbl_category.cateName,tbl_brand.brandName FROM tbl_product 
        //  INNER JOIN tbl_category ON tbl_product.cateid=tbl_category.cateid
        //  INNER JOIN tbl_brand ON tbl_product.brandid = tbl_brand.brandid 
        //  ORDER BY tbl_product.productid desc";
        $query = "SELECT p.*,c.cateName,b.brandName FROM tbl_product as p, tbl_category as c, tbl_brand as b 
        WHERE p.cateid = c.cateid AND p.brandid = b.brandid ORDER BY p.productid desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbyId($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productid ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_product($data,$files, $id)
    {   
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $cateid = mysqli_real_escape_string($this->db->link, $data['cateid']);
        $brandid = mysqli_real_escape_string($this->db->link, $data['brandid']);
        $des = mysqli_real_escape_string($this->db->link, $data['des']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "../admin/uploads/".$unique_image;
        if (empty($productName)||empty($cateid)||empty($brandid)||empty($des)||empty($price)||empty($type)) {
            $alert = "<span class='error'>Fields must be not empty</span";
            return $alert;
        }
         else {
            if(!empty($file_name)) {
                if($file_size>20480000){
                    $alert = "<span class='error'>Image size shoult be less than 2MB!</span>";
                    return $alert; 
                }
                elseif(in_array($file_ext,$permited)==false){
                    $alert = "<span class='error'>You can upload only:".implode(',',$permited)." </span>";
                    return $alert;
                }
                else{
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "UPDATE tbl_product SET 
                productName = '$productName',
                cateid = '$cateid',
                brandid = '$brandid',
                price = '$price',
                img = '$unique_image',
                des = '$des',
                type = '$type'
                WHERE productid ='$id'";"
                ";
                }
                
            }
            else{
                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                cateid = '$cateid',
                brandid = '$brandid',
                price = '$price',
                des = '$des',
                type = '$type'
                WHERE productid ='$id'";"
                ";
            }
           
        }
        $result = $this->db->update($query);

        if ($result) {
            $alert = "<span class='success' style = 'color:green; font-weight:bold'>Thêm " . $productName . " thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
            return $alert;
        }
    }
    public function delete_product($id)
    {
        $query = "DELETE FROM tbl_product WHERE productid ='$id'";
        $result = $this->db->delete($query);
        
        if ($result) {
            $alert = "<span class='success' style = 'color:green; font-weight:bold'>Xoá thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
            return $alert;
        }
    }
    // FRONT END
    public function getproduct_featured(){
        $query = "SELECT * FROM tbl_product WHERE type = '1' ORDER BY type DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id){
        $query = "SELECT p.*,c.cateName,b.brandName FROM tbl_product as p, tbl_category as c, tbl_brand as b 
        WHERE p.cateid = c.cateid AND p.brandid = b.brandid AND p.productid = '$id' ORDER BY p.productid desc";
        $result = $this->db->select($query);
        return $result;
    }
}

?>