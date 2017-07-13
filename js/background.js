//RED COLOR VARS
var redBackground = "#990000";      //Page background color (default #ff4040, FRC: #eb1c23)
var redText = "black";              //Color for the text on the page (default: black)
var redBtn = "red";                 //Background color for the buttons (default: red)
var redBtnText = "white";           //Color for the button text (default: white)
var redTxt = "red";                 //Background color for text input fields (default: red)  
var redTxtText = "white";           //Text color for text input fields (default: white)

//BLUE COLOR VARS
var blueBackground = "#0068b3";     //Page background color (default: #0068b3)
var blueText = "white";             //Color for the text on the page (default: white)
var blueBtn = "black";              //Color for the buttons when background is blue (default: black)
var blueBtnText = "white";          //Color for the button text when background is blue (default: white)
var blueTxt = "black";              //Background color for text input fields (default: black)
var blueTxtText = "white";          //Text color for text input fields (default: white)

var switcher = 0;

function backgroundRed() {
    setColor("red");
}

function backgroundBlue() {
    setColor("blue");
}

function backgroundSwitch() {
    if(switcher == 0) {
        setColor("blue");
        switcher = 1;
    } else {
        setColor("red");
        switcher = 0;
    }
}

function setColor(color) {
    var btns = document.getElementsByClassName('btn-danger');
    var txts = document.getElementsByClassName('textBox');
    var addsubbtns = document.getElementsByClassName('addsubButton');
    if (color == "red") {
        switcher = 0;
        var i = 0;
        while (i < btns.length) {
            btns[i].style.backgroundColor = blueBtn;
            btns[i].style.color = blueBtnText;
            i++;
        }
        i = 0;
        while (i < txts.length) {
            txts[i].style.backgroundColor = blueTxt;
            txts[i].style.color = blueTxtText;
            i++;
        }
        i = 0;
        while (i < addsubbtns.length) {
            addsubbtns[i].style.backgroundColor = blueBtn;
            addsubbtns[i].style.color = blueBtnText;
            addsubbtns[i].style.borderColor = blueBtn;
            i++;
        }
        document.body.style.backgroundColor = redBackground;
        document.body.style.color = blueText;
    }
    else if (color == "blue") {
        switcher = 1;
        var i = 0;
        while (i < btns.length) {
            btns[i].style.backgroundColor = blueBtn;
            btns[i].style.color = blueBtnText;
            i++;
        }
        i = 0;
        while (i < txts.length) {
            txts[i].style.backgroundColor = blueTxt;
            txts[i].style.color = blueTxtText;
            i++;
        }
        i = 0;
        while (i < addsubbtns.length) {
            addsubbtns[i].style.backgroundColor = blueBtn;
            addsubbtns[i].style.color = blueBtnText;
            addsubbtns[i].style.borderColor = blueBtn;
            i++;
        }
        document.body.style.backgroundColor = blueBackground;
        document.body.style.color = blueText; 
    }
}