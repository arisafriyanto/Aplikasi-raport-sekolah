<?php 

    require "functions.php";

    if(isset($_POST['register'])) {

        if(register($_POST) > 0) {

            echo "
					<script>
						alert ('Register Berhasil Silahkan Login!!');
						window.location.href='index.php';
					</script>
				";

        }else{

            echo "
					<script>
						alert ('Register Gagal!!');
						window.location.href='index.php';
					</script>
				";

        }

    }

?>
<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        </style>
</head>
<body>


    <form class="splash-container" action="" method="post">
        <div class="card">

            <div class="card-header">
                <h3 style="text-align: center;" class="mb-1">Registrations</h3>
                <p style="text-align: center;">Please enter your user information</p>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="level" required="" value="admin"utocomplete="off" readonly>
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Username" autocomplete="off">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="nama" required="" placeholder="Name" autocomplete="off">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" type="password" name="password" required="" placeholder="Password">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="password" name="password2" required="" placeholder="Confirm Password">
                </div>

                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit" name="register" >Register My Account</button>
                </div>

            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="index.php" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>

</body> 
</html>