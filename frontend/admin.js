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
        document.getElementById('load_file').addEventListener('click' , ()=>{
           
            var file_data = $('#pic').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);

            $.ajax({
                    url         : '../fileUpload.php',     
                    dataType    : 'text',          
                    cache       : false,
                    contentType : false,
                    processData : false,
                    data        : form_data,                         
                    type        : 'post',
                    success     : function(output){
                        console.log(output);
                        alert('Изображение успешно добавлено');
                    }
             });
             
             $('#pic').val('');        
             
        });
        this.main.querySelector('.admin-panel__container-img').addEventListener('click' , ()=>{
            alert('обработки нажатия по элементу');
            this.file.click();
            //Заготовка 
            console.log(this.file.value);
            var that = this;
            this.file.onchange = function(event){
                adminPanel.objFile = this.files;
                adminPanel.fileName = this.value.substring( this.value.lastIndexOf('/')+1 , this.value.length);
                console.log(document.querySelector('input[type=hidden]'));
                that.openFile(event)
            }
        });
        
        document.forms.save_good.onsubmit = function(e){
            console.log('form send save_good');
            e.stopPropagation(); // остановка всех текущих JS событий
	        e.preventDefault();  // остановка дефолтного события для текущего элемента - клик для <a> тега

           
             var valImg = adminPanel.fileName;
             var filename = valImg.match(/[^\\/]*$/)[0];
             
             var select = document.getElementsByName("type")[0];
             var value = select.value;
             
             var form = new FormData();  
             console.log(adminPanel.objFile[0]);
             //adminPanel.objFile[0]
             form.append( 'my_file_upload', 1 );
             form.append( 0 , adminPanel.objFile[0] );
             
             var data = {
                        'img' : filename , 
                        'title' : document.getElementsByName('title')[0].value ,
                        'artikul' : document.getElementsByName('article')[0].value , 
                        'price' : document.getElementsByName('price')[0].value ,
                        'discription' : document.getElementsByName('discr')[0].value,
                        'type' : value
                    };
                    
             sendAJAX( "newGood" , 'POST', form , data) ;
            
           return false;
        }
        
}