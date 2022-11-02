<?php  
echo "<h1>Категории товаров</h1>";   
echo "<div class='cat'>\n";
    foreach ($line as $col_value) {
    	$id = $col_value['id'];
    	$name = $col_value['name'];
    	$count = $col_value['count'];
    	if ($count > 0) {
    		echo "\t<a class='cat_row' href='index.php?cat_id={$id}'>\n
        	 \t\t<div class='cat_name'>{$name}</div>\n
        	 \t\t<div>{$count}</div>\n
         	 \t</a>\n";
    	}
    	
    }
   
echo "</div>\n";

?>
