function grantCheevo(id) {
  $.ajax({
    url: 'http://localhost/~mwawro/game/?action=graph&uid='+userID+'&what=grant_cheevo&cheevo='+id,
    success: function( data ) {
      if (console && console.log){
        console.log( 'Sample of data:', data.slice(0,100) );
      }
    }
  });
}

function removeCheevo(id) {
  $.ajax({
    url: 'http://localhost/~mwawro/game/?action=graph&uid='+userID+'&what=remove_cheevo&cheevo='+id,
    success: function( data ) {
      if (console && console.log){
        console.log( 'Sample of data:', data.slice(0,100) );
      }
    }
  });
}

FB.init(
  {appId: 193092110746101,
   status: true,
   cookie: true});

function login_response_validate(perms_string, response){
  if (!response.session) {
    return false;
  }
  var perms = perms_string.split(',');
  for(var i = 0; i < perms.length; ++i) {
    var k = perms[i];
    if (-1 == response.perms.indexOf(k))
      return false;
  }
  return true;
}

FB.getLoginStatus(
  function(response) {
    console.log(response);
    if (login_response_validate('publish_stream,publish_actions',response)) {
      userID = FB._session.uid;
    } else {
      fb_logged_in = false;
      FB.login(
        function(response) {
          if (response.session) {
            on_logged_in();
          } else {
            console.log('failed to log in');
          }
        },
        {perms:'publish_stream,publish_actions'}
      );
    }
  }
);

