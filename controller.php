<?php
/**
 * Первая часть контроллера, 
 * которая перехватывает,
 * переданные в контроллер пост запросом, 
 * команды с индексом action
*/
include_once(__DIR__.'/functions.php');
include_once(__DIR__.'/autoload.php');

if($_POST['action']){
   
    include_once(__DIR__.'/classes/SendMailSmtpClass.php');
    
    $USER = new User();
  
    switch ($_POST['action']){
        case 'sessionStart':
             session_start();
            if($USER -> sessionStart());
                
        break;     
        case 'delgood':
            $res = new Basket($_POST['action'] , $_REQUEST['good']);
        break;

        case 'mail':
          
            $mail = $_REQUEST["to"];
            $title = 'Подписка на сайт SH';
            $message = "Поздравляем, вы подписались на обновления нашего сайта!";
            
            $result = sendMail( $title ,   $message , $mail );
 
        
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
           
            $mail = $_REQUEST['mail'];
            $title = 'Подтвердите регистрацию на сайте SH';
            
            $ref = $_SERVER['HTTP_REFERER'];
            $message =  "<a href='http://localhost:8888/accept/?mail={$mail}'>  Подтвержить регистрацию </a>";

            $result = sendMail( $title ,   $message , $mail );
 
             
            // отправляем письмо
    
             
            if($result === true){
                echo "Done";
                new User('reg'); 
            }else{
                echo "Error: " . $result;
            }
            
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
        case 'zakaz':
            $arrData = json_decode($_REQUEST['json']);
            $userData = json_decode($_REQUEST['user_data']);
            $message = '';

            $title = 'Ваш заказ на сайте SH';
            
            $ref = $_SERVER['HTTP_REFERER'];
            $message .= '<table>';
            $message .= '<tr>
                            <td> Изображение </td>
                            <td> Название </td>
                            <td> Цена </td>
                            <td> Размер </td>
                            <td> Количество </td>
                        </tr>>';
        
            foreach ( $arrData as $item) {
                $img = $item -> src;
                $message .= "
                    <tr>
                    <td><img src=' ".$img."'/></td>
                    <td>"  .$item -> title ."</td>
                    <td>"  .$item -> price  ."</td>
                    <td>"  .$item -> size  ."</td>
                    <td>"  .$item -> count ."</td>
                    </tr>
                ";
            }

            $message .= '</table>';
            $result = sendMail( $title ,  $message , $userData->mail );
        

        break;

        case 'forgot':
            $user = new User;
            $data = $user -> forgot($_REQUEST['email']); 
           
            $name =  $data['name'] ;
             $log =  $data['login']  ;
            $password =  $data['password'];
            $message = "Уважаемый $name, Учетные данные от сайта SH. ваш логин = $log, ваш пароль = $password";
            //ПОдготовить тестовый яндекс мэйл
            $result = sendMail( 'Ваш пароль от сайта' ,  $message , $data['mail'] );
        
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
        case '/accept/?mail='.$_REQUEST['mail']:
            echo 'Подтверждение мэйла';
            $USER->accept($_REQUEST['mail']);
            break;
        case '/category/':
            echo "<a href='../'> Главная </a>/ Категории";
            var_dump($_SESSION);
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