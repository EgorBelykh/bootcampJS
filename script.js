

var subtractButton = document.getElementById('subtract');
var addButton = document.getElementById('add');
var buyButton = document.getElementById('buy');

var count = document.getElementById("count");

var productCount = 1;

var img1Src = 'image1.jpg';
var img2Src = 'image2.jpg';
var img3Src = 'image3.jpg';

function add() {
	
	productCount ++;
	count.textContent = productCount;
	if (productCount > 1) {
		
		subtractButton.removeAttribute('disabled');
	}
}

function subtract() {
	
	productCount --;
	count.textContent = productCount;
	if (productCount == 1) {
		
		subtractButton.setAttribute('disabled', true);

	}

}



function buy() {
	new Noty({
    text: "В корзину добавлено " + productCount + " товаров",
    timeout: 2000,
    type: 'info',
	}).show()
}

subtractButton.addEventListener('click', subtract)
addButton.addEventListener('click', add)
buyButton.addEventListener('click', buy)

var bigImg = document.getElementById("bigImg");

var img1 = document.getElementById("img1");
img1.addEventListener('mouseover', function() {
	bigImg.setAttribute('src', img1Src);
});

var img2 = document.getElementById("img2");
img2.addEventListener('mouseover', function() {
	bigImg.setAttribute('src', img2Src);
});

var img3 = document.getElementById("img3");
img3.addEventListener('mouseover', function() {
	bigImg.setAttribute('src', img3Src);
});

//buyButton.addEventListener("click", add);