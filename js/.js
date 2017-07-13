var report = {teamNum:0, matchNum:0, isRed:false,
    teleCap:{crossDefence:0, highGoals:0, lowGoals:0, climbTower:false, portcullis: 0, portcullisAssist: 0, cheval: 0, moat: 0, ramparts: 0, drawbridge: 0, drawbridgeAssist: 0, sallyPort: 0, sallyPortAssist: 0, rockWall: 0, roughTerrain: 0, lowBar: 0, notes:"None"}
    };
console.log(report.isRed);
    
function setNum(num) { //SYNTAX: report.ex = setNum(0);
    if (typeof num == "number") {
        return num;
    } else {
        alert("Type Mismatch for setNum");
    }
}

function tick(cur, pos, num, top, bot) { // SYNTAX report.ex += tick(report.ex, true, 1, 10, 0)
    if (typeof cur == "number" && typeof num == "number" && typeof pos == "boolean" && typeof top == "number" && typeof bot == "number") {
        if (pos == false) {
            pos = -1;
        } else {
            pos = 1;
        }
        if (num == undefined) {
            num = 1;
        }
        if (top == undefined) {
            top = Infinity;
        }
        if (bot == undefined) {
            bot = 0;
        }
        //alert(cur + ", " + pos + ", " + num + ", " + top + ", " + bot);
        if (cur + num*pos <= top && cur + num*pos >= bot) {
            return pos * num;
        } else {
            return 0;
        }
    } else {
        alert("Type Mismatch for tick" + cur + num + pos + top + bot);
    }
}

function setBool(bool) { //SYNTAX: report.ex = setBool(true);
    if (typeof bool == "boolean") {
        return bool;
    } else {
        alert("Type Mismatch for setBool");
    }
}

function flip(bool) { //SYNTAX: report.ex = flip(report.ex);
    if (typeof bool == "boolean") {
        return !bool;
    } else {
        alert("Type Mismatch for flip");
    }
}

function writeString(str) { //SYNTAX: report.ex += writeString("Hello World!")
    if (typeof str == "string") {
        return str + ", ";
    } else {
        alert("Type Mismatch for flip");
    }
}