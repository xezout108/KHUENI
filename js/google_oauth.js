// 명현 :: 리디렉션 URL 바꾸려면 밑에 다 바꾸고 https://console.developers.google.com/apis/credentials?project=g-g-s-188208 여기서도 바꿔 

var name; 	// default로 undefined
var email; 	// default로 undefined
var domain; // default로 undefined	
var thumbnail;  // default로 undefined

var href= window.location.href;

var clientId = "668435288404-72qmj4hgkrkc301c61hok986n20cd40b.apps.googleusercontent.com";
var redirectUrl = "http://xn--2j1b42z.com/khueni/pages/ggs_1.php";


if ( href.indexOf('127') !== -1 ) // 개발서버이다.
{
	clientId = 'dev (donnot care)';
	redirectUrl = 'http://dev (donnot care)';
}
else if ( href.indexOf('mooo.com') !== -1) // Google api 콘솔에서 등록한 도메인, 당연히 3개의 도메인 일치해야 한다. 
{ 
	clientId = '668435288404-72qmj4hgkrkc301c61hok986n20cd40b.apps.googleusercontent.com';
	redirectUrl = 'http://xn--2j1b42z.com/khueni/pages/ggs_1.php';
}
else // 그외
{ 
	clientId = '668435288404-72qmj4hgkrkc301c61hok986n20cd40b.apps.googleusercontent.com';
	redirectUrl = 'http://xn--2j1b42z.com/khueni/pages/ggs_1.php';
}

//console.log('google client Id   : ' + clientId);
//console.log('google redirectUrl : ' + redirectUrl);

hello.init(
	{google: clientId}, 
	{redirect_uri: redirectUrl} 
);

var accessToken;

//*********************
var myRedirect = function(redirectUrl, arg1, value1, arg2, value2) {
	var form = $('<form action="' + redirectUrl + '" method="post">'
		+ '<input type="hidden" name="'+ arg1 +'" value="' + value1 + '"></input>' 
		+ '<input type="hidden" name="'+ arg2 +'" value="' + value2 + '"></input>' 
		+ '</form>');
	$('body').append(form);
	$(form).submit();
};
//*********************

function login(){
	hello('google').login({scope: 'email'}).then(function(auth) {
		hello(auth.network).api('/me').then(function(r) {
			//console.log(JSON.stringify(auth));
			accessToken = auth.authResponse.access_token;
			//console.log(accessToken);
			getGoogleMe();
		});
	});
}
	    
function setDevMode(){
	name 	= 'dev';
	email 	= 'a@a.com';
	domain	= 'a.com';
	thumbnail = 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50';
}

function getGoogleMe(){
	hello('google').api('me').then(
		function(json) {
			//console.log(JSON.stringify(json));
			name = json.name;
    		email = json.email;
    		domain = json.domain;
    		thumbnail = json.thumbnail;
			console.log('name   : ' + name);
    		console.log('email  : ' + email);
    		console.log('domain : ' + domain);
    		console.log('thumbnail : ' + thumbnail);
    		//gotoMain(json.name, json.email);	// 명현 :: 데이터 받아왔으면 로그인 성공 후 페이지에 전달하기
    		myRedirect("http://xn--2j1b42z.com/khueni/", "name", name, "email", email);
    		loginComplete();// JSNI에 정의 되어있다.
		}, 
		function(e) {
    		console.log('me error : ' + e.error.message);
    	}
    );
}
function logout(){
	hello('google').logout().then(
		function() {
			console.log('logout');
		},
		function(e) {
			console.log('Signed out error: ' + e.error.message);
    	}
    );
}

function gotoMain(args_name, args_email)
{
	/*var redirect = 'http://xn--2j1b42z.com/khueni/pages/ggs_1.php';
	$.redirectPost(redirect, {name: args_name, email: args_email});

	console.log('[this is gotoMain() func]');
	console.log('json.name : ' + args_name);
	console.log('json.email : ' + args_email);

	// jquery extend function
	$.extend( {
		redirectPost: function(location, args) {
			console.log('this is jquery.redirect.js');
		    var form = '';
		    $.each( args, function( key, value ) {
		        value = value.split('"').join('\"')
		        form += '<input type="hidden" name="'+key+'" value="'+value+'">';
		    });
		    console.log('form : ' + form);
		    $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo($(document.body)).submit();
		}
	});*/
	
}