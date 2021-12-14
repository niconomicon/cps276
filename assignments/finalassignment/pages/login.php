<?php

include('pages/routes.php');

 
function init(){
    
    require_once 'classes/PdoMethods.php';

    $error = '';
    //echo "initialized";

    if(isset($_POST['submit'])){
        echo "clicked";
    /* IF THE USERNAME AND PASSWORD MATCH THEN REDIRECT TO */
    
    if($_POST['email'] === "sshaper@test.com" && $_POST['password'] === "password"){
      
      session_start();
      $_SESSION['access'] = "accessGranted";
  
      /* HERE I STORE A FIRST NAME IN THE SESSION AS WELL AND WILL DISPLAY IT ON EVERY PAGE*/
      $_SESSION['fname'] = $_POST['fname'];
  
      //session_regenerate_id();
      header('index.php?page=welcome');
    }
    else {
      $error = "Incorrect username or password";
    }


  }
        
    //$cats='hey look, cats';
    
    $login=<<<HTML

<h1>Login</h1>
<p class="error"> $error </p>   
    <form action="index.php?page=login"> 
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="email" value = "sshaper@test.com" name="email" aria-describedby="emailHelp" placeholder="sshaper@test.com">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password" value = "password" name="password" placeholder="password">
    </div>
    <!-- <input type="submit" name="submit" value="Login" class="btn btn-primary"> -->
    <a class="btn btn-primary" name="submit" href="index.php?page=welcome">Login</a>
    </form>
HTML;
            
    return [$error,$login];
}

?>

