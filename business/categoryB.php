<?php include "data/database.php" ?>
<?php

$test = new CategoryB();
$cat = 2;
//echo $test->GetQmountOfProductInCategory($cat) . '<br>';
//echo $test->CalculateNumberGfLinks($cat) . '<br>';
//$test->GetProductsInGroup($cat, 2);

    class CategoryB{
        private $cat_list = null;
        private $max_product = 3;

        public function GetAllCategories(){
            if ($this->cat_list == null){
                $sql = "SELECT * FROM Category";
                $db = new Database();
                $this->cat_list = $db->select($sql);
            }
            return $this->cat_list;
        }

        public function GetQmountOfProductInCategory($cat_id){
                $sql = "SELECT COUNT(*) as NUM FROM Product WHERE cat_id = {$cat_id}";
                $db = new Database();
                $result = $db->select($sql);
                $row = mysqli_fetch_array($result);
                $num = $row['NUM'];
                return $num;
            }

            public function CalculateNumberGfLinks($cat_id){
                $result;
                $session_name = "numPages_" . $cat_id;
                if(isset($_SESSION["{$session_name}"])){
                    $result = $_SESSION["{$session_name}"];
                    echo $session_name . "<br>";
                    echo $result . "<br>";
                    return;
                }
                $num = $this->GetQmountOfProductInCategory($cat_id);
                $max = $this->max_product;
                $result = (float)$num / $max;
                $result = ceil($result);
                $_SESSION["{$session_name}"] = $result;
                return $result;

            }
            public function GetProductsInGroup($cat_id, $link_num){
            
                $offset = ($link_num -1) * $this->max_product;
                $sql = "SELECT * FROM Product WHERE cat_id = {$cat_id} LIMIT {$offset}, {$this->max_product}";
                $db = new Database();
                $result = $db->select($sql);
                return $result;
            }
        }

    
?>