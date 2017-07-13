var topBound = 5;
var bottomBound = 0;


function setDriverRating(a) {
	var value = document.getElementById("driverRatingtb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("driverRatingtb").value = Number(value) + a;
	}
}

function setDrivetrainRating(a) {
	var value = document.getElementById("drivetrainRatingtb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("drivetrainRatingtb").value = Number(value) + a;
	}
}

function setSpeedRating(a) {
	var value = document.getElementById("speedRatingtb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("speedRatingtb").value = Number(value) + a;
	}
}

function setDefenseRating(a) {
	var value = document.getElementById("defenseRatingtb").value;
	if (a < 0 && value <= bottomBound || a > 0 && value >= topBound) {
	}
	else {
		document.getElementById("defenseRatingtb").value = Number(value) + a;
	}
}