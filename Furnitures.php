<?php
session_start();

if (isset($_POST["btnsignup"])) {
    $name = $_POST["txtUN"];
    $pw = $_POST["txtPW"];

    // Connect to MySQL DB server
    $con = mysqli_connect("fdb1032.awardspace.net", "4494176_furnituredb", "Furniture1234");

    // Select DB
    mysqli_select_db($con, "4494176_furnituredb");

    // Perform SQL query
    $sql = "INSERT INTO tbllogin (UserName, Password) VALUES ('$name', '$pw')";
    if (mysqli_query($con, $sql)) {
        echo "Sign up success";
        header("Location: Furnitures.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
<?php
if(isset($_POST["btnLogin"]))
{
    //Accept Data
    $un = $_POST["txtUN"];
    $pw = $_POST["txtPW"];
    setcookie("uname", "$un", time()+3600, "/","", 0); 
        //Connect to my SQL DB server
        $con = mysqli_connect("fdb1032.awardspace.net", "4494176_furnituredb", "Furniture1234");

        //Select DB
        mysqli_select_db($con,"4494176_furnituredb");
    
        //perform sql
        $sql = "SELECT * FROM tbllogin WHERE UserName='$un' AND Password='$pw'";
        $result = mysqli_query($con,$sql);

        if($row = mysqli_fetch_array($result))
        {
            session_start();
            $_SESSION["UserName"] = $un;
            $_SESSION["Password"] = $pw;
            $_SESSION["lat"] = time();
            header("Location: Furnitures.php");
        }
        else
        {
            echo "<p style=color:red> Invalid username or password</p>";
        }
        mysqli_close($con);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Lanka</title>
    <link rel="icon" type="image/x-icon" href="F.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Styles.css">
    <script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <div class="header">
        <p><b>FurnitureLanka Store</b> Welcome to our online furniture store...</p>
    </div>
</head>
<body>
    <div class="background-image">
        <img src="BG.jpg">
    </div>
    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <ul class="navbar-pic">
                <img src="0.png" width="100%">
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><button id="show-popup1">Sign Up</li>
                <li class="nav-item"><a class="nav-link" href="#logcontainer">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="#footer">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="https://wa.me/94722714507">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="https://maps.app.goo.gl/5sHYmUQesEMHQfWNA">Store
                        Locator</a></li>
                <li class="nav-item">
                    <div class="buttonDark"> <!-- Dark mood -->
                        <button onclick="DarkMode()"><i class="fa-solid fa-moon fa-xl"></i></button>
                    </div>
                    <script>
                        function DarkMode() {
                            var element = document.body;
                            element.classList.toggle("dark-mode");
                        }
                    </script>
                </li>
            </ul>
        </div>
    </nav>
    <br><br>


    <!-- Form sign up -->
    <form name="frmSignup" method="post" action="#">
    <div class="popup" id="popup1">
        <div class="close-btn">&times;</div>
        <div class="form">
            <h2>Sign Up</h2>
            <div class="form-element">
                <label for="signup-name">User Name</label>
                <input type="text" id="signup-name" name="txtUN" placeholder="Enter User Name">
            </div>
            <div class="form-element">
                <label for="signup-password">Password</label>
                <input type="password" id="signup-password" name="txtPW" placeholder="Enter new Password">
            </div>
            <div class="form-element" id="btnsignup-submit">
                <button type="submit" name="btnsignup">Sign Up</button>
            </div>
        </div>
    </div>
</form>


<script>
    document.querySelector("#show-popup1").addEventListener("click", function () {
        document.querySelector("#popup1").classList.add("active");
    });

    document.querySelector("#popup1 .close-btn").addEventListener("click", function () {
        document.querySelector("#popup1").classList.remove("active");
    });
</script>

    <br>
    <div class="easy">
            <div class="row" id="easy1">
                <p><b>Easy-Sit Sofa</b></p>
            </div>
            <div class="row" id="easy2">
                <p><b>Sit comfortably and enjoy your leisure time</b></p>
            </div>
    </div>

    <br><br>
    <div class="container" id="c">
        <div class="row">
            <div class="col-12" id="img">
                <div class="horizontal-scroll-wrapper">
                    <div class="row flex-nowrap">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top popup-img" src="1.webp" alt="Image 1" data-caption="1️⃣">
                                <div class="overlay-text"> 1️⃣</div>
                                <div class="card-body">
                                    <p><b>Colors : </b> Brown / Light-Gray</p>
                                    <p><b>Price : </b> Rs.90 000.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top popup-img" src="2.jpg" alt="Image 2" data-caption="2️⃣">
                                <div class="overlay-text"> 2️⃣</div>
                                <div class="card-body">
                                    <p><b>Colors : </b> Gray / Light-Gray</p>
                                    <p><b>Price : </b> Rs.110 000.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top popup-img" src="3.webp" alt="Image 3" data-caption="3️⃣">
                                <div class="overlay-text"> 3️⃣</div>
                                <div class="card-body">
                                    <p><b>Colors : </b> Black / White / Dark-Gray</p>
                                    <p><b>Price : </b> Rs.120 000.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top popup-img" src="4.jpg" alt="Image 4" data-caption="4️⃣">
                                <div class="overlay-text"> 4️⃣</div>
                                <div class="card-body">
                                    <p><b>Colors : </b> Green / Light-Blue / Dark-Blue</p>
                                    <p><b>Price : </b> Rs.70 000.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top popup-img" src="5.webp" alt="Image 5" data-caption="5️⃣">
                                <div class="overlay-text"> 5️⃣</div>
                                <div class="card-body">
                                    <p><b>Colors : </b> Brown(matte) / Black(matte)</p>
                                    <p><b>Price : </b> Rs.130 000.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top popup-img" src="6.webp" alt="Image 6" data-caption="6️⃣">
                                <div class="overlay-text"> 6️⃣</div>
                                <div class="card-body">
                                    <p><b>Colors : </b> Dark-Blue / Light-Blue</p>
                                    <p><b>Price : </b> Rs.105 000.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top popup-img" src="7.webp" alt="Image 7" data-caption="7️⃣">
                                <div class="overlay-text"> 7️⃣</div>
                                <div class="card-body">
                                    <p><b>Colors : </b> Black & White (Two tone)</p>
                                    <p><b>Price : </b> Rs.130 000.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Img Popup -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    
    <script>
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
    
        // Get all images with the class 'popup-img'
        var images = document.querySelectorAll(".popup-img");
        images.forEach(function(img) {
            img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.getAttribute("data-caption");
            }
        });
    
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>       
    <br><br><br>

    
        <p id="p2"> you want to spend your leisure time Comfortably? Then order from us now. We are ready to ship your
            order to your home...<button id="b2">Click here to place order <i class="fa fa-shoe-prints" id="f"></i>                </button></p>

    <script>
        document.getElementById("b2").addEventListener("click", function () {
            <?php if(isset($_SESSION["UserName"])): ?>
                window.location.href = "Furnitures2.php";
            <?php else: ?>
                alert("Please login");
            <?php endif; ?>
        });
    </script>

    <br>

    <div class="row"  id="logcontainer">
        <div class="containeer">
            <form name="frmLogin" method="post" action="#">
                <h2>Login</h2>
                <table>
                    <tr class="tr">
                        <td>User Name</td>
                        <td><input type="text" name="txtUN" placeholder="Enter User Name"></td>
                    </tr>
                    <tr class="tr">
                        <td>Password</td>
                        <td><input type="password" name="txtPW" placeholder="Enter Password"></td>
                    </tr>
                </table>
                <input type="submit" name="btnLogin" value="Login" class="btnLogin">
            </form>
        </div>
    </div>


    <br><br><br>
    <!-- Footer -->
    <footer>
        <div class="text-center text-lg-start" id="footer">

            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Check with us on social networks:</span>
                </div>
                <!-- Right -->
                <div>
                    <a href="" class="me-4 text-reset"><i class="fab fa-facebook-f"></i></a>
                    <a href="" class="me-4 text-reset"><i class="fab fa-google"></i></a>
                    <a href="" class="me-4 text-reset"><i class="fab fa-instagram"></i></a>
                </div>
            </section>

            <div class="row mt-3">
                <div class="col-md-6 col-lg-4 col-xl-8 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4"><i class="fas fa-chair me-3"></i>Furniture Lanka</h6>
                    <p>
                        Discover the best sofas for your living space. Comfort and style at affordable prices.
                    </p>
                </div>
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> No.46, Matara RD, Galle</p>
                    <p><i class="fas fa-envelope me-3"></i>Furniturelanka@gmail.com</p>
                    <p><i class="fas fa-phone me-3"></i> + 94 915 628 313</p>
                    <p><i class="fas fa-phone me-3"></i> + 94 915 628 314</p>
                </div>
            </div>
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">© 2024 Copyright:<a
                    class="text-reset fw-bold" href="#">Furniturelanka.com</a>
            </div>
    </footer>


</body>

</html>