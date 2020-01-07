<?php include "business/productB.php"; ?>
<?php include "business/inventoryB.php"; ?>
<?php include "business/productAnalysisB.php"; ?>
<?php
    class ProductP{
        private $from = "2019-08-01";
        private $to = "2019-10-05";
        public function ShowCard(){
            $product_id = $this->GetProduct();
            $pb = new ProductB();
            $result = $pb->GetProductsByID($product_id);
            $row = mysqli_fetch_array($result);
            $name = $row['product_name'];
            $price = $row['product_price'];
            $image = $row['image_url'];
            $price_new = $row['price_new'];
            $this->ShowCartOfProduct($name, $price,$product_id, $image, $price_new);

        }
        public function ShowItem(){
            //1. Get product ID
            $product_id = $this->GetProduct();

            //2. Show single product
            $pb = new ProductB();
            $result = $pb->GetProductsByID($product_id);
            $row = mysqli_fetch_array($result);
            $name = $row['product_name'];
            $price = $row['product_price'];
            $image = $row['image_url'];
            $price_new = $row['price_new'];
            $this->ShowSingleProduct($name, $price, $image, $price_new);

            //3.Update view
            $pab = new ProductAnalysisB();
            $pab->UpdateViewOfProduct($product_id);
        }

        public function GetProduct(){
            $product_id;
            if (!isset($_GET['product_id']))
                $product_id = 0;
            else
                $product_id = $_GET['product_id'];
            return $product_id;
        }  
        public function GetSearch(){
            $Search;
            if (!isset($_GET['search']))
                $Search = '';
            else
                $Search = $_GET['search'];
            return $Search;
        }  
        public function ShowLink($num){
            $link = <<< DELIMITER
            <a href="url">[$num]</a>
            DELIMITER;
            echo $link;
        }
         public function ShowAllLink($cat){
            $kh = new CategoryB();
            $cat_id = $kh->CalculateNumberGfLinks($cat);
            for ($i=1; $i <= $cat_id; $i++){
                $this->ShowLink($i);
            }

         }
        public function ShowSingleProduct($name, $price, $image, $price_new){
            if($price_new != 0)
            {
                $product = <<< DELIMITER
                    <div class="col-sm-12">
                     <div class="card">
                      
                      <img class="card-img-top" src="$image" alt="Card image"
                      style="width:500px;height:550px;">
                      
                         <div class="card-body">
                            <h4 class="card-title">{$name}</h4>
                            <p class="card-text"><strike>\${$price}</strike> -10%</p>
                            <p class="card-text">\${$price_new}</p>
                            <a href="cart.php" class="btn btn-primary">Add To Cart</a>
                         </div>
                        </div>
                        <br>
                    </div>
                DELIMITER;
            }
           else
           {
            $product = <<< DELIMITER
                    <div class="col-sm-12">
                     <div class="card">
                      
                      <img class="card-img-top" src="$image" alt="Card image"
                      style="width:500px;height:550px;">
                      
                         <div class="card-body">
                            <h4 class="card-title">{$name}</h4>
                            <p class="card-text">\${$price}</p>
                            <a href="cart.php" class="btn btn-primary">Add To Cart</a>
                         </div>
                        </div>
                        <br>
                    </div>
                DELIMITER;
           }
                echo $product;
        }

        public function ShowProduct($name, $price, $id, $image, $price_new){
            if($price_new != 0)
            {
                $product = <<< DELIMITER
                    <div class="col-sm-4">
                     <div class="card">
                     <a href="item.php?product_id={$id}">
                      <img class="card-img-top" src="$image" alt="Card image"
                      style="width:250px;height:250px;"></a>
                      
                         <div class="card-body">
                            <h5 class="card-title">{$name}</h5>
                            <p class="card-text"><strike>\${$price}</strike> -10%</p>
                            <p class="card-text">\${$price_new}</p>
                            <a href="cart.php?product_id={$id}" class="btn btn-primary">Add To Cart</a>
                         </div>
                        </div>
                        <br>
                    </div>
                DELIMITER;
            }
           else
           {
            $product = <<< DELIMITER
                    <div class="col-sm-4">
                     <div class="card">
                      <a href="item.php?product_id={$id}">
                      <img class="card-img-top" src="{$image}" alt="Card image"
                      style="width:250px;height:250px;"></a>
                      
                         <div class="card-body">
                            <h5 class="card-title">{$name}</h5>
                            <p class="card-text">\${$price}</p>
                            <a href="cart.php?product_id={$id}" class="btn btn-primary">Add To Cart</a>
                         </div>
                        </div>
                        <br>
                    </div>
                DELIMITER;
           }
                echo $product;
        }
    
        public function ShowCartOfProduct($name, $price,$id, $image, $price_new){
            if($price_new == 0)
            {
            $cart =  <<< DELIMITER
            <a href="item.php?product_id={$id}">
            <td><img src="{$image}" /> </td>
            <td>{$name}</td>
            <td>In stock</td>
            <td><input class="form-control" type="text" value="1" /></td>
            <td class="text-right">\${$price}</td>
            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
            DELIMITER;  
            }
            else{
                $cart =  <<< DELIMITER
            <a href="item.php?product_id={$id}">
            <td><img src="{$image}" /> </td>
            <td>{$name}</td>
            <td>In stock</td>
            <td><input class="form-control" type="text" value="1" /></td>
            <td class="text-right">\${$price_new}</td>
            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
            DELIMITER;  
            }  
             echo $cart; 
        } 

        public function ShowFeaturedProduct(){
            //1. Get product list sorted by performance
           
            $ib = new InventoryB();
            $featuredList = $ib->GetPoorPerformancelist($this->from, $this->to);
            foreach($featuredList as $x => $x_value){
                $pb = new ProductB();
                $result = $pb->GetProductsByID($x);
                $row = mysqli_fetch_array($result);
                $this->ShowProduct($row['product_name'], $row['product_price'], $row['product_id'], $image = $row['image_url'], $price_new = $row['price_new']);
                
            }
        }
        public function ShowProductsByUser(){
            $cp = new CategoryP();
            $pab = new ProductAnalysisB();
            $pab->UpDatePriceNew();
            $cat_id = $cp->GetCategory();
            if ($cat_id == 0){
                $this->ShowFeaturedProduct();
            }
            else{
                $this->ShowProductsByGroup();
            }
        }
        public function ShowProductsInCategory($cat_id){
            $pb = new ProductB();
            $result = $pb->GetAllProductsFromCategory($cat_id);
            while ($row = mysqli_fetch_array($result)){
                $this->ShowProduct($row['product_name'], $row['product_price'], $row['product_id'], $image = $row['image_url'], $price_new = $row['price_new'] );
            }

        }   
        public function SessionVarForProductName($cat_id, $Link_num, $product_name, $count){
            $session_name = $cat_id . "_" . $Link_num . "_" . "name" . "_" . $count;
            $_SESSION["{$session_name}"] = $product_name;
            
        }

        public function ShowProductsByGroup(){
            $cp = new CategoryP();
            $cat_id = $cp->GetCategory();
            $Link_num = $cp->GetLinkNum();
            $cb = new CategoryB();
            $result = $cb->GetProductsInGroup($cat_id, $Link_num);
            while ($row = mysqli_fetch_array($result)) {
                $this->ShowProduct($row['product_name'], $row['product_price'], $row['product_id'], $image = $row['image_url'], $price_new = $row['price_new']);
                //$session_name = "numPages_" . $cat_id;
            }
        }

        public function SearchName($a){
        $pb = new ProductB();
        $result = $pb->GetAllProduct();
        $Search_list = array();
        while ($row = mysqli_fetch_array($result)){
            $pos = stripos($row['product_name'], $a);
                if ($pos !== false){
                    $product_id = $row['product_id'];
                    $Search_list["{$product_id}"] = "{$product_id}";
                }
        }
        return $Search_list;
    }

        public function ShowProductSearch($a){
            $Search_list = $this->SearchName($a);
            foreach($Search_list as $x => $x_value){
                $pb = new ProductB();
                $result = $pb->GetProductsByID($x);
                $row1 = mysqli_fetch_array($result);
                $this->ShowProduct($row1['product_name'], $row1['product_price'], $row1['product_id'], $image = $row1['image_url'], $price_new = $row1['price_new']);
            }
        }
    }
?>