<?php
    require_once "./pagination.php";
    $recordPerPage = 8;
    
    if(isset($_GET["category_id"])){
        $category;
        $link = connectDB();
        $category_id = $_GET["category_id"];
        $sql = "select * from category where category_id = " .$category_id; 
        $result = mysqli_query($link, $sql);
        if($result != false){
            if(mysqli_affected_rows($link) == 0){
                header('Location: index.php');
            }
            $category = mysqli_fetch_array($result);
        }
    }
    else{
        header('Location: index.php');
    }
?>

<link rel="stylesheet" type="text/css" href="../css/w3s.css"/>

<?php include "../includes/header.php" ?>
    
<div class="background-deep <?php echo $category["image_uri"]; ?>">
</div>
<div class = "head-title">
	<p><?php echo $category["category_name"]; ?></p>
	<p style="font-size: 30px"><?php echo $category["title"]; ?></p>
	<div class="go">
		<a href="#p1" title=""><button type="button" class="btn btn-light">Go</button></a>
	</div>
</div>
<div class="container" id="product_list">

</div>

<?php include "../includes/footer.php" ?>

<script>
	var page = 1;
	getAllProduct();

	function getAllProduct(){
		$.ajax({
            url: './data/getProductCategory.php?category_id=' + <?php echo $category_id; ?> + '&page=' + page,
			type: 'get',
			dataType: 'text',
			data: {},
			success : function(result){
				$('#product_list').html(result);
			}
		});
	}

	function changePage(src){
		var pageNumber = src.getAttribute("page");
		if(pageNumber != page){
			page = pageNumber;
			getAllProduct();
		}
	}
</script>