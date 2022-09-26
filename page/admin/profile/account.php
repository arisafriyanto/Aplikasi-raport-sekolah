<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
</head>
<body>


    <div class="dashboard-wrapper">
		<div class="dashboard-ecommerce">
			<div class="container-fluid dashboard-content ">


            

				<div class="row">

                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="user-avatar text-center d-block">
                                    <img src="../../assets/img/aaa.jpg" class="rounded-circle user-avatar-xxl">
                                </div>
                                <div class="text-center">
                                    <h2 class="font-24 mb-0"><?=ucwords($_SESSION['username']);?></h2>
                                    <p>Welcome To <?=ucwords($_SESSION['level']);?></p>
                                </div>
                            </div>





                            <?php 

                            

                                $level = $_SESSION['level'];
                                $id = $_SESSION['id'];

                                if($level == "admin") {

                                    $sql = mysqli_query($conn, "select * from login where id='$id' ");
                                    $data = mysqli_fetch_assoc($sql);

                            
                            ?>







                            <div class="card-body border-top">
                                <h3 class="font-16">Contact Information</h3>
                                <div class="">
                                    <ul class="list-unstyled mb-0">
                                    <li class="mb-0"><i class="fas fa-fw fa-envelope mr-2"></i>arisafriyanto1933@gmail.com</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Account</h5>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-success">
                                                <th scope="row"></th>
                                                <td>Nama Lengkap</td>
                                                <td>: <?=ucwords($data['nama'])?></td>
                                                <td></td>
                                            </tr>
                                            <tr class="table-secondary">
                                                <th scope="row"></th>
                                                <td>Username</td>
                                                <td>: <?=$data['username']?></td>
                                                <td></td>
                                            </tr>
                                            <tr class="table-warning">
                                                <th scope="row"></th>
                                                <td>Password</td>
                                                <td>: <?=$data['password']?></td>
                                                <td></td>
                                            </tr>
                                            <tr class="table-danger">
                                                <th scope="row"></th>
                                                <td>Hak Akses</td>
                                                <td>: <?=$data['level']?></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table><br>

                                </div>
                            </div>
                        </div>



                        <?php 
                                
                            }
                        
                        ?>



                </div>
            </div>
        </div>
    </div>


</body>
</html>