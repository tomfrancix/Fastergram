<!--                        COMMENT-->
<a href="?source=view_your_comments">View your comments</a>
                         <?php
                    
                     $sessionid = $_SESSION['id'];
                    $querytwo = "SELECT * FROM comments WHERE comment_to_user = {$sessionid} ";
                    $select_all_comments_query = mysqli_query($connection, $querytwo);
                   
                    while($row = mysqli_fetch_assoc($select_all_comments_query)) {
                        $comment_id = escape($row['comment_id']);
                        $comment_content_id = escape($row['comment_content_id']);
                        $comment_text = escape($row['comment_text']);
                        $comment_user_id = escape($row['comment_user_id']);
                        $comment_reply_user_id = escape($row['comment_reply_user_id']);
                        $comment_reply_id = escape($row['comment_reply_user_id']);
                        
                      
//                    $contentquery = "SELECT * FROM content WHERE hash_id = {$content_hash_id} ";
//                    $select_all_hashcontent_query = mysqli_query($connection, $hashquery);
//                    $hash_title = "";
//                    while($row = mysqli_fetch_assoc($select_all_hashcontent_query)) {
//                        $hash_title = $row['hash_title'];
//                        
//                    }
                        
                    ?>
                       <hr style="margin:5px 0;">
                        <div class="row" style="padding:5px;padding-bottom:0;">
                            <div class="container" style="padding:0;">
                            <div class="w-20" style="width:40px;float:left;">
                                <img src="../images/profile.JPG" style="width:100%;border-radius:50%;">
                            </div>
                            <div class="w-80" style="width:85%;float:left;padding:5px;">
                                <span class="username"><a style="color:black;" href="user.php?id=<?php echo $user_id ?>"><b>redfoxcareer</b> </a></span><span style="font-size:10pt;"><?php echo $comment_text; ?> </span><br>
                                <span style="color:grey;font-size:7pt;">11 hours ago</span> | 
                                <span class="hashtag" style="font-size:8pt;"><a href="#">5 likes</a></span> | 
                                <span class="hashtag" style="font-size:8pt;"><a href="#">Reply</a></span> | 
                                <span class="hashtag" style="font-size:8pt;"><a href="#"><span style="color:grey;" class="glyphicon glyphicon-heart"></span></a></span>
                            </div>
                            </div>
                            
                        </div>
                        
                        
                            
                       <?php } ?>