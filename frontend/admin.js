console.log('административная панель');
const adminPanel = {};
adminPanel.main = document.querySelector('.admin-panel');
adminPanel.file = document.querySelector('.admin-panel input[type=file]');
adminPanel.openFile = function(){
    this.main.querySelector('input[type=file]').click();
}
adminPanel.dispacher = function(){

        this.main.querySelector('.admin-panel__container-img').addEventListener('click' , ()=>{
            alert('обработки нажатия по элементу');
            this.file.click();
            //Заготовка 
            console.log(this.file.value);
        });
}