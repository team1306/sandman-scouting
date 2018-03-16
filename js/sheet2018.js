var topBoundAuto = 15;
var bottomBoundAuto = 0;

var topBoundKPA = 100;
var bottomBoundKPA = 0;
//AUTO CAP

function setAutoCubeSwitch(a) {
	var value = document.getElementById("autoCubeSwitchtb").value;
  console.log(value);
  if (a < 0) {
    if (value > bottomBoundAuto) {
  			document.getElementById("autoCubeSwitchtb").value = Number(value) + a;
    }
  } else if (a > 0) {
    if (value < topBoundAuto) {
      document.getElementById("autoCubeSwitchtb").value = Number(value) + a;
    }
  } else {
    console.log("setAutoCubeSwitch() failed. a=" + a);
  }
}
function setAutoCubeScale(a) {
	var value = document.getElementById("autoCubeScaletb").value;
  console.log(value);
  if (a < 0) {
    if (value > bottomBoundAuto) {
  			document.getElementById("autoCubeScaletb").value = Number(value) + a;
    }
  } else if (a > 0) {
    if (value < topBoundAuto) {
      document.getElementById("autoCubeScaletb").value = Number(value) + a;
    }
  } else {
    console.log("setAutoCubeSwitch() failed. a=" + a);
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
