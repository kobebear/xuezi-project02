<?php
require_once("../../init.php");
function get_index_products(){
	global $conn;
	$output=[
		//recommended=>[推荐商品列表],
		//new_arrival=>[新品上架],
		//top_sale=>[热销]
	];
	$sql="select * from xz_index_product where seq_recommended>0 order by seq_recommended";
	$result=mysqli_query($conn,$sql);
	$products=mysqli_fetch_all($result,1);
	$output["recommended"]=$products;

	$sql="select * from xz_index_product where seq_new_arrival>0 order by seq_new_arrival";
	$result=mysqli_query($conn,$sql);
	$products=mysqli_fetch_all($result,1);
	$output["new_arrival"]=$products;

	$sql="select * from xz_index_product where seq_top_sale>0 order by seq_top_sale";
	$result=mysqli_query($conn,$sql);
	$products=mysqli_fetch_all($result,1);
	$output["top_sale"]=$products;

	echo json_encode($output);
}
//get_index_products();
function getProductsByKw(){
	global $conn;
	//?kw=mac 256g
	@$kw=$_REQUEST["kw"];
	$sql="select lid,price,title,(select md from xz_laptop_pic where laptop_id=lid limit 1) as md from xz_laptop ";
	if($kw){
		//$kw=mac 256g
		//将$kw按空格切割为数组
		$kws=explode(" ",$kw);//js:split
		//$kws:[mac,256g]
		for($i=0;$i<count($kws);$i++){
			$kws[$i]=" title like '%".$kws[$i]."%' ";
		}
		//$kws:[
			//" title like '%mac%' ",
			//" title like '%256g%' "
		//]
		$sql.=" where ".implode(" and ",$kws);
		               //js: $kws.join(" and ")
	}
	$result=mysqli_query($conn,$sql);
	echo json_encode(mysqli_fetch_all($result,1));
}
//getProductsByKw();