<?php 
include "includes/db.php";
include "includes/header.php";
check_notification();
if(!isset($_SESSION['role'])) {
   
        header("Location: login.php");
    
}
?>
    <!-- Page Content -->
    <div class="container" style="padding:0 15px;height:100%;width:100%;overflow-x:hidden;background-color:white;">
        <div class="row">
            <div class="col-md-8" style="padding:0;">
                <div class="post" style="margin-bottom:5px;margin-top:8px;position:fixed;top:0;">
                    <div class="container">
                        <div class="row" style="text-align:center;align-items:center;">
                            <span style="float:left;padding:5px 10px;"><a href="index.php"><span style="font-size:14pt;"class="glyphicon glyphicon-arrow-left"></span></a></span>
                            <span style="position:fixed;left: 50%;font-family: 'Parisienne', cursive;font-size:18pt;
    transform: translate(-50%, 0);padding:8px 10px 2px 10px;margin-top:-5px;font-weight:bold;font-size:16pt;">Notifications</span>
                        </div>
                    </div>
                </div>
                        <hr style="margin:0;">
                <?php
                 if(isset($_SESSION['id'])) {
                        $sessionid = $_SESSION['id'];
                    $query = "SELECT * FROM notifications WHERE note_to_user_id = '{$sessionid}' ORDER BY note_id DESC";
                    $select_all_notifications_query = mysqli_query($connection, $query);
                    $countnotifications = 0;
                    while($row = mysqli_fetch_assoc($select_all_notifications_query)) {
                        $note_id = escape($row['note_id']);
                        $note_to_user_id = escape($row['note_to_user_id']);
                        $note_from_user_id = escape($row['note_from_user_id']);
                        $note_content = escape($row['note_content']);
                        $note_content_id = escape($row['note_content_id']);
                        $note_status = escape($row['note_status']);
                     if($note_from_user_id !== $sessionid) {
                        if($note_status == "Unchecked") {
                    ?>
                <!-- First Blog Post -->
                <div class="post">
                    <div class="container">
                <?php

                $query_user = "SELECT * FROM users WHERE user_id = {$note_from_user_id}";                     
                
                $select_user_query = mysqli_query($connection, $query_user);
                while($row = mysqli_fetch_assoc($select_user_query)) {
                $user_id = escape($row['user_id']);
                $username = escape($row['username']);
                $image = escape($row['user_image']);
                   
                ?>    
                            <div class="row" style="padding:8px; border-bottom:1px solid lightgrey;">
                            <div class="w-10" style="width:10%;float:left;">
                                <img src="images/<?php echo $image; ?>" style="width:100%;border-radius:50%;">
                            </div>
                            <div class="w-75" style="width:75%;float:left;padding:5px;">
                                <span class="username"><a style="color:black;" href="profile.php?id=<?php echo $user_id ?>">
                               
                                    
                                <b><?php echo $username; ?>  </b>  </a>
                                    <?php if($note_content != "liked your post") {
                                    ?> commented: <?php
                                    } ?>
                                    </span><span style="font-size:10pt;"><?php echo $note_content; ?> <span><a href="post.php?id=<?php echo $note_content_id; ?>"  style="font-size:8px;color:grey;color:#337ab7;">See more...</a></span> </span><br>
                            </div>
                            <div class="w-10" style="width:10%;float:left;padding:5px 8px 5px 0;">
                                <a class="btn btn-info" href="notifications.php?check=<?php echo $note_id; ?>" style="padding:2px 5px;" >Check</a>
                            </div>
                            </div>
                           <?php } ?>
                
                </div>
            <?php } else if($note_status == "Checked" && $countnotifications < 5 ) {
                    ?>
                <!-- First Blog Post -->
                <div class="post">
                    <div class="container">
                <?php

                $query_user = "SELECT * FROM users WHERE user_id = {$note_from_user_id}";                     
                
                $select_user_query = mysqli_query($connection, $query_user);
                while($row = mysqli_fetch_assoc($select_user_query)) {
                $user_id = escape($row['user_id']);
                $username = escape($row['username']);
                $image = escape($row['user_image']);
                   
                ?>    
                            <div class="row" style="padding:8px; border-bottom:1px solid lightgrey;">
                            <div class="w-10" style="width:10%;float:left;">
                                <img src="images/<?php echo $image; ?>" style="width:100%;border-radius:50%;">
                            </div>
                            <div class="w-75" style="width:75%;float:left;padding:5px;">
                                <span class="username"><a style="color:black;" href="profile.php?id=<?php echo $user_id ?>">
                               
                                    
                                <b><?php echo $username; ?>  </b>  </a> <?php if($note_content != "liked your post") {
                                    ?> commented: <?php
                                    } ?><br></span><span style="font-size:10pt;"><?php echo $note_content; ?> <span><a href="post.php?id=<?php echo $note_content_id; ?>" style="font-size:8px;color:grey;color:#337ab7;">See more...</a></span> </span><br>
                            </div>
                            <div class="w-10" style="width:10%;float:left;padding:5px 8px 5px 0;">
                                <div class="btn btn-default" style="padding:2px 5px;" >Seen</div>
                            </div>
                            </div>
                       
                           <?php  $countnotifications++; } ?>
                
                </div>
            <?php } } } ?> 

                

            </div>

          

<?php    }  
include "includes/sidebar.php"; 
?>
        </div>
<?php      
include "includes/footer.php"; 
?>   
  