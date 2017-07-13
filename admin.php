<?php include 'global.php';?>
</head>
<body>
	<?php include 'nav.php'; 
	      include 'php/debug.php'; 
          include 'TBAdata.php';
          include 'error.php';?>
	<br>
	<div class="container">
    	<div class="media">
          <div class="media-left">
            <img src="<?php echo $_SESSION['userArray']['image_32']; ?>" class="media-object">
          </div>
          <div class="media-body">
            <h2 class="media-heading"><?php echo $_SESSION['userArray']['name'];?></h2>
          </div>
        </div>
        <br>
        <div class="container">
            <form action="post">
            <div class="row">
                <div class="col-sm-6">
                    <label>Match Type:</label>
                    <select name="matchType">
                        <option value="qm">Qualification</option>
                        <option value="sf">Semifinals</option>
                        <option value="qf">Quarterfinals</option>
                        <option value="f">Finals</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-danger btn-lg" style="display: block; width: 100%;" value="match">Update Match Type</button>
                </div>
            </div>
            </form>
            <div class="row">
                <div class="col-sm-6">
                    TBA cache last updated:
                    <?php echo getUpdateTime(); ?>
                </div>
                <div class="col-sm-6">
                    <a href="refreshTBACache.php"><button type="button" class="btn btn-danger btn-lg" style="display: block; width: 100%;" value="refresh">Refresh TBA Cache</button></a>
                </div>
            </div>
            <form action="searchValidity.php">
            <div class="row">
                <div class="col-sm-3">
                    <label>Match #:</label>
                    <input type="text" name="matchnum">
                </div>
                <div class="col-sm-3">
                    <label>Set #:</label>
                    <select name="set">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-danger btn-lg" style="display: block; width: 100%;" value="matchNum","set">Validate Match Data</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>