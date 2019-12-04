Array.from(document.getElementsByClassName('goods-list__item')).forEach(function(element){
    element.onclick = function(){
      var id = JSON.parse(this.querySelector("div header").innerText)['id'];    
      window.open(window.location.origin += '/details?id=' + id);          
    };
});