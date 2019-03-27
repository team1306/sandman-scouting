<?php include "php/const.php";
      include "php/userCheck.php"; ?>
<nav class="navbar navbar-default" style="margin-bottom:0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $GLOBALS['PATH']['INDEX']; ?>"><?php echo $GLOBALS['APP_INFO']['SHORT_NAME']; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo $GLOBALS['PATH']['INDEX']; ?>">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Scouting <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo $GLOBALS['PATH']['MATCH_SHEET']; ?>"><?php echo $GLOBALS['MODALS']['MATCH_SHEET']; ?></a></li>
            <li><a href="<?php echo $GLOBALS['PATH']['PIT_SHEET']; ?>"><?php echo $GLOBALS['MODALS']['PIT_SHEET']; ?></a></li>
            <li><a href="<?php echo $GLOBALS['PATH']['ALLIANCE_SHEET']; ?>"><?php echo $GLOBALS['MODALS']['ALLIANCE_SHEET']; ?></a></li>
          </ul>
        </li>
        <li><a href="<?php echo $GLOBALS['PATH']['REPORT_SHEET']; ?>"><?php echo $GLOBALS['MODALS']['REPORT_SHEET']; ?></a></li>
        <li><a href="<?php echo $GLOBALS['PATH']['DATABASE_SHEET']; ?>"><?php echo $GLOBALS['MODALS']['DATABASE_SHEET']; ?></a></li>
        <?php
          // Add the admin tab if this user is an admin
          if (checkUserAdmin(false) == 0) {
            echo "<li><a href={$GLOBALS['PATH']['ADMIN']}>{$GLOBALS['MODALS']['ADMIN']}</a></li>";
            echo "<li><a href="/leaderboard"></a></li>"
          }
         ?>
      </ul>
      <ul class="nav navbar-nav navbar-top-links navbar-right">
        <li>
        <?php
            $disabled = "";
            if (checkUser(false) == 0) {
              echo '
                <div style="padding: 5px">
                  <a href="https://slack.com/oauth/authorize?scope=
                    identity.basic,identity.email,identity.team,identity.avatar
                    &client_id=' . $GLOBALS['OAUTH']['CLIENT_ID'] . '
                    &redirect_uri=' . $GLOBALS['OAUTH']['EXTERNAL_URI'] . '">
                      <img alt="Sign in with Slack"
                            height="40"
                            width="172"
                            src="https://platform.slack-edge.com/img/sign_in_with_slack.png"
                            srcset="https://platform.slack-edge.com/img/sign_in_with_slack.png 1x,
                              https://platform.slack-edge.com/img/sign_in_with_slack@2x.png 2x" />
                  </a>
                </div>';
            } else {
              echo '<div style="padding-right: 5px">
                      <div class="btn-group navbar-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black !important">';
              if ($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['slackSignIn']) {
                echo '<img src="' . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['image_24'] . '"> ';
              }
              echo $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['name'] . ' <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">';
                            if ($GLOBALS['ACHIEVEMENTS']['ENABLE']) {
                              echo '<li ' . $disabled . '><a href="/achievement.php?userid=' . $_SESSION['userArray']['id'] . '"><i class="fa fa-star-o" aria-hidden="true"></i> Achievements</a></li>
                              <li role="separator" class="divider"></li>';
                            }
                              echo '
                              <li><a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                            </ul>
                          </div>
                      </div>';
            }
        ?></li>
        <?php
          if (!isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['name'])) {
            echo '<li>
                    <a style="cursor:pointer" data-toggle="modal" data-target="#loginModal">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                  </li>';
          }
          else {
            echo '<li>
                    <a href="' . $GLOBALS['PATH']['SETTINGS'] . '">
                      <i class="fa fa-cog" aria-hidden="true"></i>
                    </a>
                  </li>';
          }
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Login Modal -->
  <div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <form action="login" method="post"> <!-- TODO path costant for login -->
            <input id="userT" class="form-control" type="text" placeholder="Username" name="name" required>
            <br>
            <input id="userT" class="form-control" type="password" placeholder="Password" name="pin" required>
            <br><br>
            <button type="submit" class="btn btn-danger btn-lg" style="display: block; width: 100%;">Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <span class="psw"><a href="createAccount">Create Account</a></span> <!-- TODO use path constant for create account -->
        </div>
      </div>
    </div>
  </div>

<?php include 'php/message.php'; checkMessage(); ?>
