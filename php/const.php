<?php
    $codename = "Slipstream";
    $GLOBALS['codename'] = "Slipstream";
    $version = "4.0.1";        //Version number
    $GLOBALS['version'] = "4.0.1";
    $externalURL = "https://sandman-2017-kir13y.c9users.io";
    $title = "2017 Scouting";
    $red = "Red";
    $blue = "Blue";
    
    $GLOBALS['scoutingTeams'] = array(1259, 1306, 2077, 5148, 5976, 6574);
    
    //Paths and text
    $GLOBALS['path']['index'] = "index";
    $GLOBALS['path']['settings'] = "settings";
    $GLOBALS['path']['admin'] = "admin";
    $GLOBALS['text']['admin'] = "Admin";
    $GLOBALS['path']['matchSheet'] = "gamesheet";
    $GLOBALS['text']['matchSheet'] = "Game Scouting";
    $GLOBALS['path']['pitSheet'] = "pitsheet";
    $GLOBALS['text']['pitSheet'] = "Spotlight Scouting";
    $GLOBALS['path']['allianceSheet'] = "alliancesheet";
    $GLOBALS['text']['allianceSheet'] = "Alliance Scouting";
    $GLOBALS['path']['reportSheet'] = "reportsheet";
    $GLOBALS['text']['reportSheet'] = "Game Report";
    $GLOBALS['path']['databaseSheet'] = "databasesheet";
    $GLOBALS['text']['databaseSheet'] = "DB Management";
    
    $GLOBALS['DB']['serverName'] = "localhost";
    $GLOBALS['DB']['user'] = "data";
    $GLOBALS['DB']['password'] = "mxwZsnKw5FtD8uX8";
    $GLOBALS['DB']['tableName'] = "sandman";
    $DBservername = "localhost";
    $DBuser = "data";
    $DBpassword = "mxwZsnKw5FtD8uX8";
    $DBname = "sandman";
    
    $GLOBALS['DB']['table']['matchscouting'] = "`matchdata`";
    $matchScoutingTable = "matchdata";
    $achievementTable = "`userachievements`";
    $userTable = "`users`";
    $achievementListSQL = "(`id`, `userid`, `username`, `match1`)";
    

    $reportChannel = "#slipstream_data";
    $botName = "Mr. Sandman";

    
    $numTeamsPerMatch = 6;                  //Number of teams in each match
    
    $noUsernameName = "NoLogin";
    
    //TBA CONSTANTS
    $GLOBALS['TBA']['enable'] = true;
    $GLOBALS['TBA']['header'] = 'X-TBA-App-Id: frc1306:scouting:v' . $version;
    $GLOBALS['TBA']['eventCode'] = 'wila';          //Wisc = wimi, LaCrosse = wila
    $GLOBALS['TBA']['year'] = 2017;
    $GLOBALS['TBA']['matchType'] = 'qm';        //qm        f=finals, qf=quarterfinal, qm=qual, sf=semifinal
    $GLOBALS['TBA']['cache']['teams'] = 'cache.json';
    $GLOBALS['TBA']['cache']['matches'] = 'cacheMatch.json';
    $GLOBALS['TBA']['cache']['update'] = 'cacheUpdate.json';
    
    //SLACK BOT CONSTANTS
    $GLOBALS['SlackBot']['enable'] = false;
    $GLOBALS['SlackBot']['slackhook'] = 'https://hooks.slack.com/services/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';
    $GLOBALS['SlackBot']['username'] = 'Mr. Sandman';
    $GLOBALS['SlackBot']['reportchannel'] = '#slipstream_data';
    $GLOBALS['SlackBot']['notifyusers'] = '';
    
    
    $GLOBALS['TBAToSlack']['username'] = 'Announcer McAnnouncerpants';
    $GLOBALS['TBAToSlack']['channel'] = '#testing';
    $GLOBALS['TBAToSlack']['icon'] = ':netscape:';
    $GLOBALS['TBAToSlack']['frcteam'] = 118;
    $GLOBALS['TBAToSlack']['cache'] = 'tbaToSlack.json';
    
    
    //ACHIEVEMENT CONSTANTS
    $achievementEnable = false;
    $GLOBALS['enable']['achievements'] = false;
    $GLOBALS['achievements']['startCol'] = 4;
    $GLOBALS['achievements']['name'] = array("Thats how you do it");
    $GLOBALS['achievements']['desc'] = array("Submit your first sheet");
    
    $achievementStartCol = 4;
    
    $achievementNumMatch1 = 1;
    $achievementName = array("Thats how you do it");
    $achievementDesc = array("Submit your first sheet");
?>