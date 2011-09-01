siteAddress = '';

function doLog(message) {
  message = message.replace(/<br>/g, '\n');
  if (message.substr(-1) != '\n') {
    message += '\n';
  }
  $('#logs').html($('#logs').html() + message);
  $("#logs").scrollTop(99999);  
}

function grantCheevo(id) {
  $.ajax({
    url: siteAddress + '?action=graph&uid='+userID+'&what=grant_cheevo&cheevo='+id,
    success: function( data ) {
      doLog(data);
    }
  });
}

function removeCheevo(id) {
  $.ajax({
    url: siteAddress + '?action=graph&uid='+userID+'&what=remove_cheevo&cheevo='+id,
    success: function( data ) {
      doLog(data);
    }
  });
}

function reregisterCheevos(dom) {
  document.getElementById('reregisterButton').setAttribute('onclick', '');
  $('#reregisterButton').val('This will take about 15 seconds...');

  $.ajax({
    url: siteAddress + '?action=graph&what=reregister&sub='+dom,
    success: function( data ) {
      doLog(data);
      $('#reregisterButton').val('Done.');
    }
  });
}

function sendRequests(){
  FB.ui({method: 'apprequests', message: 'You should learn more about this awesome game.', data: 'tracking information for the user'});
}

function onUrl(data) {
  console.log(data.path);
  $('#inlineContainer').attr('src', data.path.substr(1));
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

FB.Canvas.setUrlHandler(onUrl);

$('#inlineContainer').load(function() {
  $(this).slideDown().delay(2000).fadeOut();
});
