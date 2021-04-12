<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<?php
include("connection.php");

$userId = $_SESSION['id'];

$result = mysqli_query($mysqli, "SELECT * FROM experience where user_id='$userId'")
					or die("Could not execute the select query.");

$result2 = mysqli_query($mysqli, "SELECT * FROM personal_info where user_id='$userId'")
					or die("Could not execute the select2 query.");

$result3 = mysqli_query($mysqli, "SELECT * FROM education where user_id='$userId'")
                    or die("Could not execute the select3 query.");

// $rows = mysqli_fetch_array($result);
$personalInfo = mysqli_fetch_array($result2);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Templete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/d780100afc.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <section>
            <h1 class="Top-Big-Text mt-4">Hello! My name is <?php echo $personalInfo['name'] ?> and I am a <?php echo $personalInfo['current_position'] ?></h1>
            <h5><?php echo $personalInfo['address'] ?></h5>
            <div class="row">
                <div class="col-sm">
                    <h6><?php echo $personalInfo['email'] ?></h6>
                </div>
                <div class="col-sm">
                    <h6><?php echo $personalInfo['website'] ?></h6>
                </div>
                <div class="col-sm">
                    <h6><?php echo $personalInfo['phone'] ?></h6>
                </div>
            </div>
        </section>
        <section class="Second-Section p-3">
            <h3 class="text-center">WORK EXPERIENCE</h3>
            <div class="row">


                <?php
                while($res = mysqli_fetch_array($result)){

                    
                    echo "<div class='col-4'>";
                    echo "    <div class='row'>";
                    echo "        <div class='col-sm'> ";
                    echo " <h5> ".$res['company_name']." </h5> ";
                    echo "       </div> ";
                    echo "        <div class='col-sm'>";
                    echo "            <div>";
                    echo "                <p>".$res['start_date']."-<br>".$res['start_date']."</p>";
                    echo "           </div>";
                    echo "           <div>";
                    echo "               <p><b>".$res['position']."</b></p>";
                    echo "           </div>";
                    echo "        </div>";
                    echo "    </div>";
                    echo " </div>";


                }

                
                ?>
            </div>
        </section>
        <section class="Third-Section p-3">
            <h3 class="text-center">EDUCATION & TRAINING</h3>
            <div class="container">
                <div class="row">
                <?php
                while($res = mysqli_fetch_array($result3)){

                    
                    echo "<div class='col-sm col-hi'>";
                    echo "        <h4 class='text-center'>".$res['institute_name']."</h4>";
                    echo "    <hr class='dashed'>";
                    echo "    <div>";
                    echo "        <p class='text-center'>".$res['start_date']."<br>".$res['end_date']."</p>";
                    echo "    </div>";
                    echo "    <div>";
                    echo "        <p class='text-center'><b>".$res['degree']."</b> </p>";
                    echo "    </div>";
                    echo "    <div>";
                    echo "        <p class='text-center'><b>".$res['address']."</b> </p>";
                    echo "    </div>";
                    echo "</div>";


                }

                
                ?>
                </div>
            </div>
        </section>
        <section class="Forth-Section p-3">
            <h3 class="text-center">SKILLS & LANGUAGE</h3>
            <div class="row">
                <div class="col-sm col-hi">
                    <div class="row">
                        <div class="col-sm skills">
                            <div>
                                <p>PhotoShop</p>
                            </div>
                            <div>
                                <p>Illustrator</p>
                            </div>
                            <div>
                                <p>Xd</p>
                            </div>
                        </div>
                        <div class="col-sm skills">
                            <div class="">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>

                            </div>
                            <div class="pt-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="pt-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-hi">
                    <div class="row">
                        <div class="col-sm skills">
                            <div>
                                <p>UI Design</p>
                            </div>
                            <div>
                                <p>UX Design</p>
                            </div>
                            <div>
                                <p>Microsoft Office</p>
                            </div>
                        </div>
                        <div class="col-sm skills">
                            <div>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="pt-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="pt-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-hi">
                    <div class="row">
                        <div class="col-sm skills">
                            <div>
                                <p>Mandarin</p>
                            </div>
                            <div>
                                <p>English</p>
                            </div>
                            <div>
                                <p>Spanish</p>
                            </div>
                        </div>
                        <div class="col-sm skills">
                            <div>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="pt-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="pt-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>

</html>
