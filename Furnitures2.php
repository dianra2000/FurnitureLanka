<?php
session_start();
ob_start(); // Start output buffering

if (!isset($_SESSION["UserName"])) {
    echo "<script>alert('Order Success'); window.location.href='Furnitures.php';</script>";
    exit();
}
?>

<?php
if (isset($_POST["btnsubmit"])) 
{
    $name = $_POST["txtName"];
    $address = $_POST["txtAddress"];
    $email = $_POST["txtEmail"];
    $pno = $_POST["txtPno"];
    $product = $_POST["txtProduct"];

    // Connect to MySQL DB server
    $con = mysqli_connect("fdb1032.awardspace.net", "4494176_furnituredb", "Furniture1234");

    // Select DB
    mysqli_select_db($con, "4494176_furnituredb");

    // Perform SQL query
    $sql = "INSERT INTO tblorder (name, address, email, phoneNo, product) VALUES ('$name', '$address', '$email', '$pno', '$product')";
    if (mysqli_query($con, $sql)) {
        // Destroy the session
        session_destroy();
        header("Location: Furnitures2.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}

ob_end_flush(); // End output buffering and flush the buffer
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Lanka Order</title>                                                     <!--title for website-->
    <link rel="icon" type="image/x-icon" href="F.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Styles.css">                                <!-- Connecting CSS-->
    <script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>             <!-- Connecting Bootstrap JS-->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">    <!-- Connecting fontawsome-->

    <div class="header">
        <p><b>FurnitureLanka Store</b> Welcome to our online furniture store...</p>     <!-- header-->
    </div>
    <script>
        function goBack() {                                                                     // Go back fuction for go to previos page
            window.location.href = "file:///D:/NIBM/CW/WAD/Furnitures.html";
        }

    </script>
</head>

<body>
    <div class="background-image">
        <img src="BG.jpg">
    </div>
    <nav class="navbar navbar-expand-sm bg-light">                                              <!-- Nav bar-->
        <div class="container-fluid">
            <ul class="navbar-pic">
                <img src="0.png" width="100%">
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#footer">About us</a></li>
                <li class="nav-item"><a class="nav-link" href="https://wa.me/94722714507">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="https://maps.app.goo.gl/5sHYmUQesEMHQfWNA">Store
                        Locator</a></li>
                <li class="nav-item">
                    <div class="buttonDark">                                                        <!-- Dark mood -->
                        <button onclick="DarkMode()"><i class="fa-solid fa-moon fa-xl"></i></button><!-- moon icon for dark mode-->
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
    <center>
        <div class="container" id="c1">                                                         <!-- Containeer for form-->
            <p><i class="fas fa-chair me-3"></i>Furniture Lanka</p>
            <hr>
            <form name="frmstudent" method="post" action="Furnitures2.php">                         <!-- Connecting to PHP-->
                <table>
                    <tr class="tr">
                        <td style="width: 200px;"><label for="name">Name</label></td>
                        <td width="10px"></td>
                        <td style="width: 200px;"><input type="text" id="name" name="txtName" required  value="<?php echo $_COOKIE['uname']; ?>"></td>
                    </tr>
                    <tr class="tr">
                        <td style="width: 200px;"><label for="address">Address</label></td>
                        <td width="10px"></td>
                        <td style="width: 200px;"><input type="text" id="address" name="txtAddress"></td>
                    </tr>
                    <tr class="tr">
                        <td class="width-200"><label for="email">Email</label></td>
                        <td width="10px"></td>
                        <td class="width-300"><input type="text" id="email" name="txtEmail" placeholder="Furniturelanka@gmail.com"></td>
                    </tr>
                    <tr class="tr">
                        <td class="width-200"><label for="Pno">Phone No</label></td>
                        <td width="10px"></td>
                        <td class="width-300"><input type="text" id="Pno" name="txtPno" placeholder="077123456" required></td>
                    </tr>
                    <tr class="tr">
                        <td class="width-200"><label for="Baddress">Billing Address</label></td>
                        <td width="10px"></td>
                        <td class="width-300"><input type="text" id="Baddress" name="txtBaddress"></td>
                    </tr>
                    <tr class="tr">
                        <td class="width-200"><label for="Saddress">Shipping Address</label></td>
                        <td width="10px"></td>
                        <td class="width-300"><input type="text" id="Saddress" name="txtSaddress" required></td>
                    </tr>
                    <tr class="tr">
                        <td class="width-200"><label for="product">Product</label></td>
                        <td width="10px"></td>
                        <td class="width-300">
                            <select id="product" name="txtProduct" required>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="tr">
                        <td class="width-200"><label for="payment">Payment Method</label></td>
                        <td width="10px"></td>
                        <td class="width-300">
                            <input type="radio" id="cod" name="txtPay" value="cash-on-delivery">
                            <label for="cod">Cash on Delivery</label>
                        </td>
                    </tr>
                    <tr class="tr">
                        <td class="width-100"><label for="Lmark">Landmark (Optional)</label></td>
                        <td width="10px"></td>
                        <td class="width-300"><input typy="text" id="Lmark" name="txtLmark" rows="4" cols="40" placeholder="in front of Train Station"></td>
                    </tr>
                    <tr class="tr">
                        <td><button type="button" class="b3" id="b3"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></td>
                        <td></td>
                        <td>
                            <button type="submit" value="submit" class="btn btn-dark" name="btnsubmit" id="b6">Submit</button>
                            <input type="reset" value="reset" class="btn btn-dark" id="b6">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </center>

    <script>
        document.getElementById("b3").addEventListener("click", function () {
        window.location.href = "index.php";
        });
    </script>

    <br><br><br>
    
    <footer>                                                                                            <!-- Footer -->
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
