var topBound = 20;
var newTopBound = 2;
var bottomBound = 0;
var topBoundDefence = 2;
var bottomBoundDefence = 0;
var topRatingBound = 5;
var bottomRatingBound = 0;



//AUTO CAP
function setautoHighGoals(a) {
	var value = document.getElementById("autoHighGoalstb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= newTopBound) {
	}
	else {
		document.getElementById("autoHighGoalstb").value = Number(value) + a;
	}
}
function setautoMissedHighGoals(a) {
	var value = document.getElementById("autoMissedHighGoalstb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= newTopBound) {
	}
	else {
		document.getElementById("autoMissedHighGoalstb").value = Number(value) + a;
	}
}
function setautoLowGoals(a) {
	var value = document.getElementById("autoLowGoalstb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= newTopBound) {
	}
	else {
		document.getElementById("autoLowGoalstb").value = Number(value) + a;
	}
}
function setautoMissedLowGoals(a) {
	var value = document.getElementById("autoMissedLowGoalstb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("autoMissedLowGoalstb").value = Number(value) + a;
	}
}
function setautoPortcullis(a) {
	var value = document.getElementById("autoPortcullistb").value;
	if (a < 0 && value <= bottomBoundDefence || a > 0 && value >= topBoundDefence) {
	}
	else {
		document.getElementById("autoPortcullistb").value = Number(value) + a;
	}
}
function setautoCheval(a) {
	var value = document.getElementById("autoChevaltb").value;
	if (a < 0 && value <= bottomBoundDefence || a > 0 && value >= topBoundDefence) {
	}
	else {
		document.getElementById("autoChevaltb").value = Number(value) + a;
	}
}
function setautoMoat(a) {
	var value = document.getElementById("autoMoattb").value;
	if (a < 0 && value <= bottomBoundDefence || a > 0 && value >= topBoundDefence) {
	}
	else {
		document.getElementById("autoMoattb").value = Number(value) + a;
	}
}
function setautoRamparts(a) {
	var value = document.getElementById("autoRampartstb").value;
	if (a < 0 && value <= bottomBoundDefence || a > 0 && value >= topBoundDefence) {
	}
	else {
		document.getElementById("autoRampartstb").value = Number(value) + a;
	}
}
function setautoDrawbridge(a) {
	var value = document.getElementById("autoDrawbridgetb").value;
	if (a < 0 && value <= bottomBoundDefence || a > 0 && value >= topBoundDefence) {
	}
	else {
		document.getElementById("autoDrawbridgetb").value = Number(value) + a;
	}
}
function setautoSallyPort(a) {
	var value = document.getElementById("autoSallyPorttb").value;
	if (a < 0 && value <= bottomBoundDefence || a > 0 && value >= topBoundDefence) {
	}
	else {
		document.getElementById("autoSallyPorttb").value = Number(value) + a;
	}
}
function setautoRockWall(a) {
	var value = document.getElementById("autoRockWalltb").value;
	if (a < 0 && value <= bottomBoundDefence || a > 0 && value >= topBoundDefence) {
	}
	else {
		document.getElementById("autoRockwalltb").value = Number(value) + a;
	}
}
function setautoRoughTerrain(a) {
	var value = document.getElementById("autoRoughTerraintb").value;
	if (a < 0 && value <= bottomBoundDefence || a > 0 && value >= topBoundDefence) {
	}
	else {
		document.getElementById("autoRoughTerraintb").value = Number(value) + a;
	}
}
function setautoRockWall(a) {
	var value = document.getElementById("autoRockWalltb").value;
	if (a < 0 && value <= bottomBoundDefence || a > 0 && value >= topBoundDefence) {
	}
	else {
		document.getElementById("autoRockWalltb").value = Number(value) + a;
	}
}
function setautoLowBar(a) {
	var value = document.getElementById("autoLowBartb").value;
	if (a < 0 && value <= bottomBoundDefence || a > 0 && value >= topBoundDefence) {
	}
	else {
		document.getElementById("autoLowBartb").value = Number(value) + a;
	}
}

//TELE CAP
function setteleHighGoals(a) {
	var value = document.getElementById("teleHighGoalstb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("teleHighGoalstb").value = Number(value) + a;
	}
}
function setteleMissedHighGoals(a) {
	var value = document.getElementById("teleMissedHighGoalstb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("teleMissedHighGoalstb").value = Number(value) + a;
	}
}
function setteleLowGoals(a) {
	var value = document.getElementById("teleLowGoalstb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("teleLowGoalstb").value = Number(value) + a;
	}
}
function setteleMissedLowGoals(a) {
	var value = document.getElementById("teleMissedLowGoalstb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("teleMissedLowGoalstb").value = Number(value) + a;
	}
}
function settelePortcullis(a) {
	var value = document.getElementById("telePortcullistb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("telePortcullistb").value = Number(value) + a;
	}
}
function setteleCheval(a) {
	var value = document.getElementById("teleChevaltb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("teleChevaltb").value = Number(value) + a;
	}
}
function setteleMoat(a) {
	var value = document.getElementById("teleMoattb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("teleMoattb").value = Number(value) + a;
	}
}
function setteleRamparts(a) {
	var value = document.getElementById("teleRampartstb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("teleRampartstb").value = Number(value) + a;
	}
}
function setteleDrawbridge(a) {
	var value = document.getElementById("teleDrawbridgetb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("teleDrawbridgetb").value = Number(value) + a;
	}
}
function setteleSallyPort(a) {
	var value = document.getElementById("teleSallyPorttb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("teleSallyPorttb").value = Number(value) + a;
	}
}
function setteleRockWall(a) {
	var value = document.getElementById("teleRockWalltb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("teleRockWalltb").value = Number(value) + a;
	}
}
function setteleRoughTerrain(a) {
	var value = document.getElementById("teleRoughTerraintb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("teleRoughTerraintb").value = Number(value) + a;
	}
}
function setteleLowBar(a) {
	var value = document.getElementById("teleLowBartb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("teleLowBartb").value = Number(value) + a;
	}
}
function setteleDriver(a) {
	var value = document.getElementById("teleDrivertb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("teleDrivertb").value = Number(value) + a;
	}
}
function setteleSpeed(a) {
	var value = document.getElementById("teleSpeedtb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("teleSpeedtb").value = Number(value) + a;
	}
}
function setteleDefense(a) {
	var value = document.getElementById("teleDefensetb").value;
	if (a < 0 && value <= bottomRatingBound || a > 0 && value >= topRatingBound) {
	}
	else {
		document.getElementById("teleDefensetb").value = Number(value) + a;
	}
}