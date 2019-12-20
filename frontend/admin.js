console.log('административная панель');
const adminPanel = {};
adminPanel.main = document.querySelector('.admin-panel');
adminPanel.file = document.querySelector('.admin-panel input[type=file]');
adminPanel.openFile = function(){
    this.main.querySelector('input[type=file]').click();
}
adminPanel.openFile = function(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.querySelector('.admin-panel__container-img img');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
}
adminPanel.dispacher = function(){

        this.main.querySelector('.admin-panel__container-img').addEventListener('click' , ()=>{
            alert('обработки нажатия по элементу');
            this.file.click();
            //Заготовка 
            console.log(this.file.value);
            var that = this;
            this.file.onchange = function(event){
                console.log('change');
                console.log(this.name);
                console.log(this.value);
                adminPanel.fileName = this.value.substring(this.value.lastIndexOf('/')+1 , this.value.length);
                console.log(document.querySelector('input[type=hidden]'));
                that.openFile(event)
            }
        });
        
        document.forms.save_good.onsubmit = function(e){
            console.log('form send save_good');
            e.stopPropagation(); 
           
             var valImg = adminPanel.fileName;
             var filename = valImg.match(/[^\\/]*$/)[0];
             
             var select = document.getElementsByName("type")[0];
             var value = select.value;
        
             var data = {
                        'img' : filename , 
                        'title' : document.getElementsByName('title')[0].value ,
                        'artikul' : document.getElementsByName('article')[0].value , 
                        'price' : document.getElementsByName('price')[0].value ,
                        'discription' : document.getElementsByName('discr')[0].value,
                        'type' : value
                    };
                    
             sendAJAX( "newGood" , 'POST', '' , data) ;
            
           return false
        }
        
}