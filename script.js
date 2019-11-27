//Эмитация контроллера, на основе анонимной функции
(function() {

  switch(window.location.pathname){
    case '/': 
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
              }
              this.parentElement.appendChild(exit);
            }
       });
    break;
    case '/category/details/':
        (function OnLoad() {
          var url = location.origin + '/model/goods.php';
           var http = new XMLHttpRequest();
           http.open('POST', url, true);
           var params = window.location.search.substr(1);     
           http.onreadystatechange = function() {
               if(http.readyState == 4 && http.status == 200) {
                var arr = JSON.parse(http.response);
                document.querySelector(".details-page__title h1").innerText = arr['title'];
                document.querySelector(".details-page__container-img img").src =  window.location.origin + '/img/catalog/' + arr['img'];
                document.querySelector(".container .details-page__price i").innerText =  arr['price'];                 
               }
           }
           http.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
           http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
           http.send(params);

        })();  
       console.log('Детализация товара');
    break;
    case '/basket/': 
       console.log('Корзина');
    break;
    case '/category/': 
        console.log('Список товаров по категории');
    break;
    }

})();


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
    
    
    
    setTimeout(returnMainPage, 2000);
    
  })
}

//События корзины
if(document.getElementById('add-container__plus')){
  document.getElementById('add-container__plus').addEventListener('click', function(){
     document.getElementById('add-container__number').innerText = Number(document.getElementById('add-container__number').innerText)+1;
  })
}
if(document.getElementById('add-container__plus')){
  document.getElementById('add-container__minuse').addEventListener('click', function(){
      if( Number(document.getElementById('add-container__number').innerText)-1 >= 0){
        document.getElementById('add-container__number').innerText = Number(document.getElementById('add-container__number').innerText)-1;
      }else alert('Меньше 0 нельзя купить');
  })
}
        var btn = document.getElementById('add_basket');
        if(btn){
          btn.onclick = function(event){
            event.stopPropagation();
            
            var http = new XMLHttpRequest();
                var url = '../model/basket.php';
                var title = document.getElementsByTagName('h1')[0].innerText; 
                var count = document.getElementById('add-container__number').innerText;  
                var size = document.querySelector('.details-page__size__item.active').innerText;
                var price =  document.getElementsByClassName('details-page__price')[0].innerText;
                var img =  document.querySelectorAll('.details-page__container-img img')[0].src;
                var params = "title="+title+"&count="+count+"&size="+size+"&price="+price+"&img="+img;
                
                
                
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


