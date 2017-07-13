var topBound = 20;
var bottomBound = 0;

var topBoundKPA = 100;
var bottomBoundKPA = 0;
//AUTO CAP

function setAutoKPA(a) {
	var value = document.getElementById("autoKPAtb").value;
	if (a < 0 && value <= bottomBoundKPA || a > 0 && value >= topBoundKPA) {
	}
	else {
		if (Number(value) + a < 0) {
			document.getElementById("autoKPAtb").value = 0;
		}
		else {
			document.getElementById("autoKPAtb").value = Number(value) + a;
		}
	}
}

function setTeleKPA(a) {
	var value = document.getElementById("teleKPAtb").value;
	if (a < 0 && value <= bottomBoundKPA || a > 0 && value >= topBoundKPA) {
	}
	else {
		if (Number(value) + a < 0) {
			document.getElementById("teleKPAtb").value = 0;
		}
		else {
			document.getElementById("teleKPAtb").value = Number(value) + a;
		}
	}
}

//TELE CAP
function setTeleGearSuccess(a) {
	var value = document.getElementById("teleGearSuccesstb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("teleGearSuccesstb").value = Number(value) + a;
	}
}
function setTeleGearFail(a) {
	var value = document.getElementById("teleGearFailtb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("teleGearFailtb").value = Number(value) + a;
	}
}
function setteleGearCycles(a) {
	var value = document.getElementById("teleGearCyclestb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("teleGearCyclestb").value = Number(value) + a;
	}
}
function setteleBallCycles(a) {
	var value = document.getElementById("teleBallCyclestb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("teleBallCyclestb").value = Number(value) + a;
	}
}
