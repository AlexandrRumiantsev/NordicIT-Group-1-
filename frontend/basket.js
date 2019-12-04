var basket = {
    title: [],
    count : 0,
    size : 0, 
    price: 0,
    img: 0,
    createParams:function(){
        console.log(this);
     },
     delGood:  function(id){
         console.log('delGood');
     },
     addCount:  function(){
      console.log('delGood');
     }
  }



  
 
  
  
  //События корзины
  
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