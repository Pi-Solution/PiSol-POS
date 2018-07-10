var category_id = "Gazirani sokovi";
var category = "drink"
var articles = new Array();
var art_by_categories = new Array();
var categories_drink = new Array();
var categories_food = new Array();
var categories = new Array(categories_drink,categories_food);
var typed = 0;
var sel_dir = 0;
var total = 0;
var b = 0;

//parent object for articles
function Articles(id, type, category, a_name, price_in, price_out, stock, typed, total, is_it_typed) {
	this.id = id;
	this.type = type;
	this.category = category;
	this.a_name = a_name;
	this.price_in = price_in;
	this.price_out = price_out;
	this.stock = stock;
	this.typed = typed;
	this.total = total;
	this.is_it_typed = is_it_typed;
}

//with this function we are pulling categories of articles from php file
function myAjaxRequest2() {
	var myRequest = new XMLHttpRequest();
	myRequest.open('GET', 'data/categories.php');
	
	myRequest.onload = function() {
		if(myRequest.status >= 200 && myRequest.status < 400){
			var myData = JSON.parse(this.responseText);
			//console.log(myData);
			//var myData = JSON.parse(myRequest.responseText);
			myReqToObj(myData);
		}else{
			console.log("connection error2")
		}
	};

	myRequest.error = function(){
		console.log("conection error");
	};

	myRequest.send();

	function myReqToObj(data) {

		for(i = 0; i < data.length; i++ ) {
			if (data[i].type === "drink") {
				categories_drink.push(data[i]);

			}else if (data[i].type === "food") {
				categories_food.push(data[i]);
			}
		}
	};
};

//with this function we are pulling all artisles from php that are stored in are database
function myAjaxRequest() {
	var myRequest = new XMLHttpRequest();
	myRequest.open('GET', 'data/articles.php');
	
	myRequest.onload = function() {
		if(myRequest.status >= 200 && myRequest.status < 400){
			var myData = JSON.parse(this.responseText);
			//console.log(myData);
			//var myData = JSON.parse(myRequest.responseText);
			myReqToObj(myData);
		}else{
			console.log("connection error2")
		}
	};

	myRequest.error = function(){
		console.log("conection error");
	};

	myRequest.send();

	function myReqToObj(data) {

		for(i = 0; i < data.length; i++ ) {

				articles[i] = new Articles()
					articles[i].id = data[i].id;
					articles[i].type = data[i].type;
					articles[i].category = data[i].category;
					articles[i].a_name = data[i].a_name;
					articles[i].price_in = data[i].price_in;
					articles[i].price_out = data[i].price_out;
					articles[i].typed = 0;
					articles[i].total = 0;
					articles[i].is_it_typed = false;
		}
		
	};
};
