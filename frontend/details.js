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
                document.querySelector(".container .details-page__discroption").innerText =  arr['discr'];                 
               }
           }
           http.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
           http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
           http.send(params);

       console.log('Детализация товара');

       var btn = document.getElementById('add_basket');
       if(btn){
         btn.onclick = function(event){
           event.stopPropagation();
           
           var http = new XMLHttpRequest();
               var url = window.location.origin + '/model/basket.php';
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
       
       
       Array.from(document.getElementsByClassName('details-page__size__item')).forEach(function(element){
        element.addEventListener('click' , function(){
              this.classList.toggle("active"); 
        })
    });       