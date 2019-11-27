/**
  * Установка главной страницы сайта на позицию текущей.
 */
function returnMainPage(){
        window.location.href = location.origin + '/basket/';
}

/**
  * Установка Cookie на странице.
  * 
  * @param {number} name - название куки
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

 