
       console.log('главная страница');
       if(window.getCookiesAll()['json']){
         console.log('User cookie');
       }
       if(document.getElementById('log'))
          document.getElementById('log').addEventListener('click' , function(e){
            e.stopPropagation();
            if(this.classList[0] == "active"){
              console.log( this.classList[0] );
              document.getElementById('ext').remove();
              this.classList = "";
            }else{
              this.classList.toggle("active");
              var exit = document.createElement('p');
              exit.innerText = 'выйти';
              exit.id = 'ext';
              exit.onclick = function(e){
                e.stopPropagation();
                console.log('ext');
                setCookie('json' , '') ;
                reloadPage();
              }
              this.parentElement.appendChild(exit);
              
            }
       });

       Array.from(document.getElementsByClassName('category-page__goods-list__item')).forEach(function(element){
  
  
        element.onclick = function(){
          var id = JSON.parse(this.querySelector("div header").innerText)['id'];    
          window.open(window.location.href += 'details?id=' + id);          
        };
        
      
      });
      
      Array.from(document.getElementsByClassName('del-item-basket')).forEach(function(element){
        element.onclick = function(){
             alert('Удалить товар');
        };
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
          
          
          
          setTimeout(returnMainPage, 2000);
          
        })
      }
      
      //События корзины
      
              
      
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
              if(this.querySelector('h1').innerText == 'Авторизация'){
                  console.log('Авторизация');
                  var http = new XMLHttpRequest();
                     var url = window.location.origin + '/model/user.php';
                     var params = 'orem=ipsum&name=binny';
                     http.open('POST', url, true);
      
                     var formData = new FormData(document.getElementById("form-reg"));
                     
                     //http.setRequestHeader('Content-type', 'multipart/form-data');
                     function IsJsonString(str) {
                          try {
                              setCookie('json' , str);
                          } catch (e) {
                              return false;
                          }
      
                          return 'true';
                      }
                     http.onreadystatechange = function() {
                         if(http.readyState == 4 && http.status == 200) {
                          
                          console.log(IsJsonString(http.responseText));
                    
      
                             
                             console.log('Конец отправки');
                             document.getElementById('overlay').remove();
                             reloadPage();
                         }
                     }
      
                     console.log('Начало отправки');
                     http.send(formData);
              }else{
                      /*
                      AJAX VANILA JS
                      https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX/Getting_Started
                      */
                     console.log('Регистрация');
                    
                  
                     var http = new XMLHttpRequest();
                     var url = window.location.origin + '/model/user.php';
                     var params = 'orem=ipsum&name=binny';
                     http.open('POST', url, true);
      
                     var formData = new FormData(document.getElementById("form-reg"));
                     
                     //http.setRequestHeader('Content-type', 'multipart/form-data');
                     
                     http.onreadystatechange = function() {
                         if(http.readyState == 4 && http.status == 200) {
                             console.log(http.responseText);
                             console.log(http);
                             console.log('Конец отправки');
                             document.getElementById('overlay').remove();
                         }
                     }
      
                     console.log('Начало отправки');
                     http.send(formData);
              }
      
                      
      
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
            var title = document.createElement('h1');
            title.id = 'title';
            title.innerText = 'Авторизация';
            var hidden =  document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'autorize';
            hidden.value = 'true';
            var form_autorize = document.getElementById('form-reg');
            form_autorize.innerHTML = '';
            form_autorize.appendChild(title);
            form_autorize.appendChild(inputLogin);
            form_autorize.appendChild(inputPassword);
            form_autorize.appendChild(hidden);
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