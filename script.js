



let count = document.getElementById("count");


let addButton = document.getElementById('add');
addButton.addEventListener('click', add);

function add() {
	
	count.value ++;
	if (count.value > 1) {
		
		subtractButton.removeAttribute('disabled');
	}
}

let subtractButton = document.getElementById('subtract');
subtractButton.addEventListener('click', subtract);

function subtract() {
	
	count.value --;
	if (count.value == 1) {
		
		subtractButton.setAttribute('disabled', true);

	}

}

let buyButton = document.getElementById('buy');
buyButton.addEventListener('click', buy);
function buy() {
	new Noty({
    text: "В корзину добавлено " + count.value + " товаров",
    timeout: 2000,
    type: 'info',
	}).show()
}

const imageSrc = ['image1.jpg', 'image2.jpg', 'image3.jpg'];

let bigImg = document.getElementById("bigImg");

let images = document.querySelectorAll('img.mini-image');

for (var i = 0; i < images.length; i++) {
	let src = imageSrc[i];
	images[i].addEventListener('mouseover', function() {
		bigImg.setAttribute('src', src);	
});
}

