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
function createElem(elem, id, className) {
    var elem = document.createElement(elem);
    if (id)
        elem.id = id;
    if (className)
        elem.className = className;
    return elem;
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
 * Создание спинера в JavaScript
 * 
 * @param null
 * @returns null
 */
var createSpiner = function() {
    var elemSpiner = {
        'overlay': createElem('div', 'overlay'),
        'lds': createElem('div', '', 'lds-ripple'),
        'ldsSubOne': createElem('div', ''),
        'ldsSubTwo': createElem('div', '')
    }


    var push = function() {
        elemSpiner.lds.appendChild(elemSpiner.ldsSubOne);
        elemSpiner.lds.appendChild(elemSpiner.ldsSubTwo);
        elemSpiner.overlay.appendChild(elemSpiner.lds);
        document.body.appendChild(elemSpiner.overlay);
    }()

}

var createActionAJAX = function(action , form = 0, data = '') {

    var result = '';
    switch (action) {
        case 'forgot':
            result = `action=` + action + `&email=` + data;
            break;   
        case 'saveUser':
            result = `action=` + action + 
                `&login=` + form.getElementsByTagName('input').login.value + 
                `&password=` + form.getElementsByTagName('input').password.value + 
                `&mail=` + form.getElementsByTagName('input').mail.value;
            break;
        case 'loginUser':
            document.getElementById('overlay').remove();
            //reloadPage();
            result = `action=` + action + `&login=` + form.getElementsByTagName('input').login.value + `&password=` + form.getElementsByTagName('input').password.value;
            break;
        case 'sessionStart':
            if (IsJsonString(getCookiesAll().user) != undefined) {
                var userData = JSON.parse(IsJsonString(getCookiesAll().user));
                result = `action=` + action + `&login=` + userData.login + `&password=` + userData.password;
            }
            document.getElementById('overlay').remove();
            var log = document.querySelector('#enter span');
            log.innerText = JSON.parse(IsJsonString(getCookiesAll().user)).login;
            log.id = 'log';
            break;
        case 'addBasket':
            result = `action=` + action + `&basketItem=` + JSON.stringify(data);
            break;
        case 'newGood':
            result = `action=` + action + `&goodItem=` + JSON.stringify(data);
            break;
        case 'mail':
            result = `action=` + action + `&to=` + form.getElementsByTagName('input').mail.value;
            break;
        case 'logoutUser':
            result = `action=logoutUser`;
            break;
        case 'delgood':
            result = `action=` + action + `&good=` + data;
            break;
        case 'zakaz':

            var formData = new FormData(form);
            var object = {};
            formData.forEach(function(value, key){
                object[key] = value;
                console.log(value);
            });
            var json = JSON.stringify(object);

            result = `action=` + action + `&json=` + JSON.stringify(data) + `&user_data=`+json;
            break;        
        default:
            console.log(action);
    }

    return result
}

/**
 * sendAJAX - отправка асинхронного запроса в контроллер
 * @param {*} action  - экшн контроллера, куда передается запрос
 * @param {*} type - данные для отправки
 * @param {*} form - форма для отпраки на сервер (по умолчанию пустая)
 */

function sendAJAX(action = '', type, form = 0, data = '', callback ) {

    console.log(action);
    var result = '';
    var http = new XMLHttpRequest();

    http.open(type, location.origin + '/controller.php', true);

    http.onreadystatechange = function() {
        result = http.response;
        console.log(result);
        if (result) {
            if (document.getElementById('overlay'))
                document.getElementById('overlay').remove();   
            if(result){
                
                callback(result);
            }else{
                
                callback('' );
            }   
            
        };
    }

    createSpiner();

    http.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    http.send(
        createActionAJAX(action , form , data )
    );
}