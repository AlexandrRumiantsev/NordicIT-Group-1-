Array.from(document.getElementsByClassName('details-page__size__item')).forEach(function(element){
    element.addEventListener('click' , function(){
      this.classList.toggle("active");
    })
});

if(document.getElementById('title_basket') != null){
  document.getElementById('title_basket').addEventListener('click' , function(){
    document.getElementsByTagName("body")[0].animate([ 
      { 
        opacity: 1,
      }, 
      { 
        opacity: 0,
      }
    ], 1000);
    
    function returnMainPage(){
      window.location.href = location.origin + '/basket/';
    }
    
    setTimeout(returnMainPage, 2000);
    
  })
}

//События корзины
document.getElementById('add-container__plus').addEventListener('click', function(){
     document.getElementById('add-container__number').innerText = Number(document.getElementById('add-container__number').innerText)+1;
})
document.getElementById('add-container__minuse').addEventListener('click', function(){
    if( Number(document.getElementById('add-container__number').innerText)-1 >= 0){
      document.getElementById('add-container__number').innerText = Number(document.getElementById('add-container__number').innerText)-1;
    }else alert('Меньше 0 нельзя купить');
    
})
        var btn = document.getElementById('add_basket');
        btn.onclick = function(event){
          event.stopPropagation();
          
          var http = new XMLHttpRequest();
               var url = '../model/basket.php';
               var title = document.getElementsByTagName('h1')[0].innerText; 
               var count = document.getElementById('add-container__number').innerText;  
               var size = document.querySelector('.details-page__size__item.active').innerText;
               var price =  document.getElementsByClassName('details-page__price')[0].innerText;
               var params = "title="+title+"&count="+count+"&size="+size+"&price="+price;
               
              
               
               http.open('POST', url, true);
               
               http.onreadystatechange = function() {
                   if(http.readyState == 4 && http.status == 200) {
                       console.log(http.response);
                       setTimeout(function(){
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

               console.log('Начало отправки');
               http.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
               http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
               http.send(params);
        }




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

document.getElementById('enter').addEventListener('click', function(){
    let overlay = document.createElement('div');
    overlay.id = 'overlay';
    
    let form = document.createElement('form');
    form.id = 'form-reg';

    form.addEventListener('submit', function(e) {
        e.preventDefault();

                /*
                AJAX VANILA JS
                https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX/Getting_Started
                */
              
            
               var http = new XMLHttpRequest();
               var url = './model/user.php';
               var params = 'orem=ipsum&name=binny';
               http.open('POST', url, true);

               var formData = new FormData(document.getElementById("form-reg"));
               
               //http.setRequestHeader('Content-type', 'multipart/form-data');
               
               http.onreadystatechange = function() {
                   if(http.readyState == 4 && http.status == 200) {
                       console.log(http.responseText);
                       console.log('Конец отправки');
                       document.getElementById('overlay').remove();
                   }
               }

               console.log('Начало отправки');
               http.send(formData);

                        return false;
                });

    overlay.appendChild(form);
    
    let titleH1 = document.createElement('h1');
    titleH1.innerText = 'Регистрация';

    let inputLogin = document.createElement('input');
    inputLogin.name = 'login';
    inputLogin.id = 'inputLogin';
    inputLogin.placeholder = 'Логин';

    let inputPassword = document.createElement('input');
    inputPassword.name = 'password';
    inputPassword.id = 'inputPassword';
    inputPassword.type = 'password';

    let inputMail= document.createElement('input');
    inputMail.name = 'mail';
    inputMail.id = 'inputMail';
    inputMail.placeholder= 'Email';

    let inputSbm= document.createElement('input');
    inputSbm.type = 'submit';
    inputSbm.id = 'submit';
    inputSbm.value = 'Зарегистрироваться';

    let inputAutorize= document.createElement('span');
    inputAutorize.id = 'autorize';
    inputAutorize.innerText = 'Авторизация';

    inputAutorize.onclick = function(){
      //alert('Авторизация');
      var form_autorize = document.getElementById('form-reg');
      form_autorize.appendChild(inputLogin);
      form_autorize.appendChild(inputPassword);
      form_autorize.appendChild(inputSbm);
    }
    
    form.appendChild(titleH1);
    form.appendChild(inputLogin);
    form.appendChild(inputPassword);
    form.appendChild(inputMail);
    form.appendChild(inputAutorize);
    form.appendChild(inputSbm);
    document.getElementsByTagName('body')[0].appendChild(overlay);
        })


document.addEventListener('DOMSubtreeModified', function(e){
    if(document.getElementById('overlay')){
        document.getElementById('overlay').addEventListener('click', function(e){
            if(e.target.id == 'overlay'){
                this.remove();
            }
        });
    }     
})    


