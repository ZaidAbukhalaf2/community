<?php 
include "include/init.php";
include "include/header.php";
include "nav-land-page.php"

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
    <a class="navbar-brand ban" href="landPage.php">
        <img src="land-image/logo.svg" alt="" width="150" height="50">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav justify-content-end" id="navbarCollapse">
           
            <ul class="nav">
           
            <li class="nav-item active item">
            <a  href = "login.php" type="button" class="btn btn-orange">Login</a>
            </li>

            
            
        </ul>
        </div>
    </div>
</nav>
 <div class="wrapper">
    <div class="container home-container ">
        <div class="row cover-img">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="land-image/fablab101.jpg" class="d-block w-100 h-w" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="land-image/fablab2.jpg" class="d-block w-100 h-w" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="land-image/fablab3.jpg" class="d-block w-100 h-w" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <center>
        <div class="row cont-div">
            <div class="">
                <pre >  <p class="pre-com">
WELCOME TO OUR SCHOOL!
Lorem ipsum dolor sit amet consectetur adipisicing elit.
Dolorum repellat dolores recusandae iusto voluptatibus. 
Nemo eveniet dolorum, qui quasi deserunt cupiditate asperiores,
tenetur architecto esse ea aliquam alias aspernatur placeat! </p></pre>
            </div>
         
            <div class=" cont-div2 ">
                <button type="button" class="btn btn-warning p-com-2">Join us!</button>
            </div>
        </div> 
        
    </div>
</div>



<script src="test.js"></script>
    
<?php include "include/footer.php"; ?>