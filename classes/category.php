<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($cateName)
    {
        $cateName = $this->fm->validation($cateName);
        $cateName = mysqli_real_escape_string($this->db->link, $cateName);

        if (empty($cateName)) {
            $alert = "category name must be not empty";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_category(cateName) VALUES ('$cateName')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success' style = 'color:green; font-weight:bold'>Thêm " . $cateName . " thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
                return $alert;
            }
        }
    }
    public function show_category()
    {
        $query = "SELECT * FROM tbl_category ORDER BY cateid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getcatebyId($id)
    {
        $query = "SELECT * FROM tbl_category WHERE cateid ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_category($cateName, $id)
    {
        $cateName = $this->fm->validation($cateName);
        $cateName = mysqli_real_escape_string($this->db->link, $cateName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($cateName)) {
            $alert = "category name must be not empty";
            return $alert;
        } else {
            $query = "UPDATE tbl_category SET cateName = '$cateName' WHERE cateid = '$id'";
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='success' style = 'color:green; font-weight:bold'>Thêm " . $cateName . " thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
                return $alert;
            }
        }
    }
    public function delete_category($id)
    {
        $query = "DELETE FROM tbl_category WHERE cateid ='$id'";
        $result = $this->db->delete($query);
        
        if ($result) {
            $alert = "<span class='success' style = 'color:green; font-weight:bold'>Xoá thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error' style = 'color:red; font-weight:bold'>Thất bại</span>";
            return $alert;
        }
    }
}

?>