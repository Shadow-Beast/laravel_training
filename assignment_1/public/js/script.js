$(function() {
    $.ajax({
        url: "/api/beer-list",
        type: "GET",
        dataType: "json",
        success: function(res) {
            console.log("Hi");
        }
    })
});