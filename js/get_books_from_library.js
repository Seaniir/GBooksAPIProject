$(document).ready(
$.ajax({
    type: "GET",
    dataType: "json",
    url: "get_books_from_library.php", 

    success: function(response) {
        console.log(response);
    },
    error: function()
    {
        console.log("CA MARCHE PAS");
    }
}));