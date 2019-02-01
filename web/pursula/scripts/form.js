/* ___________Checkout Input Help____________ */
function showHelp(inputName) {
    //show a message explaining what info is expected as input
    var inputItem = document.getElementsByName(inputName);
    inputItem[0].nextElementSibling.style.display = "inline-block";
}

/* ___________Checkout Name/City Validation____________ */
function validateName(inputName, inputValue) {
    var validName = /^([A-Z]\w*\W?\s?)+$/;
    var inputItem = document.getElementsByName(inputName);
    if (inputValue.match(validName)) {
        inputItem[0].nextElementSibling.style.display = "none";
        inputItem[0].className = "valid";
    } else {
        inputItem[0].className = "";
    }
}

/* ___________Checkout Address Validation____________ */
function validateAddr(inputName, inputValue) {
    var validAddr = /^\d*\s\w+?\W?\s\d*\s?\w+\W?\s?\w*\W?\s?$/;
    var inputItem = document.getElementsByName(inputName);
    if (inputValue.match(validAddr)) {
        inputItem[0].nextElementSibling.style.display = "none";
        inputItem[0].className = "valid";
    } else {
        inputItem[0].className = "";
    }
}

function validateState(inputName, inputValue) {
    var validSt = /^\s*(A[LKZ])|(C[AOT])|DE|FL|GA|HI|(I[DLNA])|(K[SY])|LA|(M[EDAINSOT])|(N[EVHJMYCD])|(O[HKR])|PA|RI|(S[CD])|(T[NX])|UT|(V[TA])|(W[AVIY])\s*$/;
    var inputItem = document.getElementsByName(inputName);
    if (inputValue.match(validSt)) {
        inputItem[0].nextElementSibling.style.display = "none";
        inputItem[0].className = "valid";
    } else {
        inputItem[0].className = "";
    }
}

function validateZip(inputName, inputValue) {
    var validZip = /^\d{5}\s*$/;
    var inputItem = document.getElementsByName(inputName);
    if (inputValue.match(validZip)) {
        inputItem[0].nextElementSibling.style.display = "none";
        inputItem[0].className = "valid";
    } else {
        inputItem[0].className = "";
    }
}

/* ___________Checkout Phone Validation____________ */
function validatePhone(inputName, inputValue) {
    var validPhone = /^\d{10}\s*$/;
    var inputItem = document.getElementsByName(inputName);
    if (inputValue.match(validPhone)) {
        inputItem[0].nextElementSibling.style.display = "none";
        inputItem[0].className = "valid";
    } else {
        inputItem[0].className = "";
    }
}

/* ___________Checkout Payment Validation____________ */
function validateCard(inputName, inputValue) {
    var validCard = /^\s*(((\d{4}\s){3}\d{4})|\d{16})\s*$/;
    var inputItem = document.getElementsByName(inputName);
    if (inputValue.match(validCard)) {
        inputItem[0].nextElementSibling.style.display = "none";
        inputItem[0].className = "valid";
    } else {
        inputItem[0].className = "";
    }
}

function validateExpiration(inputName, inputValue) {
    var validDate = /^\s*(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)\s[2][0]\d{2}\s*$/;
    var inputItem = document.getElementsByName(inputName);
    if (inputValue.match(validDate)) {
        inputItem[0].nextElementSibling.style.display = "none";
        inputItem[0].className = "valid";
    } else {
        inputItem[0].className = "";
    }
}


