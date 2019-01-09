function buttonClick() {
    var alert = document.getElementById("alertMessage");
    if (alert.style.display === "none") {
        alert.style.display = "block";
    } else {
        alert.style.display = "none";
    }
}

function changeColor() {
    //var color = this.document.getElementById("colorInput").value;
    //this.document.getElementById("one").style.backgroundColor = color;
    $("#one").css("background-color", $("#colorInput").val());
}

$(document).ready(function (){
   $("#toggleButton").click(function(){
        $("#two").fadeOut("slow");
    });
});