var loggedIn = false;
$(document).ready(function(){
    $("#browseForm").submit(function(){
      $("#signIn").hide();
    });
    $("#loginBtn").click(function(){
        $("#signIn").show();
      });
  });