function mrg_fun() {
	myAjaxRequest();
	myAjaxRequest2();
	setTimeout(function() { load_categories(); }, 100);
	table_width();
	setTimeout(function() { load_art2(); }, 100);
}
