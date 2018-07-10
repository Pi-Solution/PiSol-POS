<?php
  if(isset($_POST["submit"])){

    include_once 'include/db.inc.php';

    $jmb = $_POST['jmb'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone_nmb = $_POST['phone_nmb'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
  
    //error handlers
    //check for emty fields
    if(empty($jmb) || empty($name) || empty($lastname) || empty($phone_nmb) || empty($email) || empty($psw)){
      echo "<script type= 'text/javascript'>alert('prazno polje');</script>";
    }else{
      //check input caracters
      if(!preg_match("/^[0-9]*$/", $jmb) || !preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[a-zA-Z]*$/", $lastname) || !preg_match("/^[0-9]*$/", $phone_nmb)){
        
        echo "<script type= 'text/javascript'>alert('ne dozvoljeni znakovi');</script>";
      }else{
        //email validation
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           echo "<script type= 'text/javascript'>alert('email');</script>";
        }else{
          //personal already in db
          $sql = "SELECT * FROM personal WHERE JMB='$jmb'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if($resultCheck > 0){
            echo "<script type= 'text/javascript'>alert('osoba vec postoji');</script>";
          }else{
            //pasword hash
            $hashed_password = password_hash($psw, PASSWORD_DEFAULT);
            //insert user in database
            $sql_conn = "INSERT INTO personal (JMB, name, last_name, phone_nmb, email, password) VALUES ('$jmb', '$name','$lastname', '$phone_nmb','$email','$hashed_password');";
            mysqli_query($conn, $sql_conn);
            echo "<script type= 'text/javascript'>alert('Uspjesno dodato u bazu');</script>";
          }
        }
      }
    }
  }
?>
<!DOCTYPE html>
  <html>
    <head>
      <link rel="stylesheet" type="text/css" href="register1.css">
    </head>
    <body>

      <h2>Modal Signup Form</h2>

      <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Worker registration</button>

      <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content animate" action="register1.php" method="post">
          <div class="container">
            <h1>Registracija radnika</h1>
            <p>Molimo vas da popunite formu da bi ste registrovali radnika.</p>
            <hr>
            <label for="jmb"><b>JMB</b></label>
            <input type="text" placeholder="Unesi JMB" name="jmb" required>

            <label for="name"><b>Ime</b></label>
            <input type="text" placeholder="Unesi Ime" name="name" required>
            
            <label for="lastname"><b>Prezime</b></label>
            <input type="text" placeholder="Unesi Prezime" name="lastname" required>
            
            <label for="phone_nmb"><b>Broj telefona</b></label>
            <input type="text" placeholder="Unesi Broj telefona" name="phone_nmb" required>

            <label for="email"><b>E-mail</b></label>
            <input type="text" placeholder="Unesi E-mail" name="email" required>

            <label for="psw"><b>Šifra</b></label>
            <input type="password" placeholder="Unesi Password" name="psw" required>
            
            <p>Preuzmi <a href="PDF/PD3100.pdf" target="_blank" style="color:dodgerblue">formu za prijavu</a> radnika.</p>

            <div class="clearfix">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <button type="submit" value="Signup" name="submit" class="signupbtn">Sign Up</button>
            </div>
          </div>
        </form>
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

</body>
</html>