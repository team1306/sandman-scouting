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
    private static $matches;
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

        foreach ($TBAdataArray as $key => $value) {
            if ($GLOBALS['TBA']['debug']['match']) {
                echo "{$key} => {$value} <br>";
                echo "----------------------------------------<br>[";
                echo "Comp Lvl: " . $value['comp_level'] . " | Match Num: " . $value['match_number'] . " | Set Num:" . $value['set_number'] . "]";
                echo var_dump($value['alliances']['blue']['teams']);
                echo var_dump($value['alliances']['red']['teams']);
                echo "----------------------------------------<br>";
            }

            $this->teams[$value['comp_level']][$value['set_number']][$value['match_number']]['red'] = str_replace('frc','',$value['alliances']['red']['teams']);
            $this->teams[$value['comp_level']][$value['set_number']][$value['match_number']]['blue'] = str_replace('frc','',$value['alliances']['blue']['teams']);

            // ^^ Team data
            // vv Match data

            // vv true or false
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['rotor1Auto'] = $value['score_breakdown']['red']['rotor1Auto'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['rotor1Auto'] = $value['score_breakdown']['blue']['rotor1Auto'];

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['rotor2Auto'] = $value['score_breakdown']['red']['rotor2Auto'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['rotor2Auto'] = $value['score_breakdown']['blue']['rotor2Auto'];

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['rotor1Engaged'] = $value['score_breakdown']['red']['rotor1Engaged'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['rotor1Engaged'] = $value['score_breakdown']['blue']['rotor1Engaged'];

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['rotor2Engaged'] = $value['score_breakdown']['red']['rotor2Engaged'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['rotor2Engaged'] = $value['score_breakdown']['blue']['rotor2Engaged'];

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['rotor3Engaged'] = $value['score_breakdown']['red']['rotor3Engaged'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['rotor3Engaged'] = $value['score_breakdown']['blue']['rotor3Engaged'];

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['rotor4Engaged'] = $value['score_breakdown']['red']['rotor4Engaged'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['rotor4Engaged'] = $value['score_breakdown']['blue']['rotor4Engaged'];
            // vv Num value
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['foulPoints'] = $value['score_breakdown']['red']['foulPoints'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['foulPoints'] = $value['score_breakdown']['blue']['foulPoints'];

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['autoFuelHigh'] = $value['score_breakdown']['red']['autoFuelHigh'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['autoFuelHigh'] = $value['score_breakdown']['blue']['autoFuelHigh'];

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['autoFuelLow'] = $value['score_breakdown']['red']['autoFuelLow'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['autoFuelLow'] = $value['score_breakdown']['blue']['autoFuelLow'];

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['teleopFuelHigh'] = $value['score_breakdown']['red']['teleopFuelHigh'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['teleopFuelHigh'] = $value['score_breakdown']['blue']['teleopFuelHigh'];

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['teleopFuelLow'] = $value['score_breakdown']['red']['teleopFuelLow'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['teleopFuelLow'] = $value['score_breakdown']['blue']['teleopFuelLow'];
            //vv "Mobility" or "None"
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['robot1Auto'] = $value['score_breakdown']['red']['robot1Auto'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['robot1Auto'] = $value['score_breakdown']['blue']['robot1Auto'];

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['robot2Auto'] = $value['score_breakdown']['red']['robot2Auto'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['robot2Auto'] = $value['score_breakdown']['blue']['robot2Auto'];

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['robot3Auto'] = $value['score_breakdown']['red']['robot3Auto'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['robot3Auto'] = $value['score_breakdown']['blue']['robot3Auto'];
            // vv "ReadyForTakeoff" or "None"                                                                                                                                  // verify position-to-team?
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['touchpadFar'] = $value['score_breakdown']['red']['touchpadFar'];        //t1
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['touchpadFar'] = $value['score_breakdown']['blue']['touchpadFar'];      //t3

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['touchpadMiddle'] = $value['score_breakdown']['red']['touchpadMiddle'];  //t2
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['touchpadMiddle'] = $value['score_breakdown']['blue']['touchpadMiddle'];//t2

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['touchpadNear'] = $value['score_breakdown']['red']['touchpadNear'];      //t3
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['touchpadNear'] = $value['score_breakdown']['blue']['touchpadNear'];    //t1

            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['red']['totalPoints'] = $value['score_breakdown']['red']['totalPoints'];
            $this->matches[$value['comp_level']][$value['set_number']][$value['match_number']]['blue']['totalPoints'] = $value['score_breakdown']['blue']['totalPoints'];


        }
        $this->updateTime = $http_response_header[1];
        $this->cacheData();

        if ($GLOBALS['TBA']['debug']['all']) {
            echo var_dump($TBAdataArray);
        }
    }
    function cacheData() {
        $jsonData = json_encode($this->teams);
        file_put_contents($GLOBALS['TBA']['PATH']['CACHE']['TEAMS'], $jsonData);
        file_put_contents($GLOBALS['TBA']['PATH']['CACHE']['TEAMS']['php'], $jsonData);

        $jsonDataMatch = json_encode($this->matches);
        file_put_contents($GLOBALS['TBA']['PATH']['CACHE']['MATCHES'], $jsonDataMatch);
        file_put_contents($GLOBALS['TBA']['PATH']['CACHE']['MATCHES']['php'], $jsonDataMatch);


        $jsonUpdate = json_encode($this->updateTime);
        file_put_contents($GLOBALS['TBA']['PATH']['CACHE']['UPDATE'], $jsonUpdate);
        file_put_contents($GLOBALS['TBA']['PATH']['CACHE']['UPDATE']['php'], $jsonUpdate);


        // $oldDatesJSON = file_get_contents($GLOBALS['TBA']['PATH']['CACHE']['UPDATE']['log']);
        // $oldDates = json_decode($oldDatesJSON);
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
