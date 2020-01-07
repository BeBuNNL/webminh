<?php include "include/lib/simple_html_dom.php"; ?>

<?php
    $from = "2019-08-01";
    $to = "2019-10-31";
    $product_name = "Samsung Galaxy ";
    //$test = new ProductAnalysisB();
    //$return_list = $test->GetRelevantLinks($product_name);
    //$test->BuildUpDataset($product_name,$return_list);
    $type = "class";
    $rule = "price";
    $test_price = 19000000;
    $link = "https://viettelstore.vn/dien-thoai/iphone-x-64gb-pid118486.html";
    $raw = "Giá đặc biệt 19.490.000₫";
    //echo $test->CheckPrice($test_price);
    //echo $test->CheckRuleMatchLink($link,$type,$rule);
    //$test->FindPrice($link);
    //$test->GetPrice($raw);
    //$test->SearchCompetivivePrice();
    //$test->TrainRule();
    //$test->GetUnfriendlyLinks($product_name);
    //$test->GetView(1, $from, $to);
    //$test->UpdateViewOfProduct(1);
    //$test->Text();
    class ProductAnalysisB{
        private $high_view = 2;
        private $google_link = "https://www.google.com/search?q=";

        public function GetRelevantLinks($product_name){
            //1. Build search string
            $search = $this->BuildSearchString($product_name);
            $url = $this->google_link . $search;
            
            //2. Send search string and get result 
            $html = file_get_html($url);
            //echo $html;
            //3. Analyze search result and get links
            //$return_list = array();
            $return_list = array();
            $count =0;
            foreach($html->find('a') as $element){   
                if($count == 5){
                    return $return_list;
                }   
                else{
                $pos = stripos($element->plaintext,$product_name);
                if ($pos !== false){
                    //echo $pos . "<br>"; 
                    //echo $element->href . "<br>"; 
                    $link = $this->StandarizeLink($element->href);
                    $test = $this->CheckLinkInDataset($link);
                    set_error_handler(function(){});
                    $test1 = $this->TestLink($link);
                    restore_error_handler();
                    //2. Insert this link
                    if (($test == 0) && ($test1 == 1) && ($link != -1)){
                        $return_list["{$element->plaintext}"] = "{$link}";
                    $count++;
                }  
            }          
    
            }
        }
                
        }

        public function GetType($type){
            $temp;
            if (stripos($type,'class') !== false)
                $temp = 1;
            else if(stripos($type,'id') !== false)
                $temp = 2;
            else
                $temp = 3;
            return $temp;
        }
        
        public function UpdatePriceInDataset($link,$price){
            $LINK = "'" . $link . "'";
            $sql = "UPDATE `dataset` SET `price`={$price} WHERE link_name = {$LINK}";
            $db = new Database();
            $result = $db->update($sql);
        }

        public function CompareClassRule($element, $rule,$link){
            $class = 'class: ' . $element->class.'<br>';
            if (stripos($class,$rule) !== false){
                // Do something with the element here
                //echo "Count at {$i}".'<br>';
                //echo count($all[$i]->find("*")).'<br>';
                //echo $all[$i]->find("*")[0]->tag.'<br>';
                //echo $element->tag.'<br>';
                //echo $all[$i]->outertext.'<br>';   
                //echo $class;  
                $pt1 = $element->plaintext.'<br>';
                echo $pt1 . "<br>";
                $check_price = $this->GetPrice($pt1);
                $flag = $this->CheckPrice($check_price);
                if ($flag == 1){
                    //update database
                    echo $check_price . "<br>";
                    $this->UpdatePriceInDataset($link,$check_price);
                    return $check_price;
                }

                echo '<br>';
                return 1;
            }
            return 0;
        }

        public function CompareIDRule($element, $rule,$link){
            $class = 'id: ' . $element->class.'<br>';
            if (stripos($class,$rule) !== false){
                // Do something with the element here
                //echo "Count at {$i}".'<br>';
                //echo count($all[$i]->find("*")).'<br>';
                //echo $all[$i]->find("*")[0]->tag.'<br>';
                //echo $element->tag.'<br>';
                //echo $all[$i]->outertext.'<br>';   
                //echo $class;  
                $pt1 = $element->plaintext.'<br>';
                echo $pt1 . "<br>";
                $check_price = $this->GetPrice($pt1);
                $flag = $this->CheckPrice($check_price);
                if ($flag == 1){
                    //update database
                    echo $check_price . "<br>";
                    $this->UpdatePriceInDataset($link,$check_price);
                    return $check_price;
                }
                echo '<br>';
                return 1;
            }
            return 0;
        }
        public function CheckPrice($check_price){
            $base_price = 6500000;
            $num = $base_price - $check_price;
            if ($num <0)
                $num = -1 * $num;
            $p = (float) $num / $base_price;
            if ($p > 0.2)
                return -1;
            return 1;
        }

        public function GetPrice($raw_string){
            $pt1 = implode("",explode(" ",$raw_string));
            $end = stripos($pt1,"₫");   
            if ($end == false)
                $end = stripos($pt1,"đ"); 
        
            $start = $end-1;
            $price = 0;
            $base = 1;
            while ($start >= 0) {
                $link = substr($pt1,$start,$end-$start);
                if(is_numeric($link) || ($link == ".")){
                    if($link != "."){
                        $price = $price + $base * intval($link);
                        $base = $base * 10;
                    }
                    //echo $link . "<br>";
                   
                }
                else{
                    $start = -1;
                }
                $end = $start;
                $start = $end-1;
                   
            }
            //echo $price . "<br>";
            return $price;
            //$link = substr($pt1,$start,$end-$start);
            //$arr = explode(".",$link);
            //$link1 = implode("",$arr);
            //echo $link1 . '<br>';

        }

        public function CheckRuleMatchLink($link,$type, $rule){
            $html = file_get_html($link);
            echo $link . "<br>";
            //echo $html;
            
            $all = $html->find("*");
            $matched_num = 0;
            
            for ($i=0, $max=count($all); $i < $max; $i++) {
                $temp= $this->GetType($type);
                
                //class
                if($temp == 1){
                    $matched_num += $this->CompareClassRule($all[$i],$rule, $link);
                   
                }
                else if($temp == 2){
                    $matched_num += $this->CompareIDRule($all[$i],$rule,$link);
                }
                else{
                    $matched_num += $this->CompareClassRule($all[$i],$rule,$link);
                    $matched_num += $this->CompareIDRule($all[$i],$rule,$link);
                }
                if ($matched_num > 0)
                    return $matched_num;
            
            }
            return $matched_num;
                
        }

        public function TestLink($link){
            $html = file_get_html($link);
            if ($html == false)
                return -1;
            return 1;
        }

        public function GetAllLink($product_name){
            $PROD = "'" . $product_name. "'";
            $sql = "SELECT * FROM `dataset` WHERE `product_name`={$PROD}";
            $db = new Database();
            $result = $db->select($sql);
            $return_list = array();
            while ($row = mysqli_fetch_array($result)){
                $link_id = $row['link_id'];;
                $link_name = $row['link_name'];
                $return_list["{$link_id}"] = "{$link_name}";
            }
            
            return $return_list;
        }

        public function IsLearned($rule_id, $link_id){
            $sql = "SELECT count(*) as num FROM `rule_and_dataset` WHERE rule_id = {$rule_id} AND link_id = {$link_id}";
            $db = new Database();
            $result = $db->select($sql);
            $row = mysqli_fetch_array($result);
            return $row['num'];
        }

        public function GetMinPrice($product_name){
            $PROD = "'" . $product_name . "'" ;
            $sql = "SELECT min(price) as PRICE FROM (SELECT * FROM `dataset` WHERE `price`>0 AND product_name ={$PROD}) as Alias";
            $db = new Database();
            $result = $db->select($sql);
            $row = mysqli_fetch_array($result);
            echo $row['PRICE'];
            return $row['PRICE'];
        }


        public function SearchCompetivivePrice(){
            $product_list = $this->GetViewProductID();
            while ($row = mysqli_fetch_array($product_list)){
                $product_id = $row['product_id'];
                // lấy view
                $view = $this->GetView($product_id);
                $row2 = mysqli_fetch_array($view);
                $view1 = $row2['NUM'];

                if( $view1 > 4){
                // lấy id product
                $product_list1 = $this->GetInProduct($product_id);
                $row1 = mysqli_fetch_array($product_list1);
                $product_name = $row1['product_name'];
            
                $price = 0;
           
                //1. Look at dataset and get min price
                 $price = $this-> GetMinPrice($product_name);
                if($price > 0)
                return $price;
                //2. Generate links 
                $return_list = $this->GetRelevantLinks($product_name);
                $this->BuildUpDataset($product_name, $return_list);
                $return_list1 = $this->GetAllLink($product_name);
                $min_price = -1;
                foreach($return_list1 as $x => $x_value){
                 //3. look at rule
                 $sql = "SELECT * FROM `rules` ORDER BY matching_ratio DESC";
                 $db = new Database();
                 $result = $db->select($sql);
                 $flag = 1;
                 While(($flag == 1) && ($row = mysqli_fetch_array($result))){
                     $rule_name = $row['name'];
                     $type = $row['class_or_id'];
                    
                     $num = $this->CheckRuleMatchLink($x_value,$type, $rule_name);
                     if ($num > 1){
                         if(($min_price == -1) || ($min_price > $num)){
                             $min_price = $num;
                             $flag = -1;
                         }
                     }
                 }
            }
                echo "Min price:" . $min_price . '<br>';
            }

        }
        }

        public function TrainRule(){
            //1. Get dataset
            $product_list = $this->GetViewProductID();
            while ($row = mysqli_fetch_array($product_list)){
                $product_id = $row['product_id'];
                // lấy view
                $view = $this->GetView($product_id);
                $row2 = mysqli_fetch_array($view);
                $view1 = $row2['NUM'];

                if( $view1 > 4){
                // lấy id product
                $product_list1 = $this->GetInProduct($product_id);
                $row1 = mysqli_fetch_array($product_list1);
                $product_name = $row1['product_name'];
            $return_list = $this->GetAllLink($product_name);
            //2. Get rule and train
            $sql = "SELECT * FROM `rules`";
            $db = new Database();
            $result = $db->select($sql);
            while ($row = mysqli_fetch_array($result)){
                $rule_name = $row['name'];
                $type = $row['class_or_id'];
                $rule_id = $row['rule_id'];
                $count = 0;
                $is_price = -1;
                foreach($return_list as $x => $x_value){
                    $is_price = 0;
                    $num = $this->CheckRuleMatchLink($x_value,$type,$rule_name);
                    if ($num > 0){
                        $count ++;
                        $is_price = 1;
                    }
                    if($this->IsLearned($rule_id, $x) == 0){

                     //2. update relationship table
                        $this->UpdateRelationshipTable($rule_id,$x,1,$is_price);
                }
            }
                //. update matching ratio
                
                $ratio = (float)$count / count($return_list);
                $this->UpadateMatchingRatio($rule_id,$ratio);
               
            }
                }
            }
        }

        public function GetUnfriendlyLinks($product_name){
            //1. Get dataset
            $link_list = $this->GetAllLink($product_name);
            //2. Get all rules
            $rule_list = $this->GetAllRules();
           
            //2. Check every link in Relationship table
            $return_list = array();
            foreach($link_list as $link_id => $link_name){
                $flag = 1;
                foreach($rule_list as $rule_id => $rule_name){
                    //Check rule match rule
                    $num = $this->CheckLinkMatchRule($link_id, $rule_id);
                    if ($num == 1)
                        $flag = 0;
                    
                }
                if ($flag == 1)
                    $return_list["{$link_id}"] = "{$link_name}";

            }
            //foreach($return_list as $x => $y){
             //   echo $x . "<br>";
             //   echo $y . "<br>";
           // }
            return $return_list;
        }

        public function CheckLinkMatchRule($link_id, $rule_id){
            $sql = "SELECT `is_identified_price` FROM `rule_and_dataset` WHERE link_id = {$link_id} AND rule_id = {$rule_id}";
            $db = new Database();
            $result = $db->select($sql);
            $row = mysqli_fetch_array($result);
            return $row['is_identified_price'];
        }

        public function GetAllRules(){
            $sql = "SELECT * FROM `rules`";
            $db = new Database();
            $result = $db->select($sql);
            $return_list = array();
            while ($row = mysqli_fetch_array($result)){
                $rule_id = $row['rule_id'];;
                $rule_name = $row['name'];
                $return_list["{$rule_id}"] = "{$rule_name}";
            }
            
            return $return_list;
        }

        public function UpdateRelationshipTable($rule_id, $link_id,$is_visited,$is_price){
            $sql = "INSERT INTO `rule_and_dataset`( `rule_id`, `link_id`, `is_visited`, `is_identified_price`) VALUES ({$rule_id}, {$link_id}, {$is_visited}, {$is_price})";
            $db = new Database();
            $result = $db->insert($sql);
        }

        public function UpadateMatchingRatio($rule_id, $ratio){
            $sql = "UPDATE `rules` SET `matching_ratio`={$ratio} WHERE rule_id = {$rule_id}";
            $db = new Database();
            $result = $db->update($sql);
        }

        public function BuildUpDataset($product_name, $return_list){
            foreach($return_list as $x => $x_value){
                //1. get link is not in dataset
                //$test = $this->CheckLinkInDataset($x_value);
                //set_error_handler(function(){});
                //$test1 = $this->TestLink($x_value);
                //restore_error_handler();
                //2. Insert this link
                //if (($test == 0) && ($test1 == 1)){
                    $PROD = "'" . $product_name. "'";
                    $LINK = "'" . $x_value . "'";
                    $sql = "INSERT INTO `dataset`(`product_name`, `link_name`) VALUES ({$PROD},{$LINK})";
                    $db = new Database();
                    $db->insert($sql);
               // }
            }

        }

        public function CheckLinkInDataset($link){
            $LINK = "'" . $link . "'";
            $sql = "SELECT count(*) as NUM  FROM `dataset` WHERE `link_name`={$LINK}";
            $db = new Database();
            $result = $db->select($sql);
            $row = mysqli_fetch_array($result);
            return $row['NUM'];
            //return $result;
        }

        public function StandarizeLink($raw_link){
            //echo $raw_link . '<br>';
            $start = stripos($raw_link,"http");
            if ($start !== false){
                $end = stripos($raw_link,"&");
                $link = substr($raw_link,$start,$end-$start);
                //echo $link . '<br>';
                return $link;
            }
           return -1;
        }

        //standardize search result string
        public function BuildSearchString($search){
            //"IPHONE X 64 GB"
            $list = explode(" ",$search);
            //{IPHONE,X,4,GB}
            $result = "";
            for ($i = 0; $i < count($list)-1; $i ++)
                $result = $result . $list[$i] . "+";
            $result = $result . $list[$i];
            //"IPHONE+X+64+GB"
            return $result;
        }
        //public function Text(){
            //Create DOM from URL or file
           // $html = file_get_html('http://vnexpress.net');
            //echo $html;

        //}

        public function GetAllView(){
            $product_list = $this->GetViewProductID();
            $plist = array();
            while ($row = mysqli_fetch_array($product_list)){
                
                $product_id = $row['product_id'];
                //2.1 get correct performance
                $view = $this->GetView($product_id);
                $plist["{$product_id}"] = "{$view}";
            }
            //foreach($plist as $x => $x_value){
              //  echo "key=" . $x . ", Value=" . $x_value;
               // echo "<br>";
           // }
           return $plist;

        }

        public function GetView($product_id){
            //$FROM = "'" . $from . "'";
            //$TO = "'" . $to . "'";
            $sql = "SELECT COUNT(*) as NUM FROM `product_analysis` WHERE `product_id`={$product_id}";
            $db = new Database();
            $result = $db->select($sql);
            //$row = mysqli_fetch_array($result);
            //echo $row['NUM'];
            return $result;
        }

        public function UpdateViewOfProduct($product_id){
            $now = date("Y-m-d H:i:s");
            $NOW = "'" . $now . "'";
            $sql = "INSERT INTO `product_analysis`(`product_id`, `visited_date`) VALUES ({$product_id},{$NOW})";
            $db = new Database();
            $db->insert($sql);
        }
        
        public function UpDatePriceNew(){
            $product_list = $this->GetViewProductID();
            while ($row = mysqli_fetch_array($product_list)){
                $product_id = $row['product_id'];
                // lấy view
                $view = $this->GetView($product_id);
                $row2 = mysqli_fetch_array($view);
                $view1 = $row2['NUM'];

                if( $view1 > 4){
                // lấy id product
                $product_list = $this->GetInProduct($product_id);
                $row1 = mysqli_fetch_array($product_list);
                $product_name = $row1['product_name'];
                $price1 = $row1['product_price'];
                //thêm link
                //$return_list = $this->GetRelevantLinks($product_name);
                //$this->BuildUpDataset($product_name, $return_list);
                // lấy giá hiện tại
                
                $price_new = (float)(($price1/100)*90);
                $sql = "UPDATE `product` SET `price_new`={$price_new} WHERE `product_id`={$product_id}";
                $db = new Database();
                $db->update($sql);
                }
            }  
        }

        public function GetViewProductID(){
            $sql = "SELECT DISTINCT product_id FROM product_analysis";
            $db = new Database();
            $result = $db->select($sql);
            return $result;
        }

        public function GetInProduct($product_id){
            $sql = "SELECT product_price, product_name FROM product WHERE `product_id`={$product_id} ";
            $db = new Database();
            $result = $db->select($sql);
            return $result;
        }

    }
?>