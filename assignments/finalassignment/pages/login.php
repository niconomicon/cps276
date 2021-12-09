






<?php



function init(){
            
    $login=<<<HTML

        
    <form action="index.php"> 
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="sshaper@test.com">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
    </div>
    <!--<button type="submit" class="btn btn-primary" href="index.php?page=welcome" name="submit">Login</button>-->
    <a class="btn btn-primary" href="index.php?page=welcome">Login</a>
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

