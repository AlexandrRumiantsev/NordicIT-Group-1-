var basket = {
    title: [],
    count : 0,
    size : 0, 
    price: 0,
    img: 0,
    itogSumm: function(){
        if(document.getElementById('summ').InnerText === undefined)
           document.getElementById('summ').InnerText = 0;
    }(),
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