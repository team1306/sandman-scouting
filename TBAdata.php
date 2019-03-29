<?php
if(!isset($_SESSION)) {
  session_start();
}
include "php/debug.php";
include "php/const.php";
include "php/dbDataConn.php";

// $TBAdata = new TBAdata;
// $TBAdata->updateData();
// echo $TBAdata->getTeam('f', 1, 1, 'blue', 0);
// echo $TBAdata->getUpdateTime() . "<hr>";

class TBAdata {
    private static $updateTime;
    private static $teams;
    // private static $matches;
    private static $eventCode;
    private static $compLevel;
    function updateData() {
        $headerOptions = array(
          'http'=>array(
            'method'=>"GET",
            'header'=>$GLOBALS['TBA']['HEADER'] . "\r\n"
          )
        );
        $headerData = stream_context_create($headerOptions);

        $json = file_get_contents('https://www.thebluealliance.com/api/v3/event/' . $GLOBALS['TBA']['YEAR'] . $GLOBALS['TBA']['EVENT_CODE'] . '/matches/simple', false, $headerData);

        $TBAdataArray = json_decode($json, true);

        TBAdata::$updateTime = $http_response_header[1];

        if ($GLOBALS['TBA']['debug']['all']) {
            echo "Update time from header: " . $http_response_header[1] . "<br>";
            echo "Update time saved: " . self::$updateTime . "<br><br>";
        }

        foreach ($TBAdataArray as $key => $value) {
            if ($GLOBALS['TBA']['debug']['match']) {
                echo "{$key} => {$value} <br>";
                echo "------------------<br>[";
                echo "Comp Lvl: " . $value['comp_level'] . " | Match Num: " . $value['match_number'] . " | Set Num:" . $value['set_number'] . "]";
                echo var_dump($value['alliances']['blue']['team_keys']);
                echo var_dump($value['alliances']['red']['team_keys']);
                echo "<br>----------------------------------------<br><br>";
            }
            // Team data mapping
            self::$teams[$value['comp_level']][$value['set_number']][$value['match_number']]['red'] = str_replace('frc','',$value['alliances']['red']['team_keys']);
            self::$teams[$value['comp_level']][$value['set_number']][$value['match_number']]['blue'] = str_replace('frc','',$value['alliances']['blue']['team_keys']);
        }

        $this->cacheData();

        if ($GLOBALS['TBA']['debug']['all']) {
            echo "<br><br>";
            echo "Raw data: <br>";
            echo var_dump($TBAdataArray);
            echo "<br><br>";
        }

    }
    function cacheData() {
        if ($GLOBALS['TBA']['debug']['match']) {
          echo "Saving team cache at: " . $GLOBALS['TBA']['PATH']['CACHE']['TEAMS'];
        }
        $jsonData = json_encode(self::$teams);
        file_put_contents($GLOBALS['TBA']['PATH']['CACHE']['TEAMS'], $jsonData);

        // $jsonDataMatch = json_encode(TBAdata::matches);
        // file_put_contents($GLOBALS['TBA']['PATH']['CACHE']['MATCHES'], $jsonDataMatch);

        $jsonUpdate = json_encode(self::$updateTime);
        file_put_contents($GLOBALS['TBA']['PATH']['CACHE']['UPDATE'], $jsonUpdate);

    }
    function getTeam($comp_level, $set_number, $match_number, $alliance, $team) {
        if ($alliance == 1) {
            $alliance = 'red';
        }
        else if ($alliance == 2) {
            $alliance = 'blue';
        }
        $jsonString = file_get_contents($GLOBALS['TBA']['PATH']['CACHE']['TEAMS']);
        $data = json_decode($jsonString, true);
        return $data[$comp_level][$set_number][$match_number][$alliance][$team];
    }
    function getUpdateTime() {  //TODO check if it is actually caching the timestamp
        $jsonString = file_get_contents($GLOBALS['TBA']['PATH']['CACHE']['UPDATE']);
        $data = json_decode($jsonString, true);
        return str_replace('Date: ','',$data);
    }

    function getEventCode() {
        return $this->eventCode;
    }
    function setEventCode($code) {
        $this->eventCode = $code;
    }

    function getCompLevel() {
        return $this->compLevel;
    }
    function setCompLevel($level) {
        $this->compLevel = $level;
    }
}

//GLOBAL FUNCTIONS
function getCompLevel() {
    $TBAdata = new TBAdata;
    return $TBAdata->getCompLevel();
}
function getUpdateTime() {
    $TBAdata = new TBAdata;
    return $TBAdata->getUpdateTime();
}
function getTeam($comp_level, $set_number, $match_number, $alliance, $team) {
    $TBAdata = new TBAdata;
    return $TBAdata->getTeam($comp_level, $set_number, $match_number, $alliance, $team);
}
?>
