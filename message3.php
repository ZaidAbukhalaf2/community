<?php
include "include/init.php";
include "include/header.php";
include "include/nav.php";


?>



<div class="main-container">
    <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']) { ?> 
    <div class="wrapper">
    <?php
					
					$loggedUser = $chat->getUserDetails($_SESSION['user_id']);
					// echo '<div class="wrap">';
					$currentSession = '';
					foreach ($loggedUser as $user) {
						$currentSession = $user['current_session'];
						// echo '<img id="profile-img" src="img/'.$user['image'].'" class="online" alt="" />';
						// echo  '<p>'.$user['username'].'</p>';
						// 	echo '<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>';
							// echo '<div id="status-options">';
							// echo '<ul>';
							// 	echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>';
							// 	echo '<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>';
							// 	echo '<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>';
							// 	echo '<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>';
							// echo '</ul>';
							// echo '</div>';
							// echo '<div id="expanded">';			
							// echo '<a href="logout.php">Logout</a>';
							// echo '</div>';
					}
					// echo '</div>';
					?>
					</div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="car chat-app">
                    <div id="contacts" class="people-list">
                        <!------------------------------------old message--------------------------------------------->
                        <?php
					echo '<ul>';
					$chatUsers = $chat->chatUsers($_SESSION['user_id']);
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
						echo '<div class="wrap">';
						echo '<span id="status_'.$user['id'].'" class="contact-status '.$status.'"></span>';
						echo '<img src="userpics/'.$user['image'].'" alt="" />';
						echo '<div class="meta">';
						echo '<p class="name">'.$user['username'].'<span id="unread_'.$user['id'].'" class="unread">'.$chat->getUnreadMessageCount($user['id'], $_SESSION['id']).'</span></p>';
						echo '<p class="preview"><span id="isTyping_'.$user['id'].'" class="isTyping"></span></p>';
						echo '</div>';
						echo '</div>';
						echo '</li>'; 
					}
					echo '</ul>';
					?>
                    </div>

                    <div class="chat">
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <?php
                                        $userDetails = $chat->getUserDetails($currentSession);
                                        foreach ($userDetails as $user) {										
                                            echo '<img src="userpics/'.$user['image'].'" alt="" />';
                                                echo '<p>'.$user['username'].'</p>';
                                                echo '<div class="social-media">';
                                                    echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
                                                    echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
                                                    echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
                                                echo '</div>';
                                        }	
                                        ?>
                                    
                                </div>
                            </div>
                        </div>
                        <!----------------------------------------------------chat space--------------------------------------------->
                        <div class="chat-history">
                            <?php
                                echo $chat->getUserChat($_SESSION['id'], $currentSession);						
                            ?> 
                        </div>
                        <!---------------------box to write you'r message and uplode photo----------------------------->
                            <div class="chat-message clearfix">
                                    <div class="input-group mb-0">
                                        <input type="text" class="form-control"id="chatMessage<?php echo $currentSession; ?>" placeholder="Enter text here...">
                                        <label for="file-upload" class="custom-file-upload">
                                        <a  class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                        </label>
                                        <input id="file-upload" type="file"/>
                                        <button type="button" class="btn btn-secondary"id="chatButton<?php echo $currentSession; ?>">Send</button>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>


<!-------------------------------------------end--------------------------------------------------------- -->
<?php include('include/footer.php');?>