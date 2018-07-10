//made some fix on table
function table_width() {
	var width = document.getElementById('drink_child').offsetWidth;
	document.getElementById('drink').style.width = width + "px";
	//console.log(width)
}

//this function we use to change selection of categories between drink and food

function chngDir(get_id) {

	var buttons_id = get_id
	//console.log(buttons_id)

	if (buttons_id == 100994) {
		document.getElementById('100994').style.backgroundColor = "#344860";
		document.getElementById('100993').style.backgroundColor = "#E44A38";
		sel_dir = 0;
		category = "drink"
		category_id = "Gazirani sokovi"
		//console.log(sel_dir);
		load_categories();
		load_art2();
	}else if (buttons_id == 100993) {
		document.getElementById('100993').style.backgroundColor = "#344860";
		document.getElementById('100994').style.backgroundColor = "#E44A38";
		sel_dir = 1;
		category = "food"
		category_id = "Topla Predjela"
		//console.log(sel_dir);
		load_categories();
		load_articles(category_id);
	}

	//document.getElementById('categories_child').innerHTML = " "

	//document.getElementById('categories_child').innerHTML = ``
}
//this function is loading articles when document is loaded
function load_art2() {
	category_id = "Gazirani Sokovi";
	load_articles(category_id);

}
//We use this function for closing dish settings
function close_dish_settings() {
	document.getElementById('modify_dish').style.visibility = "hidden";
	document.getElementById('articles_child').style.visibility= "visible";
}
//we are adding event listener to table
function add_event_to_table() {
	forClick3 = document.getElementsByClassName('atricle_table_row');
	for (var i = 0;  i < forClick3.length ; i++) {
		forClick3[i].addEventListener("click", function(){
			console.log("hello there");
			document.getElementById('modify_dish').style.visibility='visible';
			document.getElementById('articles_child').style.visibility='hidden';
		});
	}
}



//here we add event listener to articles so when we click we add item to table 
function add_articles_to_table() {

	var forClick = document.getElementsByClassName('div_click');

	for (var i = 0;  i < forClick.length ; i++) {
		forClick[i].addEventListener("click", function(){
			console.log(this.id);
			var div_id = this.id
			var art_id;

			for (var i = 0; i < articles.length; i++) {
				if (articles[i].id == div_id) {
					console.log(i);
					art_id = i
					break;
				}
			}
			if (articles[art_id].is_it_typed == false) {

				if (b % 2 === 0) {
        			div_col = "#dddddd"
        			b++
    			} else {
        			div_col = "#ECF0F1"
        			b++
    			}

				var div_col;
				articles[art_id].typed = articles[art_id].typed + 1;
				articles[art_id].total = parseFloat(articles[art_id].total) + parseFloat(articles[art_id].price_out);
				articles[art_id].total = articles[art_id].total.toFixed(2)
				document.getElementById('drink').innerHTML += `
						<tr style="background:${div_col};"  id="article_table_row${articles[art_id].id}">
							<td class="atricle_table_row">${articles[art_id].a_name}</td>
							<td id="typed_quantity${art_id}" style="text-align: center">${articles[art_id].typed}</td>
							<td style="text-align: center">${articles[art_id].price_out}</td>
							<td id="total_price${art_id}" style="text-align: center">${articles[art_id].total}</td>
						</tr>
					`;
				document.getElementById(`art_tip${art_id}`).innerHTML= articles[art_id].typed;
				//Adding to total 
				total = total + parseFloat(articles[art_id].price_out);
				document.getElementById('total2').innerHTML = total.toFixed(2);
				//here we change var to true se we later know did we already typed this articles
				articles[art_id].is_it_typed = true;
				console.log(articles[art_id].is_it_typed);
				add_event_to_table();
			}else{
				//here we add all if we already typed article
				articles[art_id].typed = articles[art_id].typed + 1; 
				articles[art_id].total = parseFloat(articles[art_id].total) + parseFloat(articles[art_id].price_out);
				total = total + parseFloat(articles[art_id].price_out);
				document.getElementById(`typed_quantity${art_id}`).innerHTML = articles[art_id].typed;
				document.getElementById(`total_price${art_id}`).innerHTML = articles[art_id].total.toFixed(2);
				document.getElementById('total2').innerHTML = total.toFixed(2);
				document.getElementById(`art_tip${art_id}`).innerHTML = articles[art_id].typed;
			}
		});
	}
}
//with this function we load articles by categories
function load_articles(category_id) {
	var articles_child = document.getElementById('articles_child')
	articles_child.innerHTML = " ";
	//console.log(sel_dir)

	for ( i = 0; i < articles.length; i++) {
		if (articles[i].category == category_id) {
			articles_child.innerHTML += `
				<div class="article">
					<div class="div_click" id="${articles[i].id}">
					${articles[i].a_name}
					</div>	
						<div class="art_name">
							<div>
								<h4>${articles[i].a_name}</h4>
							</div>
						</div>
						<div class="art_par">
							<div class="art_prc">
								<div class="art_prc2">
									<p>${articles[i].price_out}</p>
								</div>
							</div>
							<div class="art_tip">
								<div class="art_tip2">
									<p id="art_tip${i}">${articles[i].typed}</p>
								</div>
							</div>
						</div>
					</div>
				</div>

			`;
		}
	}
	add_articles_to_table();
}

//with this we load categories to screen
function load_categories() {
	//console.log(categories[sel_dir]);
	//console.log(sel_dir)
	document.getElementById('categories_child').innerHTML = " "
	for (i = 0; i < categories[sel_dir].length; i++) {

		document.getElementById('categories_child').innerHTML += `
					<div class="categories_child2">
						<div class="categories_child3" id="${categories[sel_dir][i].category_name}">
							<p>${categories[sel_dir][i].category_name} </p>
						</div>
					</div>
			`
	}
	for (var i = 0;  i < categories[sel_dir].length ; i++) {
		var forClick = document.getElementsByClassName('categories_child3');
			forClick[i].addEventListener("click", function(){
				category_id = this.id;
				/*document.getElementById(this.id).style.backgroundColor = "#C1392B";

				var elements = document.querySelectorAll(".categories_child2")
				for (var i = 0; i < elements.length; i++) {
        			elements[i].style.backgroundColor = "#7E8C8D !important";
        			console.log("gggg")
    			}*/

				//console.log(articles[i].category)
				load_articles(category_id);
			});
	}
}