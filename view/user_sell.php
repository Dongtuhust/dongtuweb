<?php 
	include "../includes/header.php"; 
	require_once "pagination.php";
	$recordPerPage = 5;
?>
<link rel="stylesheet" type="text/css" href="../css/w3s.css"/>

<div id="productUserSell">

</div>

<script>
	var page = 1;
	getProductUserSell();

	function getProductUserSell(){
		$.ajax({
			url: './data/getProductUserSell.php?page=' + page,
			type: 'get',
			dataType: 'text',
			data: {},
			success : function(result){
				$('#productUserSell').html(result);
			}
		});
	}

	function changePage(src){
		var pageNumber = src.getAttribute("page");
		if(pageNumber != page){
			page = pageNumber;
			getProductUserSell();
		}
	}
</script>