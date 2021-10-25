var titleArray = new Array();
var authorsArray = new Array();
var imgArray = new Array();
var ISBNArray = new Array();
var ISBN10Array = new Array();
var ISBN13Array = new Array();
var arrayDiv = new Array();
var genreArray = new Array();
var infoArray = new Array();

$(document).ready(function() {
    $("#test").click(function() {
        for (var i = 0; i < arrayDiv.length; i++) {
            $('.bookCards').remove();
          }

          var search = document.getElementById('books').value;
  
          if (search == '') 
          {
              alert("Please enter something in the field first");
          } 
          else 
          {    
              var url = '';
              var img = '';
              var title = '';
              var author = '';
              var bookURL = "https://www.googleapis.com/books/v1/volumes?q=";
  
  
              $.ajax({
  
                  url: bookURL + search + "&maxResults=40",
  
                  langRestrict: 'fr',
  
                  // La fonction à apeller si la requête aboutie
                  success: function (data) {
                      for (j = 0; j < data.items.length; j++) {
                          titleArray[j] = data.items[j].volumeInfo.title;
                          authorsArray[j] = data.items[j].volumeInfo.authors;
                          imgArray[j] = data.items[j].volumeInfo.imageLinks;
                          genreArray[j] = data.items[j].volumeInfo.categories;
                          infoArray[j] = data.items[j].volumeInfo.infoLink;
                       }
                    console.log(infoArray);
                    for(i = 0; i < data.items.length; i++)
                    {
                      // Je charge les données dans box
                      if (data.items[i].volumeInfo.imageLinks === undefined || data.items[i].volumeInfo.categories == undefined) 
                      {
                          title = null;
                          author = null;
                          genre = null;
                          img = null;
                          url = null;
                      } 
                      else 
                      {
                        title = $('<h5>' + data.items[i].volumeInfo.title + '</h5>');
                        if(data.items[i].volumeInfo.authors[0].length < 16)
                            author = $('<h5>' + data.items[i].volumeInfo.authors[0] + '</h5>');
                        else
                            author = $('<h5>' + data.items[i].volumeInfo.authors[0].substring(0,16) + "..." + '</h5>');
                        genre = $('<h5>' + data.items[i].volumeInfo.categories[0] + '</h5>');
                        img = $('<img class = "mt-3" id = "dynamic"></img>');
                        save = $('<button onClick="saveBook(' +i+')" id ="imagebutton" class="btn red aligning">+ Ajouter</button>');                        
                        info = $('<a class = "btn red aligning" id ="infobutton" href=' + data.items[i].volumeInfo.infoLink + '><i class="fas fa-info" style="color: #ffffff;"></i></h5>');                        
                          arrayDiv[i] = document.createElement('div');
                          arrayDiv[i].className = 'bookCards';
                          url = data.items[i].volumeInfo.imageLinks.thumbnail;
                          img.attr('src', url); //Attach the image url
                          title.appendTo(arrayDiv[i]);
                          author.appendTo(arrayDiv[i]);
                          genre.appendTo(arrayDiv[i]);
                          img.appendTo(arrayDiv[i]);
                          save.appendTo(arrayDiv[i]);
                          info.appendTo(arrayDiv[i]);
                          document.getElementById("bookCardsContainer").appendChild(arrayDiv[i]);
                      }
                    }
                  },
  
                  // La fonction à appeler si la requête n'a pas abouti
                  error: function () 
                  {
                      // J'affiche un message d'erreur
                      console.log("Désolé, aucun résultat trouvé.");
                  }
  
              });
          }
      
    })});

    function saveBook(i)
{
    console.log(genreArray[i][0]);
    var stuff ={'key1':  titleArray[i], 'key2' : authorsArray[i][0], 'key3' : imgArray[i].thumbnail, 'key4' : genreArray[i][0], 'key5' : infoArray[i]};
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: stuff,
        url: 'php/save_books.php',
        success: function(msg) {
          if (msg.error == 1) {
            alert('Something Went Wrong!');
          } else {
          }
        }
      });
}
