//https://developer.mozilla.org/en-US/docs/Web/API/Window/localStorage 
 function IsJsonString(str) {
                try {
                    setCookie('json', str);
                } catch (e) {
                    return false;
                }

                return 'true';
}
/**
  * Установка главной страницы сайта на позицию текущей.
 */
function returnMainPage(){
        window.location.href = location.origin + '/basket/';
}

function createElem(elem){
  return document.createElement(elem);
}
/**
  * Установка Cookie на странице.
  * 
  * @param {string} name - название куки
  * @param {number} value - значение куки
  * 
  */
var TIME = 3*24*60*60*1000; //3 дня
function setCookie (name, value) {
	var time = new Date();
	time.setTime(Date.parse(time) + TIME);
	document.cookie = name + '=' + value + '; expires=' + time;
}

function getCookiesAll(){
    var pairs = document.cookie.split(";");
    var cookies = {};
    for (var i=0; i<pairs.length; i++){
      var pair = pairs[i].split("=");
      cookies[(pair[0]+'').trim()] = unescape(pair.slice(1).join('='));
    }
    if(document.cookie==''){
      return '';
    }else return cookies;
  }

//https://learn.javascript.ru/cookie
function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

function deleteAllCookies() {
    var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

//Функция для загрузки скриптов в основной файл JS
function loadScript(name){
  let script = document.createElement('script');
  script.async = true;
  script.src = window.location.origin + "/frontend/" + name + ".js";
  document.body.appendChild(script);

  return script;
}

function IsJsonString(str) {           
  return str;
}

function ValidateJsonString(str) {
 try {
     JSON.parse(str);
 } catch (e) {
     return false;
 }
 return true;
}

function reloadPage() {
  location.href=location.href;
  location.href=location.href;
}


/**
 * 
 * @param {*} to  - урл отправки запроса
 * @param {*} params - данные для отправки
 * Образец:
 * var params = "title=" + title + "&count=" + count;
 * @param {*} type - тип запроса (POST, GET) 
 */
var successCallback = function(result) { 
    return result;
}

var errorCallback = function(e) { console.log(e); }

function sendAJAX( action , type , form=0 ) {
  var result = '';
  var http = new XMLHttpRequest();
  http.open(type, location.origin + '/controller.php' , true);
	http.onreadystatechange = function () {
		//if (http.readyState == 4 && http.status == 200) {
		        result = http.response;
		        if(result){
		            console.log(result)
		            document.getElementById('overlay').remove();
		        };
    }
  
    var overlay = document.createElement('div');
	overlay.id = 'overlay';

	var lds = document.createElement('div');
	lds.className = 'lds-ripple';

	var ldsSubOne = document.createElement('div');
	var ldsSubTwo = document.createElement('div');

	overlay.appendChild(lds);
	lds.appendChild(ldsSubOne);
   lds.appendChild(ldsSubTwo);
  
  document.getElementsByTagName('body')[0].appendChild(overlay);

  http.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  console.log(action);
  console.log(form);
  if(action=='saveUser'){
          var action = `action=` + action + `&login=` + form.getElementsByTagName('input').login.value + `&password=` + form.getElementsByTagName('input').password.value + `&mail=` + form.getElementsByTagName('input').mail.value;
  }else if(action=='loginUser'){
          console.log(result);
            console.log(IsJsonString(result));
            document.getElementById('overlay').remove();
            console.log('reloadPage');
            reloadPage();
          console.log(form);
          var action = `action=` + action + `&login=` + form.getElementsByTagName('input').login.value + `&password=` + form.getElementsByTagName('input').password.value;
  }

  http.send(action);
}

/*
function sendAJAX(to, data , type , nameParam) {

  var http = new XMLHttpRequest();

	http.open(type, to, true);

	http.onreadystatechange = function () {
		if (http.readyState == 4 && http.status == 200) {
			console.log(http.response);
			setTimeout(function () {
				document.getElementById('overlay').remove();
			}, 1000);
		}
	}

	var overlay = document.createElement('div');
	overlay.id = 'overlay';

	var lds = document.createElement('div');
	lds.className = 'lds-ripple';

	var ldsSubOne = document.createElement('div');
	var ldsSubTwo = document.createElement('div');

	overlay.appendChild(lds);
	lds.appendChild(ldsSubOne);
	lds.appendChild(ldsSubTwo);


	document.getElementsByTagName('body')[0].appendChild(overlay);

	//console.log('Начало отправки');
	http.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  //console.log(data);
  var params = nameParam + '=' + data;
  console.log(nameParam);


  http.send(params);

}
*/

        /* 
        Пример  анимированного перехода на страницу корзины
        (убрал тк вызывает глюк с авторизацией)
        
document.getElementById('SH').addEventListener('click', function(){
    console.log(location.origin);
    
    //анимации vanila js
    //https://developer.mozilla.org/en-US/docs/Web/API/Element/animate
      
    document.getElementsByTagName("body")[0].animate([ 
        { // Начало анимации
          opacity: 1,
        }, 
        { // Конец анимации
          opacity: 0,
        }
      ], 2000);
      
      function returnMainPage(){
        window.location.href = location.origin;
      }
      
      setTimeout(returnMainPage, 2000);
})
*/