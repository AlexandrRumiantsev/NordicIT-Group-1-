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
    $USER = new user();
  
    switch ($_POST['action']){
        case 'sessionStart':
             session_start();
            //$obj = json_decode($_COOKIE["user"] , true);
            if($USER -> sessionStart());
                var_dump($_SESSION);
        break;     
        case 'del':
            $res = new Basket($_POST['action'] , $_REQUEST['good']);
        break;

        case 'mail':
            $mail = $_REQUEST["to"];
            echo $mail;
            $title = 'Подписка на сайт SH';
            $message = `Поздравляем, вы подписались на обновления нашего сайта!`;
            if($mail)
                $result = mail($mail, $title, $message);

            if( $result )  echo 'Письмо успешно отправлено';
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
    $USER->session_start($User_session);
            //var_dump($_COOKIE);
            //var_dump($_SESSION);
    switch ($_SERVER['REQUEST_URI']) {
        case '/':
            echo 'Главная';
            session_start();
            var_dump($_COOKIE);
            var_dump($_SESSION);
            break;
        
        case '/category/':
            echo "<a href='../'> Главная </a>/ Категории";
            
             session_start();
           // var_dump($_COOKIE);
            //var_dump($_SESSION);
            
            $array = $goods->getList();
            $title = "Все категории";
            render("category", $array, $title);
            break;

        case '/category/?type=' . $_GET['type']:
     
            echo "<a href='../'>Главная</a> / <a href='../category/'> Категории </a>/  " . replacement($_GET['type']);
            
             session_start();
           // var_dump($_COOKIE);
            //var_dump($_SESSION);
            
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
            render("category", $array, $title);
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
            var_dump($_COOKIE);
            var_dump($_SESSION);
            render("details" ,  $result );
            break;
        case '/admin/':
            echo "<a href='../'> Главная </a> / Административная панель";
             session_start();
            var_dump($_COOKIE);
            var_dump($_SESSION);
            render("admin");
            break;    
    }

}




