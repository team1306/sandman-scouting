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
    if (color === "red") {
        backgroundRed();
    }
    else if (color === "blue") {
        backgroundBlue();
    }
}

/**
 * Set the theme to red
 */
function backgroundRed() {
    var btns = document.getElementsByClassName("btn-danger");
    var txts = document.getElementsByClassName("textBox");
    var addsubbtns = document.getElementsByClassName("addsubButton");
    switcher = 0;
        for (let button of btns) {
            button.style.backgroundColor = redBtn;
            button.style.color = redBtnText;
        }
        for (let text of txts) {
            text.style.backgroundColor = redTxt;
            text.style.color = redTxtText;
        }
        for (let addsubbutton of addsubbtns) {
            addsubbutton.style.backgroundColor = redBtn;
            addsubbutton.style.color = redBtnText;
            addsubbutton.style.borderColor = redBtn;
        }
        document.body.style.backgroundColor = redBackground;
        document.body.style.color = redText;
}

/**
 * Set the theme to blue
 */
function backgroundBlue() {
    var btns = document.getElementsByClassName("btn-danger");
    var txts = document.getElementsByClassName("textBox");
    var addsubbtns = document.getElementsByClassName("addsubButton");
    switcher = 1;
        for (var button of btns) {
            button.style.backgroundColor = blueBtn;
            button.style.color = blueBtnText;
        }
        for (var text of txts) {
            text.style.backgroundColor = blueTxt;
            text.style.color = blueTxtText;
        }
        for (var addsubbutton of addsubbtns) {
            addsubbutton.style.backgroundColor = blueBtn;
            addsubbutton.style.color = blueBtnText;
            addsubbutton.style.borderColor = blueBtn;
        }
        document.body.style.backgroundColor = blueBackground;
        document.body.style.color = blueText;
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