// Vanilla JS
// var inputs = document.querySelectorAll("input, textarea");

// for(var i = 0; i < inputs.length; i++) {
//     const input = inputs[i];
//     input.addEventListener("focus", onFocus)
//     input.addEventListener("blur", onBlur)
// }

function onFocus(event) {
    //event.target.classList.add("active");
    //$(event.target).addClass("active");
    $(this).addClass("active");
}

function onBlur(event) {
    //event.target.classList.remove("active");
    //$(event.target).removeClass("active");
    $(this).removeClass("active");
}

// jQuery
var inputs = $("input, textarea");
inputs.on("focus", onFocus);
inputs.on("blur", onBlur);


console.log($("h1").text());

//$("h1").text("This is a title")
//$("h1").html("This is a <u>title<u/>")
// $("h1").append(" <i>After<i/>");
// $("h1").prepend("<i>Before<i/> ");

$("h1").css("background-color", "red");
$("h1").css("color", "#fff");
$("h1").css("padding", "10px 20px");

$("h1").css({
    backgroundColor: "red",
    color: "#fff",
    padding: "10px 20px"
})

$("h1").css({
    "background-color": "red",
    "color": "#fff",
    "padding": "10px 20px"
})

$("button").attr("id", "send-btn")

$("button").on("click", function() {
    $("h1").slideToggle(1000);
})

// show    -   fadeIn      -   slideDown
// hide    -   fadeOut     -   slideUp
// toggle  -   fadeToggle  -   slideToggle

$("input, textarea").each(function(index) {
    //$(this).val("The index is " + index + " and the name is " + $(this).attr("name"))
    $(this).val(`The index is ${index} and the name is ${$(this).attr("name")}`)
    $(this).addClass(`input-${index}`);
})

//$("input, textarea").addClass("input");

$("h1").on("click", function() {
    $(this).find("u").text("TEST");
})

$("h1").on("click", function() {
    $(this).animate({
        marginLeft: 50
    }, 1000)
})

$(".accordion .title").on("click", function() {
    // $(this).siblings("h2").next().slideUp()
    // $(this).next().slideToggle()
    $(this).remove();
})