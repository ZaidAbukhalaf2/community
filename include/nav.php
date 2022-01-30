<?php 

if(!$session->is_signed_in()){ redirect("login.php");}
?>

<?php

$id_sss=$_SESSION['user_id'];

$amin=User::find_by_id($id_sss);


?>
<nav class="navbar navbar-expand-lg fixed-top  navbar-dark bg-dark">
  <div class="container-fluid" id="#bar>#con">
<a href="index.php">
  <img src="image/logoorange.jpg" alt=""  class="d-inline-block align-text-top logo-img"></a>
   
      <form class="d-flex">
        <input id="search" class="form-control me-2" placeholder="Search" name="valueToSearch">
        <button id="search2" class="btn btn-orange" type="submit" name="search" value="search" ><i class="fas fa-search"></i></button>
      </form>
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="space">
        
    <div class="collapse navbar-collapse" id="navbarScroll">
        
       <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" id="ul1" >
              <li class="nav-item" id="list">
                <a class="nav-link active" aria-current="page" href="CommuintyIndex.php">
                <i class="fas fa-users" id="font"></i>
                <span class="word-color">Community</span>
                          </a>
              </li>
              <li class="nav-item" id="list">
                <a class="nav-link active" href="message.php">
                <i class="fas fa-comment-dots"id="font" ></i>
                <span class="word-color"> Message </span>
                        </a>
              </li>
              
                <li class="nav-item" id="list">
                 <a class="nav-link active" href="JobPage.php">
                    <i class="fas fa-briefcase" id="font"></i>
                    <span class="word-color">Jobs</span>
                 </a>
               </li>
              
               <li class="nav-item "id="list">
                 <div class="dropdown">
                            <a style="color: white;" class="dropdown-toggle" href="#" id="navbarScrollingDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell" id="font" ></i>  
                            Notification
                            </a>
                          <ul class="dropdown-menu" id="drop" aria-labelledby="navbarScrollingDropdown">
                                <li>
                                  <a class="dropdown-item" href="notification.php">
                                  <i class="far fa-thumbs-up"></i>
                                <span>Notification_Like</span>
                                </a>
                              </li>
                              <li><hr class="dropdown-divider"></li>
                              <li>
                                <a class="dropdown-item" href="notif.php">
                                <i class="far fa-comment-alt"></i>
                              <span>notification_Comment</span>
                              </a>
                            </li>
                          </ul>
                      </li>
                    
                      <li class="nav-item dropdown" id="list">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo $amin->image_path_placeholder();?>"  class="user_img2"> 
                            Me
                            </a>
                          <ul class="dropdown-menu" id="drop" aria-labelledby="navbarScrollingDropdown">
                                <li>
                                  <a class="dropdown-item" href="profile.php">
                                <i class="fas fa-user"></i>
                                <span>Profile</span>
                                </a>
                              </li>
                              <li><hr class="dropdown-divider"></li>
                              <li>
                                <a class="dropdown-item" href="logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                              <span>Logout</span>
                              </a>
                            </li>
                          </ul>
                      </li>
      </ul>
</div>
    </div>
</div>
  </div>
</nav>
