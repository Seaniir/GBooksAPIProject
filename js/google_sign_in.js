var signedIn = false;

function signOut() 
{
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
    $.removeCookie('ID');
    window.location.href = "index.php";
  }

function onSignIn(googleUser) 
{
  if($.cookie("ID") == null)
{
  var profile = googleUser.getBasicProfile();
  document.cookie = "ID =" + profile.getId();
  updateUserData(profile);
}
}

function updateUserData(response) {
    console.log(response);
    $.ajax({
      type: "POST",
      dataType: 'json',
      data: response,
      url: 'php/check_user_and_save.php',
      success: function(msg) {
        if (msg.error == 1) {
          alert('Something Went Wrong!');
        } else {
          window.location.href = "index.php";
        }
      }
    });
  }

  function checkCookie() {
    if($.cookie("ID") == null)
    {
      return 0; 
    }
    else
    {
      return 1;
    }
  }