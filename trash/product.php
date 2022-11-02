<?php $item = $line[0]; ?>
		<div class="product">
			<div class="product__prewiew">
				<div class="product__gallery">

					<div class ="product__slider">
						<?php  
							$product_img = "SELECT i.path FROM images i WHERE id IN (SELECT image_id FROM product_image WHERE product_id={$item['id']})";
							$result = mysqli_query($link, $product_img);
							$images = mysqli_fetch_all($result, 1);
							if (count($images)>0) {
								foreach ($images as $img) {
									$path = $img['path'];
									echo "<img class='mini-image' src={$path} id='img1'>";
								}
							}
							

						?>
									</div>
					<div class="product__image">
						<?php  
						if (count($images)>0) {
						echo "<img class='big-image' src='{$images[0]['path']}' id='bigImg'>";
					}
						?>
						
					</div>
				</div>
			</div>
			<div class="product__description">
				<h1 class="product__title"><?php print($item['name']); ?></h1>
				<div class="product__categories w400">
					<?php 
					$cat_name = $item['sec_name'];
					$cat_link = $item['sections_id'];
					echo "<a class='categories' href='index.php?cat_id= {$cat_link}'>{$cat_name}</a>"; 

					?>
					
					
				</div>
				<div class="product__price w400">
					<div class="product__price-actual">
						<span class="product__price-old"><?php print($item['price']); ?></span>
						<span class="product__price-current"><?php print($item['price_discount']); ?></span>
					</div>
					<div class="product__price-discount">
						<span class="price"><?php print($item['price_promo']); ?></span>
						<span class="promokod"> - с промокодом</span>
					</div>

				</div>
				<div class="info w360">
					<div class="info__nalichie">
						<span class="info__simvol">&#10004;</span>
						<span class="info__text" > В наличии в магазине</span>
						<a href="" class="info__shop">Lamoda</a>
					</div>
					<div>
						<span class="info__simvol">&#9951;</span>
						<span class="info__text">Бесплатная доставка</span>
					</div>
				</div>
				<div class="product__counter">
					<button class="product__add" id="subtract" disabled="true">-</button>
					<input type="number" class="product__count" id="count" disabled value="1">
					<button class="product__add"  id="add">+</button>
				</div> 
				<div class="product__button ">
					<button class="product__shop" id="buy" onclick="">КУПИТЬ</button>
					<button class="product__favorite">В ИЗБРАНОЕ</button>
				</div>
				<div class="product__text">
					<?php print($item['description']); ?>
				</div>
				<div class="product__share">
					<span>ПОДЕЛИТЬСЯ:</span>
					<img class="product__social" src="../social_images/vk.png">
					<img class="product__social" src="../social_images/google.png">
					<img class="product__social" src="../social_images/facebook.png">
					<img class="product__social" src="../social_images/twitter.png">
					<div class="share-count">123</div>
					
				</div>
			</div>
		</div>
<script type="text/javascript" src="trash/script.js"></script>