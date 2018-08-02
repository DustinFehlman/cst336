//vars
var gpaFlag = false;
var cst231Flag = false;
var cst238Flag = false;
var math130Flag = false;
var creditsFlag = false;
var stateFlag = false;

var states = [
    "AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC",
    "DE", "FL", "GA", "HI", "IA", "ID", "IL", "IN", "KS", "KY", "LA",
    "MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC", "ND", "NE",
    "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC",
    "SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY"
];

loadStateDropdown();
//functions

function loadStateDropdown() {
    for (var i = 0; i < states.length; i++) {
        $('<option/>').val(states[i]).html(states[i]).appendTo('#state-select');
    }
}

function reset() {
    gpaFlag = false;
    cst231Flag = false;
    cst238Flag = false;
    math130Flag = false;
    creditsFlag = false;
    stateFlag = false;
    $("#gpa-error").hide();
    $("#credits-error").hide();
    $("#full-results").empty();
}

function validateInputs() {
    var validInput = true;
    if (!$("input[name='gpa']:checked").val()) {
        $("#gpa-error").show();
        validInput = false;
    }
    var creditValue = $("input[name='credits']").val();
    if ((creditValue < 0 || creditValue > 120) || creditValue == " ") {
        $("#credits-error").show();
        validInput = false;
    }
    return validInput;
}

function validGPA() {
    if ($("input[name='gpa']:checked").val() === "yes") {
        return true;
    }
    return false;
}

function validCST231() {
    if ($("input[name='cst231']").is(':checked')) {
        return true;
    }
    return false;
}

function validCST238() {
    if ($("input[name='cst238']").is(':checked')) {
        return true;
    }
    return false;
}

function validMATH130() {
    if ($("input[name='math130']").is(':checked')) {
        return true;
    }
    return false;
}

function validCredits() {
    var totalCredits = $("input[name='credits']").val();
    if (totalCredits >= 60) {
        return true;
    }
    return false;
}

function validState() {
    var selectedState = $("#state-select").val();
    var restrictedStates = ["AK", "DE", "IN", "IA", "KS", "KY", "LA", "MN",
        "NH", "NM", "NC", "OH", "OR", "UT"];
    for (var x in restrictedStates) {
        if (selectedState === restrictedStates[x]) {
            return false;
        }
    }
    return true;
}

function createResults() {
    var results = "";
    if (gpaFlag && cst231Flag && cst238Flag && math130Flag && creditsFlag && stateFlag) {
        results += "Amazing! You are ready to apply to the CS Online at CSUMB! Please view our assessment below:";
    }
    else {
        results += "Sorry! You are not quite ready to apply to the CS Online at CSUMB. Please view our assessment below:";
    }
    
    if (gpaFlag) {
        results += "<br>-Great job having a GPA at or above 2.0!";
    }
    else {
        results += "<br>-Please get your GPA at or above 2.0 before applying."
    }
    
    if (cst231Flag) {
        results += "<br>-Great job taking CST231!";
    }
    else {
        results += "<br>-Please take CST231 before applying."
    }
    
    if (cst238Flag) {
        results += "<br>-Great job taking CST238!";
    }
    else {
        results += "<br>-Please take CST238 before applying."
    }
    
    if (math130Flag) {
        results += "<br>-Great job taking MATH130!";
    }
    else {
        results += "<br>-Please take MATH130 before applying."
    }
    
    if (creditsFlag) {
        results += "<br>-Great job having the minimum required credits of 60!";
    }
    else {
        results += "<br>-Please obtain the minimum required credits of 60 before applying."
    }
    
    if (stateFlag) {
        results += "<br>-Great job living in a state that allows us to teach you!";
    }
    else {
        results += "<br>-We are not allowed to teach in your state. Please move before applying."
    }
    
    $("#full-results").append(results);
}

$("#main-submit").click(function() {
    reset();
    if (validateInputs()) {
        gpaFlag = validGPA();
        cst231Flag = validCST231();
        cst238Flag = validCST238();
        math130Flag = validMATH130();
        creditsFlag = validCredits();
        stateFlag = validState();
        createResults();
    }
});
