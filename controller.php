<?php
/**
 * Первая часть контроллера, 
 * которая перехватывает,
 * переданные в контроллер пост запросом, 
 * команды с индексом action
*/
  

if($_POST['action']){
    
    include_once(__DIR__.'/model/basket.php');
    include_once(__DIR__.'/model/goods.php');
    include_once(__DIR__.'/model/user.php');
    include_once(__DIR__.'/classes/SendMailSmtpClass.php');
    
    $USER = new user();
  
    switch ($_POST['action']){
        case 'sessionStart':
             session_start();
            //$obj = json_decode($_COOKIE["user"] , true);
            if($USER -> sessionStart());
                
        break;     
        case 'del':
            $res = new Basket($_POST['action'] , $_REQUEST['good']);
        break;

        case 'mail':
          
            $mail = $_REQUEST["to"];
            $title = 'Подписка на сайт SH';
            $message = "Поздравляем, вы подписались на обновления нашего сайта!";
            
            $mailSMTP = new SendMailSmtpClass('aleksandr.rumiantsev1111@yandex.ru', '*****', 'ssl://smtp.yandex.ru', 465, "UTF-8");
            
            // от кого
            $from = array(
                "Александр", // Имя отправителя
                "aleksandr.rumiantsev1111@yandex.ru" // почта отправителя
            );
 
             
            // отправляем письмо
            $result =  $mailSMTP->send($mail,  $title,  $message , $from); 
             
            if($result === true){
                echo "Done";
            }else{
                echo "Error: " . $result;
            }
          
        break;
        case 'detail':
            $goods = new goods();
            $item = $goods -> getItem($_POST['id']);
             while ($row = $item->fetch_assoc()) {
                 $JSON = json_encode($row);
                 echo "<script>var globalObject=".print_r($JSON)."</script>";
             }
        break;
        case 'saveUser':
            new User('reg'); 
        break;
        case 'loginUser':
            new User('autorize'); 
        break;
        case 'logoutUser':
             session_start();
             unset($_SESSION['user_data']);
        break;
        case 'addBasket':
           $basket = new Basket;
           $basket -> save($_REQUEST["basketItem"]);
        break;
        case 'newGood':
            $good = new goods;
            $good  -> save($_REQUEST["goodItem"]);
        break;
    }
}else{

    /**
     * Вторая часть контроллера, 
     * в которой происходит перехват страницы
     * (URL адреса), на которой, в текущий момент,
     * находится пользователь.
     * После перехвата страницы, 
     * происходит обработка данных,
     * для каждой страницы индивидуально.
    */

    $USER = new user();
    $goods = new goods();
    $User_session = (array) json_decode($_COOKIE['json']);
    session_start();
    $USER->session_start($User_session);
    switch ($_SERVER['REQUEST_URI']) {
        case '/':
            echo 'Главная';
            session_start();
            break;
        
        case '/category/':
            echo "<a href='../'> Главная </a>/ Категории";
            
             session_start();
            $array = $goods->getList();

            $title = "Все категории";
            render("category", $array, $title , $goods -> getPagination());
            break;
         
            case '/category/?page='.$_GET['page']:
                echo "<a href='../'> Главная </a>/ Категории";
            
                session_start();

                $array = $goods->getList();

                $title = "Все категории";
                render("category", $array, $title , $goods -> getPagination());
                break;    

        case '/category/?type=' . $_GET['type']:
     
            echo "<a href='../'>Главная</a> / <a href='../category/'> Категории </a>/  " . replacement($_GET['type']);
             session_start();
            
            $array = $goods->getCategory($_GET['type']);
            switch ($_GET['type']) {
                case 'woman':
                    $title = 'Женщинам';
                    break;
                case 'men':
                    $title = 'Мужчинам';
                    break;
                case 'children':
                    $title = 'Детям';
                    break;
                case 'new':
                    $title = 'Новинки';
                    break;
            }
            
            
            render("category", $array, $title , $goods -> getPagination());
            break;
            
            
         case '/category/?type=' . $_GET['type'].'&page='.$_GET['page']:
     
            echo "<a href='../'>Главная</a> / <a href='../category/'> Категории </a>/  " . replacement($_GET['type']);
             session_start();
            
            $array = $goods->getCategory($_GET['type']);
            switch ($_GET['type']) {
                case 'woman':
                    $title = 'Женщинам';
                    break;
                case 'men':
                    $title = 'Мужчинам';
                    break;
                case 'children':
                    $title = 'Детям';
                    break;
                case 'new':
                    $title = 'Новинки';
                    break;
            }
            
            
            render("category", $array, $title , $goods -> getPagination());
            break;    
            
            

        case '/basket/':
            echo "<a href='../'> Главная </a> / Корзина";
            session_start();
            $res = new Basket();
            $list = $res -> listDisplay();
            render("basket", $list);
            break;

        case '/details/?id=' . $_GET['id']:
            $server = $_SERVER["SERVER_NAME"];
            $result = $goods->getItem($_GET['id']);
             session_start();
            render("details" ,  $result );
            break;
        case '/admin/':
            echo "<a href='../'> Главная </a> / Административная панель";
             session_start();
            render("admin");
            break;    
    }

}




