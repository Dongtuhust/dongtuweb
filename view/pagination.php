<?php

    function connectDB(){
        $servername = "localhost";
        $username = "root";
        $password = "123456";
        $dbname = "ps4_db";
        $connect = mysqli_connect($servername, $username, $password, $dbname);
        mysqli_set_charset($connect, "utf8");
        return $connect;
    }

    function executeQuery($query){
        $connect = connectDB();
        $result = mysqli_query($connect,$query);

        $ans = array();

        if($result != false){
            $row = mysqli_fetch_array($result);
            while($row != null){
                array_push($ans, $row[0]);
                $row = mysqli_fetch_array($result);
            }
        }

        mysqli_close($connect);
        return $ans;
    }

    function getPageProduct($products, $recordPerPage, $page){
        $ret = array();
        $totalNum = count($products);
        $numOfPage = ceil($totalNum/$recordPerPage);
        if($page == $numOfPage - 1){
            $numOfRecord = $totalNum - $page * $recordPerPage;
        }
        for($i = $page * $recordPerPage; $i < $totalNum && $i < ($page + 1) * $recordPerPage; $i++){
            array_push($ret, getProductInfo($products[$i]));
        }
        return $ret;
    }

    function getPageProductUserSell($products, $recordPerPage, $page){
        $ret = array();
        // $page = getPage();
        $totalNum = count($products);
        $numOfPage = ceil($totalNum/$recordPerPage);
        if($page == $numOfPage - 1){
            $numOfRecord = $totalNum - $page * $recordPerPage;
        }
        for($i = $page * $recordPerPage; $i < $totalNum && $i < ($page + 1) * $recordPerPage; $i++){
            array_push($ret, getProductInfoUserSell($products[$i]));
        }
        return $ret;
    }

    function getProductInfoUserSell($id){
        $row;
        $connect = connectDB();
        $query = "SELECT * FROM product_user WHERE product_id = " .$id;
        $result = mysqli_query($connect,$query);
        if($result != false){
            $row = mysqli_fetch_array($result);
        }
        mysqli_close($connect);
        return $row;
    }

    function getProductInfo($id){
        $row;
        $connect = connectDB();
        $query = "SELECT * FROM product WHERE product_id = " .$id;
        $result = mysqli_query($connect,$query);
        if($result != false){
            $row = mysqli_fetch_array($result);
        }
        mysqli_close($connect);
        return $row;
    }

    function generateUrl($pageNumber){
        $url = $_SERVER['PHP_SELF'] ."?" .$_SERVER['QUERY_STRING'];
        if(strstr($url, "&page=") == true){
            $url = str_replace(strstr($url, "&page="), "&page=" .$pageNumber, $url);            
        }else{
            $url .= "&page=" .$pageNumber;
        }
        return $url;
    }

    function getPagePostMethod(){
        $page = 0;
        if(isset($_POST['page'])){
        
            $page = $_POST['page'] - 1;
        }
        return $page;
    }

    function getPage(){
        $page = 0;
        if(isset($_GET['page'])){
            $page = $_GET['page'] - 1;
        }
        return $page;
    }

    function getPagination($numOfRecord, $recordPerPage = 12){
        $page = getPage();
        $ret = "<div class='w3-center w3-padding-32' style='clear:both'><div class='w3-bar'>";
        $num_of_page = ceil($numOfRecord/$recordPerPage);
        if($num_of_page <= 5){
            for($i = 0; $i < $num_of_page; $i++){
                if($i != $page){
                    $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-button w3-hover-black'>" .($i+1) ."</a>";                        
                }else{
                    $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-black w3-button'>" .($i+1) ."</a>";                        
                }
            }
        }else{
            $ret .= "<a href=" .generateUrl('1') ." class='w3-bar-item w3-button w3-hover-black'>«</a>";
            if($page < 3){
                for($i = 0; $i < 5; $i++){
                    if($i != $page){
                        $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-button w3-hover-black'>" .($i+1) ."</a>";                        
                    }else{
                        $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-black w3-button'>" .($i+1) ."</a>";                        
                    }
                }
            }else{
                for($i = $page - 2; $i < $num_of_page && $i <= ($page + 2); $i++){
                    if($i != $page){
                        $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-button w3-hover-black'>" .($i+1) ."</a>";                        
                    }else{
                        $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-black w3-button'>" .($i+1) ."</a>";                        
                    }
                }
            }
            $ret .= "<a href=" .generateUrl($num_of_page) ." class='w3-bar-item w3-button w3-hover-black'>»</a>";            
        }
        $ret .= "</div></div>";
        return $ret;
    }

    function getPaginationUnhref($numOfRecord, $recordPerPage = 12){
        $page = getPage();
        $ret = "<div class='w3-center w3-padding-32' style='clear:both'><div class='w3-bar'>";
        $num_of_page = ceil($numOfRecord/$recordPerPage);
        if($num_of_page <= 5){
            for($i = 0; $i < $num_of_page; $i++){
                if($i != $page){
                    $ret .=  "<a page=" .($i + 1) ." class='w3-bar-item w3-button w3-hover-black' onclick='changePage(this)'>" .($i+1) ."</a>";
                }else{
                    $ret .=  "<a page=" .($i + 1) ." class='w3-bar-item w3-black w3-button' onclick='changePage(this)'>" .($i+1) ."</a>";                        
                }
            }
        }else{
            $ret .= "<a href=" .(1) ." class='w3-bar-item w3-button w3-hover-black' onclick='changePage(this)'>«</a>";
            if($page < 3){
                for($i = 0; $i < 5; $i++){
                    if($i != $page){
                        $ret .=  "<a page=" .($i + 1) ." class='w3-bar-item w3-button w3-hover-black' onclick='changePage(this)'>" .($i+1) ."</a>";                        
                    }else{
                        $ret .=  "<a page=" .($i + 1) ." class='w3-bar-item w3-black w3-button' onclick='changePage(this)'>" .($i+1) ."</a>";                        
                    }
                }
            }else{
                for($i = $page - 2; $i < $num_of_page && $i <= ($page + 2); $i++){
                    if($i != $page){
                        $ret .=  "<a page=" .($i + 1) ." class='w3-bar-item w3-button w3-hover-black' onclick='changePage(this)'>" .($i+1) ."</a>";                        
                    }else{
                        $ret .=  "<a page=" .($i + 1) ." class='w3-bar-item w3-black w3-button' onclick='changePage(this)'>" .($i+1) ."</a>";                        
                    }
                }
            }
            $ret .= "<a page=" .($num_of_page) ." class='w3-bar-item w3-button w3-hover-black' onclick='changePage(this)'>»</a>";            
        }
        $ret .= "</div></div>";
        return $ret;
    }
?>