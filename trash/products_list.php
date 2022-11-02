<?php  
	$page_count = 1;
	$page_number = 1;
	$current_page = 1;
	$page_id = 1;
	

	if (isset($_GET['page'])) {
		$page_id = $_GET['page'];

	}

	$next_page_id = $page_id + 1;
	$back_page_id = $page_id - 1;
	if (count($line) > 12) {
		$page_count = ceil(count($line) / 12);
		//print($page_count);
	}

	$cat_name = $line[0]['sec_name'];
	echo "<h1>{$cat_name}</h1>";   
    
    while ($page_number <= $page_count) {
    	$product_number = 1;
    	if ($page_id == $page_number) {
    		echo	"<div class='grid'>";
    	
    	
    	
    	while ($product_number <= 12 * $page_number && $product_number <= count($line) - 12 * ($page_number-1)) {
    		$col_value = $line[$product_number - 1 + 12 * ($page_number-1)];
    		$product_number ++;
    		$id = $col_value['id'];
	    	$name = $col_value['name'];
	    	$path = $col_value['path'];
	    	$price = $col_value['price'];
         	echo
    
				"<a class='grid__cell' href='index.php?id={$id}'>
								<div class='grid__icon'>
									<img class='grid__image' src='{$path}'>
								</div>
								<div class='grid__info'>
									<p class='grid__name'>
										{$name}
									</p>
									<p class='grid__name price'>
										{$price}
									</p>
								</div>
							</a>

							";
    	}
    	
    	echo "</div>";
    	}
    	$page_number ++;
    }
 ?>

 <div class="nav_page">

 	<?php
 	if ($page_id < $page_count) {
 		echo "<a class='nav_main' href='index.php?cat_id={$cat_id}&page={$next_page_id}'>следующая страница > </a>"; 
 	}
 	 if ($page_id > 1){
 		echo "<a class='nav_main' href='index.php?cat_id={$cat_id}&page={$back_page_id}'>< предыдущая страница</a>";
 	}
 	?>
</div>