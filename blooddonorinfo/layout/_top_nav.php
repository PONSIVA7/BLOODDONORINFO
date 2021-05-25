 <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Blood Bank</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
             <li class="<?php
                        if (isset($setUserGuideActive)) {
                            echo $setUserGuideActive;
                        } else {
                            echo '';
                        }
                        ?>"><a href="index.php">User Guide</a></li>
                        <li class="<?php
                        if (isset($setMembershipActive)) {
                            echo $setMembershipActive;
                        } else {
                            echo '';
                        }
                        ?>"><a href="users/home.php">Membership</a></li>
                        
                        <li class="<?php if(isset($setJoinDonorsActive)) { echo $setJoinDonorsActive; } else { echo ''; } ?>">
                            <a href="donors.php">Join Donors</a>
                        </li>
                        <li class="<?php if(isset($setJoinBloodRequestActive)) { echo $setJoinBloodRequestActive; } else { echo ''; } ?>">
                            <a href="bloodrequest.php">Blood Request</a>
                        </li>
                        <li class="<?php if(isset($setCampDateActive)) { echo $setCampDateActive; } else { echo ''; } ?>">
                            <a href="news.php">Camp Date</a>
                        </li>
                        <li class="<?php if(isset($setJoinEmployeeLoginActive)) { echo $setJoinEmployeeLoginActive; } else { echo ''; } ?>">
                            <a href="employee/index.php">Employee Login</a>
                        </li>
                        <li class="<?php if(isset($setJoinBloodRequestActive)) { echo $setJoinBloodRequestActive; } else { echo ''; } ?>">
                            <a href="admin/index.php">Admin</a>
                        </li>
          </ul>
        </div>
      </div>
    </nav>
	</br></br>