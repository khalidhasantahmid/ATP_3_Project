//Svar fs = require("fs");
var base64ToImage = require('./base64-to-image');
function sendData()
{
alert("aschi");
	//var filepath="/assets/mk/name.png";
	//var CF=JSON.stringify(canvas);
		
 var dataURL = canvas.toDataURL();
var base64Str = dataURL;
var path="/assets/mk/";
var optionalObj = {'fileName': 'kamKor', 'type':'png'};
var imageInfo = base64ToImage(base64Str,path,optionalObj);
alert(imageInfo);
}

