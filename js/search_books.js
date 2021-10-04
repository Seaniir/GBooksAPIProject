var titleArray = new Array();
var authorsArray = new Array();
var imgArray = new Array();
var ISBNArray = new Array();
var ISBN10Array = new Array();
var ISBN13Array = new Array();
var arrayDiv = new Array();

$(document).ready(function() {
    $("#test").click(function() {
          var search = $("#books").val();
  
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
                          ISBNArray[j] = data.items[j].volumeInfo.industryIdentifiers;
                       }
                    console.log(data);
                    for(i = 0; i < data.items.length; i++)
                    {
                    title = $('<h5 class = "list-group-item w-25">' + data.items[i].volumeInfo.title + '</h5>');
                    author = $('<h5 class = "list-group-item w-25">' + data.items[i].volumeInfo.authors + '</h5>');
                    img = $('<img class = "" id = "dynamic" height =100px width = 50px><br><a href =' + data.items[i].volumeInfo.infoLink + '><button id ="imagebutton" class="btn red aligning">INFO</button></a>');
                      // Je charge les données dans box
                      if (data.items[i].volumeInfo.imageLinks === undefined) 
                      {
                          title = null;
                          author = null;
                          img = null;
                          url = null;
                      } 
                      else 
                      {
                          arrayDiv[i] = document.createElement('div');
                          arrayDiv[i].className = 'card w-25';
                          url = data.items[i].volumeInfo.imageLinks.thumbnail;
                          img.attr('src', url); //Attach the image url
                          title.appendTo(arrayDiv[i]);
                          author.appendTo(arrayDiv[i]);
                          img.appendTo(arrayDiv[i]);
                          document.body.append(arrayDiv[i]);
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