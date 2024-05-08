<?php
require_once 'auth.php';

var_dump($_POST);
$error = "";
if(isset($_POST['pseudo']) && isset($_POST['password'])){
    if($_POST['pseudo']==="john" && $_POST['password']==='1234'){
        session_start();
        $_SESSION['user']=1;
        header('Location: /index.php');
        exit();
    }else{
        $error = "Veuillez verifier les informations"; 
    }
}else{
    echo "error";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Page de Login</title>


</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <h1 class="text-center">Authentication</h1>
            <div class="col-md-12 w-100 mt-5 d-flex justify-content-center align-items-center ">
                <form class="form-group" method="POST">
                    <?php if($error):?>
                        <div class="alert alert-danger">
                            <?=$error?>
                        </div>
                    <?php endif;?>
                  
                  <div  class=" mb-4">
                    <input type="text" name="pseudo" placeholder="pseudo"  class="form-control" />
                  </div>
                
                 
                  <div  class=" mb-4">
                    <input type="password" name="password"  placeholder="password" class="form-control" />
                  </div>
                
                  
                  <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                  </div>
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
<!-- <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
  <i class="fab fa-facebook-f"></i>
</button>

<button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
  <i class="fab fa-google"></i>
</button>

<button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
  <i class="fab fa-twitter"></i>
</button>

<button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
  <i class="fab fa-github"></i>
</button> -->