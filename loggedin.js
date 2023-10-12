var loggedIn = false;
$(document).ready(function(){
    $("#browseButton").click(function(){
      $("#signIn").hide();
    });
    $("#loginBtn").click(function(){
        $("#signIn").show();
      });
  });