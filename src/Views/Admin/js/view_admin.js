/* Demo purposes only */
$(".hover").mouseleave(
    function() {
        $(this).removeClass("hover");
    }
);

showProduct = () => {
    document.getElementById("show-product").style.display = "block";
    document.getElementById("show-user").style.display = "none";
    console.log("show Product");
}
showUser = () => {
    document.getElementById("show-product").style.display = "none";
    document.getElementById("show-user").style.display = "block";

}