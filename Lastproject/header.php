<?php 

// Start the session
session_start();
?>

<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Home</a>
        </div>
        
       

      <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right">

             <?php if($_SESSION['logedin']){ ?>

             <li <?php echo ($basefile == 'reg' ? 'class="active"' : ''); ?>><a href="profile.php">Profile</a></li> 
             <li><a href="index.php?logout=true">Logout</a></li>

            <?php } else { ?>

            <li <?php echo ($basefile == 'login' ? 'class="active"' : ''); ?>><a href="login.php">Login</a></li>
            <li <?php echo ($basefile == 'reg' ? 'class="active"' : ''); ?>><a href="reg.php">Registration</a></li>

            <?php }; ?>

          </ul>
        </div> <!--/.nav-collapse -->
        
        

      </div>
    </nav>