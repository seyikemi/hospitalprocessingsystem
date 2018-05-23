function diagnose() {
    document.getElementById("diagnose").style.display = "block";
    document.getElementById("priscribe").style.display = "none";
    document.getElementById("uploadtests").style.display = "none";
    document.getElementById("diagnosis").style.display = "none";
    document.getElementById("priscription").style.display = "none";
    document.getElementById("tests").style.display = "none";
}

function prescribe() {
    document.getElementById("diagnose").style.display = "none";
    document.getElementById("priscribe").style.display = "block";
    document.getElementById("uploadtests").style.display = "none";
    document.getElementById("diagnosis").style.display = "none";
    document.getElementById("priscription").style.display = "none";
    document.getElementById("tests").style.display = "none";
}

function uploadTest() {
    document.getElementById("diagnose").style.display = "none";
    document.getElementById("priscribe").style.display = "none";
    document.getElementById("uploadtests").style.display = "block";
    document.getElementById("diagnosis").style.display = "none";
    document.getElementById("priscription").style.display = "none";
    document.getElementById("tests").style.display = "none";
}

function viewTest() {
    document.getElementById("diagnose").style.display = "none";
    document.getElementById("priscribe").style.display = "none";
    document.getElementById("uploadtests").style.display = "none";
    document.getElementById("diagnosis").style.display = "none";
    document.getElementById("priscription").style.display = "none";
    document.getElementById("tests").style.display = "block";
}

function viewDiagnosis() {
    document.getElementById("diagnose").style.display = "none";
    document.getElementById("priscribe").style.display = "none";
    document.getElementById("uploadtests").style.display = "none";
    document.getElementById("diagnosis").style.display = "block";
    document.getElementById("priscription").style.display = "none";
    document.getElementById("tests").style.display = "none";
}

function viewPrescription() {
    document.getElementById("diagnose").style.display = "none";
    document.getElementById("priscribe").style.display = "none";
    document.getElementById("uploadtests").style.display = "none";
    document.getElementById("diagnosis").style.display = "none";
    document.getElementById("priscription").style.display = "block";
    document.getElementById("tests").style.display = "none";
}