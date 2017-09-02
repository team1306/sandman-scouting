<?php
    $GLOBALS['APP_INFO']['CODENAME']      = "Slipstream";
    $GLOBALS['APP_INFO']['VERSION']       = "4.0.1";
    $GLOBALS['APP_INFO']['EXTERNAL_URL']  = "https://samr.mynetgear.com";
    $GLOBALS['OAUTH']['URI']              = "/oauthAut.php";
    $GLOBALS['APP_INFO']['TITLE']         = "2017 Scouting";
    $GLOBALS['MODALS']['RED']             = "Red";
    $GLOBALS['MODALS']['BLUE']            = "Blue";
    $GLOBALS['MODALS']['TEAMS_PER_MATCH'] = 6;
    $GLOBALS['MODALS']['NO_LOGIN_NAME']   = "NoLogin";

    $GLOBALS['scoutingTeams'] = array(1259, 1306, 2077, 5148, 5976, 6574);

    //Paths and text
    $GLOBALS['PATH']['INDEX']             = "index";
    $GLOBALS['PATH']['SETTINGS']          = "settings";
    $GLOBALS['PATH']['ADMIN']             = "admin";
    $GLOBALS['MODALS']['ADMIN']           = "Admin";
    $GLOBALS['PATH']['MATCH_SHEET']       = "gamesheet";
    $GLOBALS['MODALS']['MATCH_SHEET']     = "Game Scouting";
    $GLOBALS['PATH']['PIT_SHEET']         = "pitsheet";
    $GLOBALS['MODALS']['PIT_SHEET']       = "Spotlight Scouting";
    $GLOBALS['PATH']['ALLIANCE_SHEET']    = "alliancesheet";
    $GLOBALS['MODALS']['ALLIANCE_SHEET']  = "Alliance Scouting";
    $GLOBALS['PATH']['REPORT_SHEET']      = "reportsheet";
    $GLOBALS['MODALS']['REPORT_SHEET']    = "Game Report";
    $GLOBALS['PATH']['DATABASE_SHEET']    = "databasesheet";
    $GLOBALS['MODALS']['DATABASE_SHEET']  = "DB Management";

    $GLOBALS['DB']['HOST'] = "localhost";
    $GLOBALS['DB']['USER'] = "data";
    $GLOBALS['DB']['PW']   = "mxwZsnKw5FtD8uX8";
    $GLOBALS['DB']['DATA'] = "sandman";

    $GLOBALS['DB']['TABLE']['MATCH_SCOUTING'] = "`matchdata`";
    $GLOBALS['DB']['TABLE']['ACHIEVEMENT']    = "`userachievements`";
    $GLOBALS['DB']['TABLE']['USER']           = "`users`";

    //TBA CONSTANTS
    $GLOBALS['TBA']['ENABLE']                   = true; //TODO use this
    $GLOBALS['TBA']['HEADER']                   = 'X-TBA-App-Id: frc1306:scouting:v' . $GLOBALS['APP_INFO']['VERSION'];
    //TODO make event code entered in admin page
    $GLOBALS['TBA']['EVENT_CODE']               = 'wila';          //Wisc = wimi, LaCrosse = wila
    $GLOBALS['TBA']['YEAR']                     = 2017;
    $GLOBALS['TBA']['MATCH_TYPE']               = 'qm';        //qm        f=finals, qf=quarterfinal, qm=qual, sf=semifinal
    $GLOBALS['TBA']['PATH']['CACHE']['TEAMS']   = 'cache.json';
    $GLOBALS['TBA']['PATH']['CACHE']['MATCHES'] = 'cacheMatch.json';
    $GLOBALS['TBA']['PATH']['CACHE']['UPDATE']  = 'cacheUpdate.json';

    //SLACK BOT CONSTANTS
    $GLOBALS['SLACK_BOT']['ENABLE']         = false;
    $GLOBALS['SLACK_BOT']['SLACK_HOOK']     = 'https://hooks.slack.com/services/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';
    $GLOBALS['SLACK_BOT']['NAME']           = 'Mr. Sandman';
    $GLOBALS['SLACK_BOT']['REPORT_CHANNEL'] = '#slipstream_data';
    $GLOBALS['SLACK_BOT']['NOTIFY_USERS']   = '';

    //ACHIEVEMENT CONSTANTS
    $GLOBALS['ACHIEVEMENTS']['ENABLE'] = false;
    $GLOBALS['ACHIEVEMENTS']['ENABLE'] = false;
    $GLOBALS['ACHIEVEMENTS']['START_COL'] = 4;
    $GLOBALS['ACHIEVEMENTS']['NAME'] = array("Thats how you do it");
    $GLOBALS['ACHIEVEMENTS']['DESC'] = array("Submit your first sheet");

    //TODO remove these when achievements are fixed
    $achievementNumMatch1 = 1;
    $achievementName = array("Thats how you do it");
    $achievementDesc = array("Submit your first sheet");
?>
