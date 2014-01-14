window.fbAsyncInit = function() {
	FB.init({
		appId      : '706942112669859', // App ID
		channelUrl : '//socialmash.net84.net/jjdk/channel.php', // Channel File
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		frictionlessRequests : true, // enable frictionless requests		
		xfbml      : true  // parse XFBML
	});

	// Additional initialization code here

	//Next, find out if the user is logged in
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			var uid = response.authResponse.userID;
			accessToken = response.authResponse.accessToken;
//var fdata=" ";
		FB.api('/me/friends', function(response) {
        	if(response.data) {
            	$.each(response.data,function(index,friend) {
              	$('#friends').html("* Friend Name : "+friend.name+" ( ID : "+friend.id+" )");
				//$('#me').html(response);
				//fdata+=friend.name;
				//$("friend").append(fdata);
            });
			$("friend").html(fdata);
        } else {
            alert("Error!");
        }
    });
			FB.api('/me', function(info) {
				console.log(info);
				$('#welcome').html("Hello " + info.first_name+" "+info.middle_name+" "+info.last_name );
			});
			


		} else if (response.status === 'not_authorized') {
			//User is logged into Facebook, but not your App


			  var oauth_url = 'https://www.facebook.com/dialog/oauth/';
			  oauth_url += '?client_id=401236519908500'; //Your Client ID
			  oauth_url += '&redirect_uri=' + 'https://apps.facebook.com/myappsourcephp/'; //Send them here if they're not logged in
			  oauth_url += '&scope=user_about_me,email,user_location,user_photos,publish_actions,user_birthday,user_likes';
		
			  window.top.location = oauth_url;


		} else {
			// User is not logged into Facebook at all
			window.top.location ='https://www.facebook.com/index.php';
		} //response.status
	}); //getLoginStatus
}; //fbAsyncInit

// Load the JavaScript SDK Asynchronously
(function(d){
  var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
  js = d.createElement('script'); js.id = id; js.async = true;
  js.src = "//connect.facebook.net/en_US/all.js";
  d.getElementsByTagName('head')[0].appendChild(js);
}(document));
