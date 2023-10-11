<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>설문 완료</title>
    <style>
        body {
            background-color: #D9EFED;
            margin: 0;
            padding: 0;
        }
        body > div {
            width: 33%;
            min-width: 600px;
            margin: 15px auto;
            padding: 20px 30px;
        }
        header {
            background-color: #FFF;
            padding: 20px;
            border-radius: 8px;
            border-top: 10px solid #009688;
        }
        h2 {
            width: 70%;
            margin: 20px auto;
        }
    </style>
</head>
<body>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // 값 받아오기
            $tel = $_POST["telephone"];
            $college = $_POST["college"];
            $q1 = $_POST["question1"];
            $q2 = $_POST["question2"];
            $q3 = $_POST["question3"];
            $q3_1 = isset($_POST["question3-in1"]) ? $_POST["question3-in1"] : [];
            $q4 = $_POST["question4"];
            $q4_1 = isset($_POST["question4-in1"]) ? $_POST["question4-in1"] : "";
            $q4_2 = isset($_POST["question4-in2"]) ? $_POST["question4-in2"] : "";

            // csv 파일에 append할 튜플
            $tuple = $tel.",".$college.",".$q1.",".$q2.",".$q3.",".implode("/", array_values($q3_1)).",".$q4.",".$q4_1.",".$q4_2."\n";

            // csv 파일 열기
            $file = fopen("data.csv", "a");

            if($file) {
                $message = "설문에 참여해주셔서 감사합니다!";
            } else {
                $message = "오류가 발생했습니다. 다시 전송해주십시오.";
            }

            // 쓰기
            fwrite($file, $tuple);

            // 파일 닫기
            fclose($file);
        }
    ?>

    <div>
        <header>
            <h2><?= $message ?></h2>
        </header>
    </div>
    
</body>
</html>