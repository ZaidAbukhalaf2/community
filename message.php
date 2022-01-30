<?php
include "include/init.php";
include "include/header.php";
include "models/user.php";
include "include/nav.php";
include "Chat.php";

$chat = new Chat();
?>



    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-4  bg-white ">
                    <?php if(isset($_SESSION['user_id'] ) && $_SESSION['user_id'] ) {
                                        // echo $_SESSION['user_id']; 
                                        $name=$chat->updateUserOnline($_SESSION['user_id'], 'online');
                                        $lastInsertId = $chat->insertUserLoginDetails($_SESSION['user_id']);
                                        $_SESSION['login_details_id'] = $lastInsertId;
                                                            ?> 	
                <div class=" row  padding-sm  " id="profile" >
                            

                                <?php
                                    $loggedUser = $chat->getUserDetails($_SESSION['user_id'] );
                                    echo '<div class="wrap border-bottom">';
                                    $currentSession = '';
                                    foreach ($loggedUser as $user) {
                                        $currentSession = $user['current_session'];
                                        echo '<img id="profile-img" src="image/'.$user['img'].'" class="online" alt="" width=25px height=27px />';
                                        echo  '<span>'.$user['username'].'</span>';
                                        
                                    }
                                        echo '</div>';
                                ?>

                                
                        <!-- </div> -->
                    <div class="navbar-expand-sm navbar-dark   ">
                        <button class="navbar-toggler "id="users" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <div class="contacts " >	
                            
                                        <?php
                                        echo '<ul>';
                                        $chatUsers = $chat->chatUsers($_SESSION['user_id'] );
                                        foreach ($chatUsers as $user) {
                                            $status = 'offline';						
                                            if($user['status']) {
                                                $status = 'online';
                                            }
                                            $activeUser = '';
                                            if($user['id'] == $currentSession) {
                                                $activeUser = "active";
                                            }
                                            echo '<li id="'.$user['id'].'" class="contact '.$activeUser.'" data-touserid="'.$user['id'].'" data-tousername="'.$user['username'].'">';
                                            echo '<div class="wrap-2" id="aa">';
                                            echo '<span id="status_'.$user['id'].'" class="contact-status '.$status.'"></span>';
                                            echo '<img src="image/'.$user['img'].'" alt="" width=20px height=20px/>';
                                            echo '<div class="meta">';
                                            echo '<span class="name">'.$user['username'].'<span id="unread_'.$user['id'].'" class="unread">'.$chat->getUnreadMessageCount($user['id'], $_SESSION['user_id']).'</span></span>';
                                            echo '<span class="preview"><span id="isTyping_'.$user['id'].'" class="isTyping"></span></span>';
                                            echo '</div>';
                                            echo '</div>';
                                            // echo '<hr>';




                                            echo '</li>'; 
                                        }
                                        echo '</ul>';
                                        ?>
                            </div>
                        </div>
                    </div>
                                    
                </div>
                    
                        
                                
                
                <!-- =============================================================== -->
                <!-- member list -->
                
            </div>

            
            <!--=========================================================-->
            <!-- selected chat -->
                <div class="col-md-8 bg-white " id="chat">
                                        <div class="contact-profile" id="userSection" >	
                                                <?php
                                                $userDetails = $chat->getUserDetails($currentSession);
                                                foreach ($userDetails as $user) {	
                                                    echo '<img src="image'.$user['img'].'" alt="." />';
                                                    echo '<span>'.$user['username'].'</span>';
                                                        // echo '<div class="social-media">';
                                                            // echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
                                                            // echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
                                                            // echo '<i class="fa fa-github " aria-hidden="true"></i>';
                                                        // echo '</div>';
                                                        echo '<hr>';

                                                }	
                                                ?>
                                        </div>
                            
                        <div class="chat-message">
                            <div class="chat-history">
                                        <div class="messages" id="conversation">		
                                            <?php
                                            echo $chat->getUserChat($_SESSION['user_id'] , $currentSession);						
                                            ?>
                                        </div>
                            </div>
                        </div>
                        <div class="chat-box bg-white">
                            <div class=" message-input" id="replyContainer">
                            
                                <input class="form-control border no-shadow no-rounded"id="chatMessage<?php echo $currentSession; ?>" placeholder="Type your message here">
                                <span class="input-group-btn">
                                    <button class="submit chatButton"id="chatButton<?php echo $currentSession; ?>" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                </span>
                            
                            </div><!-- /input-group -->	
                        </div> 
                </div> 
                <?php } else { ?>
                                                            <?php 

                                // if(!$session->is_signed_in()){ redirect("login.php");}

                                ?>		
                        <?php } ?>           
            </div>        
        </div>
    </div>


    <!-------------------------------------------end--------------------------------------------------------- -->
<?php include('include/footer.php');?>