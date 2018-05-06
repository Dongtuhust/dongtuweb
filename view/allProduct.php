<?php
	require_once("pagination.php");
	$recordPerPage = 8;
?>

<h2 class="chimuc">Tất cả</h2>
<div class="row">
    <?php 
    $totalProducts = executeQuery("SELECT * FROM product");
    $page = getPage();
    $products = getPageProduct($totalProducts, $recordPerPage, $page);

    if(count($products)>0){
        $i = 0;
        // Sử dụng vòng lặp để duyệt kết quả truy vấn
        while ($i < count($products))
        {
            $row = $products[$i];
            $i += 1;
            ?>
            <div class="col-sm-3">
                <div class="card">
                    <a href="detail.php?id=<?=$row["product_id"]?>"><img class="card-img-top" src="<?=$row["product_image"]?>" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title"><?=$row["product_name"]?></h5>
                        <p class="card-text"><?=number_format($row["price_buy"])?>VNĐ</p>
                        <button data-id="<?php
                        if(isset($_SESSION['user_id'])){ echo 1;}else echo 0;
                        ?>"
                        type="button" class="btn btn-outline-warning btn-buy-now" data-product=<?=$row["product_id"]?>><i class="fa fa-shopping-cart"></i>
                    </button>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <?php
    }
}else{
    ?>
    <tr valign="top">
        <td >&nbsp;</td>
        <td ><b><font face="Arial" color="#FF0000">
        Khong tim thay thong tin !</font></b></td>
    </tr>
    <?php
}
?>
</div>

<?php
    echo getPaginationUnhref(count($totalProducts), $recordPerPage);
?>