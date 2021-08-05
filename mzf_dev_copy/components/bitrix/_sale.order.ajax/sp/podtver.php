<?php
echo "<script>parent.document.getElementById('_out').innerHTML = '";
// Данные пользователя - логин, пароль, имя отправителя
$user="zerkala2"; 		// логин в нашей системе
$pass="C%sb*jxR2a"; 			// пароль в нашей системе
$sourceAddress="zerkala.ru"; 		// имя отправителя

//	Генерируем случайное число
$rnd=rand(100000,999999);
if ($_POST["sendsms"]){
//	Проверка корректности введенного номера
    if(iconv_strlen($_POST['phone'])>=6){
        $i=0;
//	Открываем "file.txt" в режиме чтения
        $fp = fopen("file.txt", "r");
        if ($fp){
            while (!feof($fp)){
                $mytext = fgets($fp);
                $array[$i]=trim($mytext);
                $i++;
            }
        }
        fclose($fp);
        $phone = $_POST['phone'];
        $key = array_search($phone, $array);
        // Запись номера и кода в файл
        if($key===FALSE){
            $filename = 'file.txt';
            $somecontent = "\n".$_POST["phone"]."\n".$rnd;
            //	Вначале давайте убедимся, что файл существует и доступен для записи.
            if (is_writable($filename)){
                // В нашем примере мы открываем $filename в режиме "дописать в конец".
                // Таким образом, смещение установлено в конец файла и
                // наш $somecontent допишется в конец при использовании fwrite().
                if (!$handle = fopen($filename, 'a')) {exit;}
                // Записываем $somecontent в наш открытый файл.
                if (fwrite($handle, $somecontent) === FALSE){exit;}
                fclose($handle);
            }
            //	Посылаем get-запрос на отправку кода подтверждения на введенный пользователем номер
            $var = file_get_contents ('https://auth.terasms.ru/outbox/send/?login='.$user.'&password='.$pass.'&sender='.$sourceAddress.'&target='.$phone.'&message='.$rnd.'');
            echo "Код подтверждения отправлен на номер ".$_POST["phone"];
        }
        else {echo "На номер уже был отправлен код";}
    }else{echo "Короткий номер";}
}
//	Проверка кода
if ($_POST["ok"]) {
    $i=0;
//	Открываем "file.txt" в режиме чтения
    $fp = fopen("file.txt", "r");
    if ($fp){
        while (!feof($fp)){
            $mytext = fgets($fp);
            $array[$i]=trim($mytext);
            $i++;
        }
    }
    $arr=$array;
    fclose($fp);
    $phone = $_POST['phone'];
    $key = array_search($phone, $arr);
    $code=$arr[$key+1];
    $phoneex=$arr[$key];
    if ($code == $_POST["code"] && $phoneex==$_POST["phone"]){
        echo "Номер активирован";
        //	Удаление номера с кодом из файла
        $file=file("file.txt");
        $fp=fopen("file.txt","w");
        for($i=0;$i<sizeof($file);$i++){
            if($i==$key){
                unset($file[$i]);
                unset($file[$i+1]);
            }
        }
        fputs($fp,implode("",$file));
        fclose($fp);
    }else{echo "Неверный номер или код подтверждения";}
}
echo "'</script>";
?>