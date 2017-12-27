<?php include 'global.php'; ?>
</head>

<body>
	<?php
	    include 'nav.php';
	?>
	<img src="img/logo.png" style="display: block; margin-left: auto; margin-right: auto; align:center; width:70%; padding-top: 5%; max-width:600px;">
	<div class="container">
		<div class="row" style="padding-top:20px;">
				<div class="col-sm-6" style="padding-bottom:20px;">
		        <div class="panel panel-red">
		            <div class="panel-heading">
		                <div class="row">
		                    <div class="col-xs-3">
		                        <i class="fa fa-pencil-square-o fa-5x"></i>
		                    </div>
		                    <div class="col-xs-9 text-right">
		                        <div class="huge"><?php echo $GLOBALS['MODALS']['MATCH_SHEET'];?></div>
		                    </div>
		                </div>
		            </div>
		            <a href= "<?php echo $GLOBALS['PATH']['MATCH_SHEET'];?>" >
		                <div class="panel-footer">
		                    <span class="pull-left">Click Here</span>
		                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                    <div class="clearfix"></div>
		                </div>
		            </a>
		        </div>
				</div>
				<div class="col-sm-6" style="padding-bottom:20px;">
		        <div class="panel panel-red">
		            <div class="panel-heading">
		                <div class="row">
		                    <div class="col-xs-3">
		                        <i class="fa fa-pencil-square-o fa-5x"></i>
		                    </div>
		                    <div class="col-xs-9 text-right">
		                        <div class="huge"><?php echo $GLOBALS['MODALS']['PIT_SHEET'];?></div>
		                    </div>
		                </div>
		            </div>
		            <a href="<?php echo $GLOBALS['PATH']['PIT_SHEET'];?>"> 
		                <div class="panel-footer">
		                    <span class="pull-left">Click Here</span>
		                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                    <div class="clearfix"></div>
		                </div>
		          	</a>
		        </div>
				</div>
		</div>
		<div class="row" style="padding-top:20px;">
		    <div class="col-sm-12" style="padding-bottom:20px;">
		        <div class="panel panel-red">
		            <div class="panel-heading">
		                <div class="row">
		                    <div class="col-xs-3">
		                        <a href="egg/egg2.html" style="color:#fff"><i class="fa fa-pencil-square-o fa-5x"></i></a>
		                    </div>
		                    <div class="col-xs-9 text-right">
		                        <div class="huge"><?php echo $GLOBALS['MODALS']['ALLIANCE_SHEET'];?></div>
		                    </div>
		                </div>
		            </div>
		            <a href="<?php echo $GLOBALS['PATH']['ALLIANCE_SHEET'];?>">
		                <div class="panel-footer">
		                    <span class="pull-left">Click Here</span>
		                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                    <div class="clearfix"></div>
		                </div>
		            </a>
		        </div>
		    </div>
		</div>
		<div class="row">
			<div class="col-sm-6" style="padding-bottom:20px;">
		      <div class="panel panel-red">
		          <div class="panel-heading">
		              <div class="row">
		                  <div class="col-xs-3">
		                      <i class="fa fa-file-text-o fa-5x"></i>
		                  </div>
		                  <div class="col-xs-9 text-right">
		                      <div class="huge"><?php echo $GLOBALS['MODALS']['REPORT_SHEET'];?></div>
		                  </div>
		              </div>
		          </div>
		          <a href="<?php echo $GLOBALS['PATH']['REPORT_SHEET'];?>">
		              <div class="panel-footer">
		                  <span class="pull-left">Click Here</span>
		                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                  <div class="clearfix"></div>
		              </div>
		          </a>
		      </div>
			</div>
			<div class="col-sm-6" style="padding-bottom:20px;">
		      <div class="panel panel-red">
		          <div class="panel-heading">
		              <div class="row">
		                  <div class="col-xs-3">
		                      <i class="fa fa-file-text-o fa-5x"></i>
		                  </div>
		                  <div class="col-xs-9 text-right">
		                      <div class="huge"><?php echo $GLOBALS['MODALS']['DATABASE_SHEET'];?></div>
		                  </div>
		              </div>
		          </div>
		          <a href="<?php echo $GLOBALS['PATH']['DATABASE_SHEET'];?>">
		              <div class="panel-footer">
		                  <span class="pull-left">Click Here</span>
		                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                  <div class="clearfix"></div>
		              </div>
		          </a>
		      </div>
			</div>
		</div>
		<div class="well" style="padding-top:20px;">
      <div style="overflow: hidden;">
		    <?php
		        include 'TBAdata.php';
		        echo "<div class='pull-left'>" . $GLOBALS['APP_INFO']['VERSION'] . "<a href='egg.php'> - </a>" . $GLOBALS['APP_INFO']['CODENAME'] . "</div><div class='pull-right'>TBA Cache Last Updated: " . getUpdateTime() . "</div>";
		    ?>
		   </div>
    </div>
	</div>
</body>
</html>
