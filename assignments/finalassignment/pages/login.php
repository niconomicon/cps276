<?php


function init(){
    $error = '';

if(isset($_POST['submit'])){
    /* IF THE USERNAME AND PASSWORD MATCH THEN REDIRECT TO */
    if($_POST['username'] === "admin" && $_POST['password'] === "password"){
      
      session_start();
      $_SESSION['access'] = "accessGranted";
  
      /* HERE I STORE A FIRST NAME IN THE SESSION AS WELL AND WILL DISPLAY IT ON EVERY PAGE*/
      $_SESSION['fname'] = $_POST['fname'];
  
      //session_regenerate_id();
      header('location:index.php?page=welcome');
    }
    else {
      $error = "Incorrect username or password";
    }
  }
        
    //$cats='hey look, cats';

    $login=<<<HTML

    <p class="error"> $error </p>   
    <form action="index.php"> 
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="sshaper@test.com">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
    </div>
    <input type="submit" name="submit" value="Login" class="btn btn-primary">
    <!-- <a class="btn btn-primary" href="index.php?page=welcome">Login</a> -->
    </form>
HTML;
            
    return ["<h1>Login</h1>",$login];
}





/*function init(){

    $login=<<<HTML

<h1>Login</h1>    
    <form>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="sshaper@test.com">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    </form>
HTML;
            
    return ["<h1>Welcome</h1>",$login];
}*/

?>

