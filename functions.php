<?php
/**
 * 
 * Функция для передачи данных в шаблон и его отображение
 * 
 * @param string $view - выбор шаблона в папке view
 * @param array $arResult  - массив данных, передаваемых в шаблон
 * @param string $title - заголовок для шаблона категорий
 * @return null
 */
function render($view , $arResult='' , $title='' , $pagination=''){
    include_once(__DIR__."/header.php"); 
    include_once(__DIR__."/view/$view.php");
    include_once(__DIR__."/footer.php"); 
}

/**
 * 
 * Функция для отображения хлебных крошек
 * 
 * @param string $str - подстановка строки по коду из ГЕТ параметра в хлебную крошку.
 * @return string  - строка для хлебной крошки категории
 */
function replacement($str){
      switch($str){
          case "men":
            return "Мужчинам";
          break;

          case "woman":
            return "Женщинам";
          break;

          case "children":
            return "Детям";
          break;

          case "new":
            return "Новинки";
          break;
      }
}

/**
 * 
 * Функция для отравки письма на почту, через класс SendMailSmptClass
 * 
 * @param string 
 * @return string  
 */
function sendMail( $title ,  $message , $mail){
  
   //cc42915_magazine
   //INordicSchool

   //ПОдготовить тестовый яндекс мэйл
   $mailSMTP = new SendMailSmtpClass('tte577es7@yandex.ru', 'INordicSchool', 'ssl://smtp.yandex.ru', 465, "UTF-8");
            
   // от кого
   $from = array(
       "Александр", // Имя отправителя
       "tte577es7@yandex.ru" // почта отправителя
   );

   $result =  $mailSMTP->send($mail ,  $title,  $message , $from); 
             
   return $result;

}

function resultSucces(){
  echo "<script>alert('Вы успешно зарегестрировались. Письмо с подтверждением авторизации, отправлено вам на почту.')</script>";
}