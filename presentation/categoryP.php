<?php include "business/categoryB.php"; ?>
<?php
    class CategoryP{
        public function ShowAllCategories(){
            $cb = new CategoryB();
            $result = $cb->GetAllCategories();
            $count = 1;
            while ($row = mysqli_fetch_array($result)){
                $category = <<< DELIMITER
                <a href="index.php?category={$count}&page=1" class="list-group-item list-group-item-action"{$this->SetStyleForCurrentCategory($count)}>{$row['cat_name']}</a>
                DELIMITER;
                echo $category;
                $count ++;

            }
        } 
        public function BuildLink(){
        $cb = new CategoryB();
        $cat_id = $this->GetCategory();
        $result = $cb->CalculateNumberGfLinks($cat_id);
        if ($result == 1)
            return;
        $count =1;

        while ($count <= $result) {
            $link = <<< DELIMITER
            <a href="index.php?category={$cat_id}&page={$count}"{$this->SetStyleForCurrentLink($count)}>[ {$count} ]</a>  
            DELIMITER;
            echo $link;

            $count++;
        }
    }
        public function SetStyleForCurrentCategory($count){
            $cat_id = $this->GetCategory();
            $style = "";
            if ($count == $cat_id)
                $style = "style='color:red'";
            return $style;
            
        }

        public function SetStyleForCurrentLink($count){
            $page_id = $this->GetLinkNum();
            $style = "";
            if ($count == $page_id)
                $style = "style='color:red'";
            return $style;
            
        }

        public function GetCategory(){
            $cat_id;
            if (!isset($_GET['category']))
                $cat_id = 0;
            else
                $cat_id = $_GET['category'];
            return $cat_id;

        }  
        public function GetLinkNum(){
            $link_num;
            if (!isset($_GET['page']))
                $link_num = 1;
            else
                $link_num = $_GET['page'];
            return $link_num;
        }
    }
?>