/**
 * Устанавливаем куки для пользователя, при аутентификации.
 * 
 * @param {String} str - строка с данными пользователя
 * @returns {boolean}
 */
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
 * 
 * @param null
 * @returns null
 */
function returnMainPage() {
    window.location.href = location.origin + '/basket/';
}

/**
 * Сокращение функции, для создания элемента
 * 
 * @param {string} elem - тип элемента
 * @returns null
 */
function createElem(elem) {
    return document.createElement(elem);
}
/**
 * Установка Cookie на странице.
 * 
 * @param {string} name - название куки
 * @param {number} value - значение куки
 * @returns null
 * 
 */
var TIME = 3 * 24 * 60 * 60 * 1000; //3 дня
function setCookie(name, value) {
    var time = new Date();
    time.setTime(Date.parse(time) + TIME);
    document.cookie = name + '=' + value + '; expires=' + time;
}

/**
 * Получение всех Cookies
 * 
 * @param null
 * @returns {String}
 */
function getCookiesAll() {
    var pairs = document.cookie.split(";");
    var cookies = {};
    for (var i = 0; i < pairs.length; i++) {
        var pair = pairs[i].split("=");
        cookies[(pair[0] + '').trim()] = unescape(pair.slice(1).join('='));
    }
    if (document.cookie == '') {
        return '';
    } else return cookies;
}

/**
 * Получение  Cookies по имени(name)
 * 
 * @param {string} name - название куки
 * @returns {String}
 */
function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

/**
 * Удаление всех  Cookies
 * 
 * @param null
 * @returns null
 */
function deleteAllCookies() {
    var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

/**
 * Функция для загрузки скриптов в основной файл JS
 * 
 * @param name - имя скрипта в папке view
 * @returns script -  строка подключения (tag)
 */
function loadScript(name) {
    let script = document.createElement('script');
    script.async = true;
    script.src = window.location.origin + "/frontend/" + name + ".js";
    document.body.appendChild(script);

    return script;
}

/**
 * Заготовка для перевода строки в формат - JSON
 * 
 * @param str - принимаемая строка JSON
 * @returns str -  обработанная строка JSON
 */
function IsJsonString(str) {
    return str;
}

/**
 * Заготовка для валидации строки в формате - JSON
 * 
 * @param str - принимаемая строка JSON
 * @returns bollean -  обработанная строка JSON
 */
function ValidateJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

/**
 * Перезагрузка текущей страницы
 * 
 * @param null
 * @returns null
 */
function reloadPage() {
    location.href = location.href;
    location.href = location.href;
}


/**
 * sendAJAX - отправка асинхронного запроса в контроллер
 * @param {*} action  - экшн контроллера, куда передается запрос
 * @param {*} type - данные для отправки
 * @param {*} form - форма для отпраки на сервер (по умолчанию пустая)
 */

function sendAJAX(action = '', type, form = 0) {
    var result = '';
    var http = new XMLHttpRequest();
    http.open(type, location.origin + '/controller.php', true);
    http.onreadystatechange = function() {
        result = http.response;
        if (result) {
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
    if (action == 'saveUser') {
        var action = `action=` + action + `&login=` + form.getElementsByTagName('input').login.value + `&password=` + form.getElementsByTagName('input').password.value + `&mail=` + form.getElementsByTagName('input').mail.value;
    } else if (action == 'loginUser') {
        console.log(result);
        console.log(IsJsonString(result));
        document.getElementById('overlay').remove();
        console.log('reloadPage');
        reloadPage();
        console.log(form);
        var action = `action=` + action + `&login=` + form.getElementsByTagName('input').login.value + `&password=` + form.getElementsByTagName('input').password.value;
    }else if(action == 'sessionStart'){
        console.log(getCookie('user'))
        console.log('sessionStart SEND');
        if(IsJsonString(getCookie('user'))=='true'){
             var action = `action=` + action + `&login=` + JSON.parse(getCookie('user')).login + `&password=` + JSON.parse(getCookie('user')).password;
        }
        document.getElementById('overlay').remove();
        var log = document.querySelector('#enter span');
        log.innerText = JSON.parse(getCookie('user')).login;
        log.id = 'log';
    }
  
    http.send(action);
}