//RED COLOR VARS
const redBackground     = "#990000";        //Page background color (default #ff4040, FRC: #eb1c23)
const redText           = "white";          //Color for the text on the page (default: black)
const redBtn            = "black";          //Background color for the buttons (default: red)
const redBtnText        = "white";          //Color for the button text (default: white)
const redTxt            = "black";          //Background color for text input fields (default: red)  
const redTxtText        = "white";          //Text color for text input fields (default: white)

//BLUE COLOR VARS
const blueBackground    = "#0068b3";        //Page background color (default: #0068b3)
const blueText          = "white";          //Color for the text on the page (default: white)
const blueBtn           = "black";          //Color for the buttons when background is blue (default: black)
const blueBtnText       = "white";          //Color for the button text when background is blue (default: white)
const blueTxt           = "black";          //Background color for text input fields (default: black)
const blueTxtText       = "white";          //Text color for text input fields (default: white)

var switcher = 0;

/**
 * Set the page background color, button color, and text color to match one of the themes
 * 
 * @param {String} color Color to switch to (red or blue)
 */
function setColor(color) {
    var btns = document.getElementsByClassName("btn-danger");
    var txts = document.getElementsByClassName("textBox");
    var addsubbtns = document.getElementsByClassName("addsubButton");
    if (color === "red") {
        switcher = 0;
        for (var i = 0; i < btns.length; i++) {
            btns[i].style.backgroundColor = redBtn;
            btns[i].style.color = redBtnText;
        }
        for (i = 0; i < txts.length; i++) {
            txts[i].style.backgroundColor = redTxt;
            txts[i].style.color = redTxtText;
            i++;
        }
        for (i = 0; i < addsubbtns.length; i++) {
            addsubbtns[i].style.backgroundColor = redBtn;
            addsubbtns[i].style.color = redBtnText;
            addsubbtns[i].style.borderColor = redBtn;
            i++;
        }
        document.body.style.backgroundColor = redBackground;
        document.body.style.color = redText;
    }
    else if (color === "blue") {
        switcher = 1;
        for (var i = 0; i < btns.length; i++) {
            btns[i].style.backgroundColor = blueBtn;
            btns[i].style.color = blueBtnText;
            i++;
        }
        for (i = 0; i < txts.length; i++) {
            txts[i].style.backgroundColor = blueTxt;
            txts[i].style.color = blueTxtText;
            i++;
        }
        for (i = 0; i < addsubbtns.length; i++) {
            addsubbtns[i].style.backgroundColor = blueBtn;
            addsubbtns[i].style.color = blueBtnText;
            addsubbtns[i].style.borderColor = blueBtn;
            i++;
        }
        document.body.style.backgroundColor = blueBackground;
        document.body.style.color = blueText; 
    }
}

/**
 * Set the theme to red
 */
function backgroundRed() {
    setColor("red");
}

/**
 * Set the theme to blue
 */
function backgroundBlue() {
    setColor("blue");
}

/**
 * Switch the theme (red->blue or blue->red)
 */
function backgroundSwitch() {
    if(switcher === 0) {
        setColor("blue");
        switcher = 1;
    } else {
        setColor("red");
        switcher = 0;
    }
}