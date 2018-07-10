<?php
	session_start();
	
	//provjera da li je logovan
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	} else {
    	header("Location: index.php?empty");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.type.screen.css">
	<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:500|Teko:500" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body onload="mrg_fun();" onresize="table_width();">
	<div class="typed" id="typed">
		<div class="drink">
			<div class="drink_child" id="drink_child">
				<table class="table_tip" id="drink">
					<tr>
					    <th style="width: 50%;">Name</th>
					    <th style="width: 15%; text-align: center">Quantity</th>
					    <th style="width: 15%; text-align: center">Price</th>
					    <th style="width: 20%; text-align: center;">Total</th>
					</tr>
				</table>
			</div>
			<div class="total">
			<p style="float: left;">Total:</p>
			<p id="total2" style="float: right;">0</p>
			</div>
		</div>
	</div>
	<div class="articles" id="articles">
		<div class="articles_child" id="articles_child">
		</div>
		<div class="modify_dish" id="modify_dish">
			<div class="modify_dish_header">
				<button id="close_dish_settings" onclick="close_dish_settings();">CLOSE</button>
			</div>
			<div class="side_dish">
				<div class="side_dish2">
					
				</div>
			</div>
			<div class="dish_sos">
			
			</div>
			<div class="dish_how_done">
				<button id="b1">RARE</button><!--
				--><button id="b2">MEDIUM</button><!--
				--><button id="b3">ENGLISH</button><!--
				--><button id="b4">MEDIUM WELL</button><!--
				--><button id="b5">MEDIUM RARE</button><!--
				--><button id="b6">WELL DONE</button>
			</div>
			<div class="how_many_dish">
				<button class="dish_button"id="one_dish">THIS ONE</button><!--
				--><button class="dish_button" id="all_dish">ALL</button><!--
				--><button class="dish_b_first">-</button>
				<div class="dish_b_middle"></div>
				<button class="dish_b_last">+</button>
			</div>
			<div class="dish_when_done">
				<button>ODMA</button><!--
				--><button>HLADNO PREDJELO</button><!--
				--><button>TOPLO PREDJELO</button><!--
				--><button>GLAVNO JELO</button><!--
				--><button id="last_btn">DESERT</button>
			</div>
			<div class="other">
				<input type="text" name="additional_note" placeholder="Additional note" id="additional_note" class="additional_note">
			</div>
			<button class="additional_note_button">
				<img src="pics/icons/check.png" height="100%" width="15%">
			</button>
		</div>
	</div>
		<!--
		<div class="a_search">
			<img src="pics/icons/search.png" height="60%" width="4%" class="pic">
			<input type="text" name="search_bar" class="search_bar" placeholder="Search">
		</div>
		-->
	<div class="buttons" id="buttons">
		<button class="button1"><strong>CHECK</strong></button>
		<button class="button2" onclick="document.getElementById('id01').style.display='block'"><strong>TABLES</strong></button>
	</div>
	<div class="most_used" id="most_used">
		
	</div>
	<div class="nav_bar">
		<button>M. PANEL</button><!--
		--><button>STORAGE</button><!--
		--><button>REPORTS</button><!--
		--><button>SHIFT C.</button>
		<a href="action-files/log-out.php" id="log-out"></a>
	</div>
	<div class="ctg_buttons">
				<button class="ctg_button1" id="100994" onclick="chngDir(this.id);"><strong>DRINK</strong></button>
				<button class="ctg_button2" id="100993" onclick="chngDir(this.id);"><strong>FOOD</strong></button>
	</div>
	<div class="categories" id="categories">
		<div class="categories_child" id="categories_child">
			
		</div>
	</div>


	<div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="modal-content animate" action="register1.php" method="post">
          <div class="container">
            <div class="clearfix">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <button type="submit" value="Signup" name="submit" class="signupbtn">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>
<script type="text/javascript" src="js/article.object.js"></script>
<script type="text/javascript" src="js/main.type.screen.js"></script>
<script type="text/javascript" src="js/load.all.js"></script>

</body>
</html>