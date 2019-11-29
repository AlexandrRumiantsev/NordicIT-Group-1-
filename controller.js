//Эмитация контроллера, на основе анонимной функции
(function() {
  
  loadScript('main');

  switch(window.location.pathname){
    case '/': 
       console.log('главная страница');
    break;
    case '/category/details/':
          loadScript('details');
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




document.addEventListener('DOMSubtreeModified', function(e){
    if(document.getElementById('overlay')){
        document.getElementById('overlay').addEventListener('click', function(e){
            if(e.target.id == 'overlay'){
                this.remove();
            }
        });
    }     
})    


