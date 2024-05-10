<?php
$users = "db/users.csv";
$success = null;
if(isset($_POST['pseudo'],$_POST['passwd'])){
    $pseudo = $_POST["pseudo"];
    $password = $_POST["passwd"];
    file_put_contents($users,"\n".implode(',',$_POST),FILE_APPEND);
    $success = "Votre inscription a réussie!";
}
$users = file_get_contents($users);

?>
<pre>
    <?php
        // var_dump($users);
        // var_dump($_POST);
    ?>
</pre>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Page d'inscription</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row bg-light mt-5">
            <h1 class="mt-5 text-center">SIGN UP</h1>
            <div class="  d-flex justify-content-center ">
                <form class="form-group" method="POST">
                    <?php if($success): ?>
                        <div class="alert alert-success">
                            <?= $success ?>
                        </div>
                    <?php endif; ?>
                  <div  class=" mb-4">
                    <input type="text" name="pseudo" placeholder="Pseudo"  class="form-control" />
                  </div>
                  <div  class=" mb-4">
                    <input type="password" name="passwd"  placeholder="Password" class="form-control" />
                  </div>
                  <div  class=" mb-4">
                    <input type="email" name="email"  placeholder="Email" class="form-control" />
                  </div>
                  <div  class=" mb-4">
                    <input type="text" name="address"  placeholder="Address" class="form-control" />
                  </div>
                  <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                  </div>
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-sm btn-primary btn-block mb-4">Sign up</button>
                  <a href="/login.php">Login</a>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
        
    </div>