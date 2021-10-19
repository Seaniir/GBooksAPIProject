var titleArray = new Array();
var authorsArray = new Array();
var imgArray = new Array();
var ISBNArray = new Array();
var ISBN10Array = new Array();
var ISBN13Array = new Array();
var arrayDiv = new Array();
var genreArray = new Array();
var responseLast;

$(document).ready(
$.ajax({
    type: "GET",
    dataType: "json",
    url: "get_books_from_library.php", 

    success: function(response) {
        change(response);
    },
    error: function()
    {
        console.log("CA MARCHE PAS");
    }
}));

function change(response)
{
    responseLast = response;
    showBook(responseLast);
    console.log(responseLast);
}


$('#orderChoose').click(function(){
    var orderChoose = document.getElementById("orderChoose");
    var order = orderChoose.value;
    console.log(order);
    if(order == "orderInverse")
        showBookInverse(responseLast);
    if(order == "order")
        showBook(responseLast);
   });

   function showBook(response){
    for (var i = 0; i < arrayDiv.length; i++) {
        $('.bookCards').remove();
      }
    for (var i = 0; i < response[1].length; i++) {
        title = $('<h5>' + response[1][i] + '</h5>');
        author = $('<h5>' + response[2][i] + '</h5>');
        genre = $('<h5>' + response[3][i] + '</h5>');
        img = $('<img class = "mt-3" id = "dynamic"></img>');
          arrayDiv[i] = document.createElement('div');
          arrayDiv[i].className = 'bookCards';
          url = response[4][i];
          img.attr('src', url); //Attach the image url
          title.appendTo(arrayDiv[i]);
          author.appendTo(arrayDiv[i]);
          genre.appendTo(arrayDiv[i]);
          img.appendTo(arrayDiv[i]);
          document.getElementById("bookCardsContainer").appendChild(arrayDiv[i]);  
   };
}

      function showBookInverse(response){
        for (var i = 0; i < arrayDiv.length; i++) {
            $('.bookCards').remove();
          }
        for (var i = response[1].length-1 ; i >= 0 ; i--) {
            title = $('<h5>' + response[1][i] + '</h5>');
            author = $('<h5>' + response[2][i] + '</h5>');
            genre = $('<h5>' + response[3][i] + '</h5>');
            img = $('<img class = "mt-3" id = "dynamic"></img>');
              arrayDiv[i] = document.createElement('div');
              arrayDiv[i].className = 'bookCards';
              url = response[4][i];
              img.attr('src', url); //Attach the image url
              title.appendTo(arrayDiv[i]);
              author.appendTo(arrayDiv[i]);
              genre.appendTo(arrayDiv[i]);
              img.appendTo(arrayDiv[i]);
              document.getElementById("bookCardsContainer").appendChild(arrayDiv[i]);  
   };
}