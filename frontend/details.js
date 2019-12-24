var detailGood = {
    'good_title': document.getElementsByTagName('h1')[0].innerText , 
    'good_size': "" , 
    'price': document.getElementsByClassName('details-page__price')[0].innerText ,
    'img': document.querySelectorAll('.details-page__container-img img')[0].src ,
    'count': document.getElementById('add-container__number').innerText,
    'article': document.querySelector('.details-page__artikul i').innerText,
    'discription': document.getElementsByClassName('details-page__discroption')[0].innerText,
    'add_basket': function(){
        console.log('add basket');
    },
    'set_size':function(){
         console.log('set_size');
    },
    'plus': function(){
         console.log('plus basket');
    },
    'minus': function(){
         console.log('minus basket');
    },
    'handlerEvents': function(){
        document.getElementsByTagName('h1')[0].onclick = function(){
            console.log('onclickTitle');
        }
        document.getElementById('add_basket').onclick = function(){
            console.log('add_basket');
            event.stopPropagation();
            event.stopPropagation();
            if(
               document.getElementById('log') && 
               document.querySelectorAll('.container.details-page__size__item.active')[0] && 
               document.getElementById('add-container__number').innerText > 0
               ){
                    var data = {
                        'img' : document.querySelectorAll('.details-page__container-img img')[0].src , 
                        'title' : document.querySelectorAll('.details-page__title h1')[0].innerText ,
                        'artikul' : document.querySelectorAll('.details-page__artikul i')[0].innerText , 
                        'price' : document.querySelectorAll('.details-page__price i b')[0].innerText ,
                        'discroption' : document.querySelectorAll('.details-page__discroption')[0].innerText,
                        'user' : document.getElementById('log').innerText,
                        'size' : document.querySelectorAll('.container.details-page__size__item.active')[0].innerText,
                        'count' :document.getElementById('add-container__number').innerText
                    };
            sendAJAX( "addBasket" , 'POST', '' , data) ;
            }else alert('ОШИБКА!')
        }
        
        
        Array.from(document.getElementsByClassName('details-page__size__item')).forEach(function(element) {
            element.addEventListener('click', function() {
                this.classList.toggle("active");
            })
        });
        
        if (document.getElementById('add-container__plus')) {
            document.getElementById('add-container__plus').addEventListener('click', function() {
                document.getElementById('add-container__number').innerText = Number(document.getElementById('add-container__number').innerText) + 1;
            })
        }
        if (document.getElementById('add-container__plus')) {
            document.getElementById('add-container__minuse').addEventListener('click', function() {
                if (Number(document.getElementById('add-container__number').innerText) - 1 >= 0) {
                    document.getElementById('add-container__number').innerText = Number(document.getElementById('add-container__number').innerText) - 1;
                } else alert('Меньше 0 нельзя купить');
            })
        }
    }    
}
console.log('Детализация товара');