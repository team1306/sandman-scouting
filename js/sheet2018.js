var topBoundAuto = 15;
var bottomBoundAuto = 0;

var topBoundTele = 25;

var topBoundKPA = 100;
var bottomBoundKPA = 0;

var debug = false;

// AUTO CAP

function setTextbox(a, isAuto, element) {
	var value = document.getElementById(element).value;
	var topBound = 0;
	var bottomBound = 0;
	if (isAuto) {
		topBound = topBoundAuto;
	} else {
		topBound = topBoundTele;
	}
	if (debug) {
		console.log(element + ": " + a + " | val: " + value );
	}
  if (a < 0) {
    if (value > bottomBound) {
  			document.getElementById(element).value = Number(value) + a;
    }
  } else if (a > 0) {
    if (value < topBound) {
      document.getElementById(element).value = Number(value) + a;
    }
  } else {
    console.log("setTextbox(" + a + ", " + element + ") failed.");
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
