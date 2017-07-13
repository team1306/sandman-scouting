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
                                    <div class="huge"><?php echo $GLOBALS['text']['matchSheet'];?></div>
                                </div>
                            </div>
                        </div>
                        <a href= "<?php echo $GLOBALS['path']['matchSheet'];?>" >
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
                                    <div class="huge"><?php echo $GLOBALS['text']['pitSheet'];?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $GLOBALS['path']['pitSheet'];?>"> <!--The link didn't work so I fixed it-->
                            <div class="panel-footer">
                                <span class="pull-left">Click Here</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
			</div>
		</div>
		
		<!--New Alliance Code-->
		
		<div class="row" style="padding-top:20px;">
		    <div class="col-sm-12" style="padding-bottom:20px;">
		        <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <a href="egg/egg2.html" style="color:#fff"><i class="fa fa-pencil-square-o fa-5x"></i></a>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $GLOBALS['text']['allianceSheet'];?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $GLOBALS['path']['allianceSheet'];?>">
                            <div class="panel-footer">
                                <span class="pull-left">Click Here</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
		    </div>
		</div>
		
		<!--End New Alliance Code-->
		
		<div class="row">
			<div class="col-sm-6" style="padding-bottom:20px;">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $GLOBALS['text']['reportSheet'];?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $GLOBALS['path']['reportSheet'];?>">
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
                                    <div class="huge"><?php echo $GLOBALS['text']['databaseSheet'];?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $GLOBALS['path']['databaseSheet'];?>">
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
		        echo "<div class='pull-left'>" . $GLOBALS['version'] . "<a href='egg.php'> - </a>" . $GLOBALS['codename'] . "</div><div class='pull-right'>TBA Cache Last Updated: " . getUpdateTime() . "</div>";
		    ?>
		    </div>
        </div>
	</div>
</body>
</html>