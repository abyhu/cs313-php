function buttonClick() {
    var alert = this.document.getElementById("alertMessage");
    if (alert.style.display === "none") {
        alert.style.display = "block";
    } else {
        alert.style.display = "none";
    }
}