<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Consumindo API com AXIOS - Pato</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/proxy-checker@1.0.0/index.min.js"></script>
</head>

<body class="container-fluid">
<div class="row d-flex justify-content-center">
    <div class="col-6">
        <h1 class="text-center">PHP</h1>
    <?php

    // JSON TXT ======================== PHP

    // $json_data = json_decode(file_get_contents('Free_Proxy_List.json'));
    // foreach ($json_data as $data) {
    // $proxies[] = $data->ip.':'.$data->port;
    // echo  $data->ip.':'.$data->port.'<br>';
    // }

    // JSON TXT ======================== PHP

    // ARQUIVO TXT ======================== PHP + JS

    $proxies = file('Proxies.txt');

    //Limpa espaços em branco
    $proxies = array_map(function ($proxy) {
        return trim($proxy);
    }, $proxies);

    // ARQUIVO TXT ======================== PHP + JS

    set_time_limit(0);

    $url = 'https://patoacademy.network/hit/qrcyfzx-87954';

    $a = 0;
    $n = count($proxies)+1; // 0 somente JS ou count($proxies)+1;  Em caso de uso php+js para request !!! Aviso alta demora !!!

    echo "<center><div class='alert alert-dark ' style='width: 90%;'> " . $n . "</div></center>";

    foreach ($proxies as $proxy) {

        $arquivo = file('Arquivo.txt');

        //Limpa espaços em branco
        $arq = array_map(function ($proxy) {
            return trim($proxy);
        }, $arquivo);

        $ex = array_search($proxy, $arq);

        if (empty($ex)) {

            if ($proxy != "") {
                $action = curl_init($url);
                $headers["User-Agent"] = "Curl/1.0";
                curl_setopt($action, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($action, CURLOPT_PROXY, $proxy);
                curl_setopt($action, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    "Accept: application/json"
                ));
                curl_setopt($action, CURLOPT_HEADER, 0);
                curl_setopt($action, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($action, CURLOPT_FAILONERROR, 1);
                curl_setopt($action, CURLOPT_RETURNTRANSFER, 1);

                curl_setopt($action, CURLOPT_CUSTOMREQUEST, "GET");
                curl_setopt($action, CURLOPT_SSL_VERIFYPEER, false);


                $data = json_decode(curl_exec($action));

                $info = curl_getinfo($action);
            } else {
                $action = curl_init($url);
                $headers["User-Agent"] = "Curl/1.0";
                curl_setopt($action, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($action, CURLOPT_URL, $url);
                curl_setopt($action, CURLOPT_PROXY, 'http://'.$proxy);
                curl_setopt($action, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    "Accept: application/json"
                ));
                curl_setopt($action, CURLOPT_HEADER, 0);
                curl_setopt($action, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($action, CURLOPT_CONNECTTIMEOUT, 1);
                curl_setopt($action, CURLOPT_TIMEOUT_MS, 2000);
                curl_setopt($action, CURLOPT_FAILONERROR, 1);
                curl_setopt($action, CURLOPT_RETURNTRANSFER, 1);

                curl_setopt($action, CURLOPT_CUSTOMREQUEST, "GET");
                curl_setopt($action, CURLOPT_SSL_VERIFYPEER, false);


                $data = json_decode(curl_exec($action));

                $info = curl_getinfo($action);
            }


            if ($data == true) {
                $ultimo = end($data);
                echo "<center><div class='alert alert-success ' style='width: 90%;'> " . $a . " #Aprovada <b style='color:green'>✔</b> " . $proxy . " - " . $url . " - " . $ultimo . "";

                if ($errno = curl_errno($action)) {
                    $error_message = curl_strerror($errno);
                    echo " - cURL error ({$errno}):\n {$error_message} </div></center>";
                } else {
                    echo "</div></center>";
                }

                  //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
            $fp = fopen("Arquivo.txt", "a+");

            //Escreve no arquivo aberto.
            fwrite($fp, "\r\n" . $proxy." - ".$ultimo);

            //Fecha o arquivo.
            fclose($fp);

            } else {
                echo "<center><div class='alert alert-danger' style='width: 90%;'> " . $a . " #Reprovada <b style='color:red'>✘</b> " . $proxy . " - " . $url . "";

                if ($errno = curl_errno($action)) {
                    $error_message = curl_strerror($errno);
                    echo " - cURL error ({$errno}):\n {$error_message} </div></center>";
                } else {
                    echo "</div></center>";
                }

                  //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
            $fp = fopen("Arquivo.txt", "a+");

            //Escreve no arquivo aberto.
            fwrite($fp, "\r\n" . $proxy);

            //Fecha o arquivo.
            fclose($fp);

            }

          

            curl_close($action);
        } else {
            echo "<center><div class='alert alert-warning' style='width: 90%;'> " . $a . " #Reduzindo Tempo <b style='color:red'>✘</b> " . $proxy . " - " . $url . " - já testado</div></center>";
        }

        $a++;

        if($a >= $n){
            break;
        }
       

    }
    ?>

    </div>
     <div class="col-5 text-center" id="jsp">
        <h1 class="text-center" >JS</h1>
        <?php echo "<center><div class='alert alert-dark ' style='width: 100%;'> " . $n . "</div></center>"; ?>
    </div>
   
</div>
<!-- <script src="import.js"></script> -->
    <!-- <script src="test.js"></script> -->
</body>

</html>