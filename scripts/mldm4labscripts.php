<?php
    session_start();
    if($_POST['mass']!=""){
        $mass = preg_split('/[\n]/', $_POST['mass']);
        $size= count($mass);
   
        for ($i = 0; $i < $size; $i++) {
            $mass[$i] = trim($mass[$i]);
            $mass[$i] = explode(' ', $mass[$i]);
        }
    }   

    $begin =$_POST['begin']+0;
    $end=$_POST['end']+0;

    function finderror($mass, $begin,$end) {
        $_SESSION['error_text'] = "";
        if(count($mass) == 0 || strlen($begin)==0 || strlen($end)==0) {
            $_SESSION['error_text'] = "Поля не должны быть пустыми";
            return false;
        }
        else if($end>count($mass)){
            $_SESSION['error_text'] = "Конечная точка больше чем количество вершин";
            return false;
        }
        for ($i = 0; $i < count($mass); $i++){
            if (count($mass) != count($mass[$i])) {
                $_SESSION['error_text'] = "Количество столбцов и строк должно быть одинаково";
                return false;
            }
            for ($j = 0; $j < count($mass); $j++){
                if($i == $j and $mass[$i][$j] != 0) {
                    $_SESSION['error_text'] = "На главной диагонали должны быть нули";
                    return false;
                }
            }
            for ($j = 0; $j < $i; $j++){
                if($mass[$i][$j]==$mass[$j][$i] && $mass[$i][$j]!=0) {
                    $_SESSION['error_text'] = "Граф ориентированный, движение только в одном направлении";
                    return false;
                }
            }
        }
        return true;
    }
    
    if(finderror($mass, $begin,$end)) {

        for ($i = 0; $i < count($mass); $i++) {
            $point[$i] = 999999;
        }

        $mini = $begin;
        $index[0] = $begin;

        $point[$mini] = 0;
        $pointway[0] = 0;
        $k=0;

        while ($mini != -999999) { 

            for ($i = 0; $i < count($mass); $i++) {

                if (!array_search($i, $index) && $mass[$mini][$i] != '0') { 
                    $temp = $point[$mini] + $mass[$mini][$i];
                    if ($point[$i] > $temp) {
                        $point[$i] = $temp;
                        
                    }
                }
            }

            $mini = -999999;
            $minpoint = 999999;

            for ($i = 0; $i < count($mass); $i++)  {

                $bool = true;

                for ($j = 0; $j < count($index); $j++) {
                    if ($i == $index[$j]) {
                        $bool = false;
                        
                    }
                }
                if ($bool) {
                    if ($minpoint > $point[$i]) {
                        $minpoint = $point[$i];
                        $mini = $i;
                    }
                }
            }
        
            if ($mini >= 0) {
                array_push($index,$mini);
            }
        }

        for($i=0;$i<count($index) && $index[$i-1] != $end;$i++){
            $pointway[$i] = $index[$i];
        }
        $result=$point[$_POST['end']];
        $way=implode("->",$pointway);

        $insert="";
        for($i=0;$i<count($mass);$i++){
            for($j=0;$j<count($mass[$i]);$j++){
                $insert=$insert.$mass[$i][$j].' ';
            }
            $insert=$insert.'<br>';
        }

        $_SESSION['mas'] ='Массив:<br><br>' .$insert.'<br>Начальная точка: '.$begin.'<br>Конечная точка:'.$end;
        $_SESSION['finalmas'] ='Кратчайший путь по Алгоритму Дейкстры: ' .$result.'<br> Путь: '.$way ;
        header('Location: ../mldmlab4.php');
    }
    else {
        header('Location: ../mldmlab4.php');
    }
?>