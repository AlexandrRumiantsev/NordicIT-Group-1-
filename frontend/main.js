var User = {
    'registration' : function(){
        console.log('Регистрация');
    },
    'authorization' : function(){
         console.log('Авторизация');
    },
    'sessionStart' : function(){
         console.log('sessionStart');
         sendAJAX( "sessionStart" , 'POST') ;
    },
    'logout' : function(){
        console.log('logout');
    }
}



console.log('главная страница');

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

      setTimeout(returnMainPage, 2000);
      
    })
  }




if (document.getElementById('log'))
    document.getElementById('log').addEventListener('click', function(e) {
        e.stopPropagation();
        if (this.classList[0] == "active") {
            console.log(this.classList[0]);
            document.getElementById('ext').remove();
            document.getElementById('adm').remove();
            this.classList = "";
        } else {
            this.classList.toggle("active");

            var exit = createElem('p');
            exit.innerText = 'выйти';
            exit.id = 'ext';

            var adm = createElem('p');
            adm.innerText = 'админка';
            adm.id = 'adm';

            exit.onclick = function(e) {
                e.stopPropagation();
                setCookie('user', '');
                reloadPage();
            }

            adm.onclick = function(e) {
                e.stopPropagation();
                console.log('adm');
            }

            var menu = createElem('div');
            menu.id = 'menu';

            menu.appendChild(exit);
            menu.appendChild(adm);

            this.parentElement.appendChild(menu);
        
        }
    });






document.getElementById('SH').addEventListener('click', function() {
    console.log(location.origin);

    //анимации vanila js
    //https://developer.mozilla.org/en-US/docs/Web/API/Element/animate

    document.getElementsByTagName("body")[0].animate([{ // Начало анимации
            opacity: 1,
        },
        { 
            opacity: 0,
        }
    ], 2000);

    function returnMainPage() {
        window.location.href = location.origin;
    }

    setTimeout(returnMainPage, 2000);
})

//var formData = new FormData(document.getElementById("form-reg"));
 
document.getElementById('enter').addEventListener('click', function() {
    var overlay = document.createElement('div');
    overlay.id = 'overlay';

    var form = document.createElement('form');
    form.id = 'form-reg';

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (this.querySelector('h1').innerText == 'Авторизация') {
            console.log('Авторизация');
            sendAJAX( "action=loginUser" , 'POST' , this ) ;
        } else {
            sendAJAX( "action=saveUser" , 'POST' , this ) ;
        }
        return false;
    });

    overlay.appendChild(form);

    let titleH1 = createElem('h1');
    titleH1.innerText = 'Регистрация';
    
    let inputLogin = document.createElement('input');
    inputLogin.name = 'login';
    inputLogin.id = 'inputLogin';
    inputLogin.placeholder = 'Логин';

    let inputPassword = document.createElement('input');
    inputPassword.name = 'password';
    inputPassword.id = 'inputPassword';
    inputPassword.type = 'password';

    let inputMail = document.createElement('input');
    inputMail.name = 'mail';
    inputMail.id = 'inputMail';
    inputMail.placeholder = 'Email';

    let inputSbm = document.createElement('input');
    inputSbm.type = 'submit';
    inputSbm.id = 'submit';
    inputSbm.value = 'Зарегистрироваться';

    let inputAutorize = document.createElement('span');
    inputAutorize.id = 'autorize';
    inputAutorize.innerText = 'Авторизация';

    inputAutorize.onclick = function() {
        
        form.classList.add("disable");
        
        var title = document.createElement('h1');
        title.id = 'title';
        title.innerText = 'Авторизация';
        var hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = 'autorize';
        hidden.value = 'true';
        var form_autorize = document.createElement('form');
        form_autorize.id = 'form-autorize';
        form_autorize.innerHTML = '';
        form_autorize.appendChild(title);
        form_autorize.appendChild(inputLogin);
        form_autorize.appendChild(inputPassword);
        form_autorize.appendChild(hidden);
        form_autorize.appendChild(inputSbm);
        document.getElementById('overlay').appendChild(form_autorize);
        form_autorize.onsubmit = function(){
            console.log('АВТОРИЗААЦИЯ');
            sendAJAX( "loginUser" , 'POST' , this ) ;
            return false;
        }
        form_autorize
    }

    form.appendChild(titleH1);
    form.appendChild(inputLogin);
    form.appendChild(inputPassword);
    form.appendChild(inputMail);
    form.appendChild(inputAutorize);
    form.appendChild(inputSbm);
    document.getElementsByTagName('body')[0].appendChild(overlay);
})


document.addEventListener('DOMSubtreeModified', function(e) {
    if (document.getElementById('overlay')) {
        document.getElementById('overlay').addEventListener('click', function(e) {
            if (e.target.id == 'overlay') {
                this.remove();
            }
        });
    }
})


if(document.getElementById('mail_send')){
   document.getElementById('mail_send').onsubmit = function(){
        var email = this.querySelector('input[type=text]').value;
        sendAJAX( 'action=mail&to='+email , 'POST');
        return false;
    } 
}
    
    