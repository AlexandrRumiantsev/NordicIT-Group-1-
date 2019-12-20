var User = {
    'menu': function(){
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
                    console.log('logout');
                  
                    //if(deleteAllCookies())
                        var res = sendAJAX('action=logoutUser', 'POST');
                        if(res)
                            deleteAllCookies()
                    //reloadPage();
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
    },
    'createRegForm': function(){
        console.log('createLoginForm');
         var overlay = document.createElement('div');
         overlay.id = 'overlay';
    
        var form = document.createElement('form');
        form.id = 'form_reg';
    
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (this.querySelector('h1').innerText == 'Авторизация') {
                console.log('Авторизация');
                sendAJAX( "loginUser" , 'POST' , this ) ;
            } else {
               
                sendAJAX( "saveUser" , 'POST' , this ) ;
            }
            return false;
        });
    
      
    
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
    
        var inputAutorize = document.createElement('span');
        inputAutorize.id = 'autorize';
        inputAutorize.innerText = 'Авторизация';
        inputAutorize.onclick = ()=> {
            this.createLogForm();
        }
        
        form.appendChild(titleH1);
        form.appendChild(inputLogin);
        form.appendChild(inputPassword);
        form.appendChild(inputMail);
        form.appendChild(inputSbm);
        form.appendChild(inputAutorize);
        overlay.appendChild(form);
        overlay.appendChild(form);
        return overlay;
    },
    'login': function(){
        
        document.getElementById('enter').addEventListener('click', ()=> {
            document.body.appendChild( this.createRegForm() );
        });
        
    },
    'createLogForm' : function(){
            document.forms.form_reg.remove();
            
            var title = document.createElement('h1');
            title.id = 'title';
            title.innerText = 'Авторизация';
            var hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'autorize';
            hidden.value = 'true';
            var form_autorize = document.createElement('form');
            
            var inputLogin = document.createElement('input');
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
            inputSbm.value = 'Войти';
            
            
            var inputAutorize = document.createElement('span');
            inputAutorize.id = 'autorize';
            inputAutorize.innerText = 'Регистрация';
            inputAutorize.onclick = ()=> {
                console.log(this.createRegForm());
            }
                
            form_autorize.id = 'form_autorize';
            form_autorize.innerHTML = '';
            form_autorize.appendChild(title);
            form_autorize.appendChild(inputLogin);
            form_autorize.appendChild(inputPassword);
            form_autorize.appendChild(hidden);
            form_autorize.appendChild(inputSbm);
            form_autorize.appendChild(inputAutorize);
            
        
            document.getElementById('overlay').appendChild(form_autorize);
            form_autorize.onsubmit = function(){
                console.log('АВТОРИЗААЦИЯ');
                sendAJAX( "loginUser" , 'POST' , this ) ;
                return false;
            }
            console.log(form_autorize);
            return form_autorize;
    },
    'sessionStart' : function(){
         console.log('sessionStart');
         sendAJAX( "sessionStart" , 'POST') ;
    },
    'logout' : function(){
        console.log('logout');
        sendAJAX( "logoutUser" , 'POST') ;
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
    
    