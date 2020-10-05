
<hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 ta-c">
                    <p style="text-align:center;opacity:0.2">Copyright &copy; Thomas Fahey 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>
<script>
    
    function timeSince(date) {
  var seconds = Math.floor((new Date() - date) / 1000);

  var interval = seconds / 31536000;

  if (interval > 1) {
    return Math.floor(interval) + " years ago";
  }
  interval = seconds / 2592000;
  if (interval > 1) {
    return Math.floor(interval) + " months ago";
  }
  interval = seconds / 86400;
  if (interval > 1) {
    return Math.floor(interval) + " days ago";
  }
  interval = seconds / 3600;
  if (interval > 1) {
    return Math.floor(interval) + " hours ago";
  }
  interval = seconds / 60;
  if (interval > 1) {
    return Math.floor(interval) + " minutes ago";
  }
  return Math.floor(seconds) + " seconds ago";
}
    var x = document.getElementsByClassName("dater");
    var i;
    for (i = 0; i < x.length; i++) {
    var jsdate = new Date(x[i].id); 
    jsdate = timeSince(jsdate);
    x[i].innerHTML = jsdate;
    }
</script>
    </div>
<div class="bottom-navbar" style="width:100%;text-align:center;position:fixed;bottom:0;background-color:rgba(09,58,57,1);padding-top:0;padding-bottom:0;z-index:200;">
            <a href="index.php" style="width:20%;text-align:center;float:left;padding:18px;">
                <span class="glyphicon glyphicon-home"></span>
            </a>
            <a href="search.php" style="width:20%;text-align:center;float:left;padding:18px;">
                <span class="glyphicon glyphicon-search"></span>
            </a>
            <a href="camera.php" style="width:20%;text-align:center;float:left;padding:18px;">
               <span class="glyphicon glyphicon-camera"></span>
            </a>
            <a href="camera.php" style="width:20%;text-align:center;float:left;padding:18px;">
               <span class="glyphicon glyphicon-heart"></span>
            </a>
    <?php if(isset($_SESSION['image'])) {
    ?>
    <a href="admin/index.php" style="width:20%;text-align:center;float:left;background-color:transparent;padding-top:13px;">
               <span style="display:inline-block;border-radius:50%;border:1px solid white;"><img src="images/profile.jpg" style="width:30px;border-radius:50%;border:1px solid black;"></span><br>
        <span style="display:inline-block;position:fixed;width:5px;height:5px;border-radius:50%;background-color:red;margin:0 2px -35px -2px;padding:0;"></span>
            </a>
    <?php
} ?>
            
</div> 
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
