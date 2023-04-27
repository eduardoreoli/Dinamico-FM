<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dinâmico FM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      /* .background {
        background-image: url(logo.jpg);
      } */
      .box-left {
        width: 40%;
        float: left;
      }
      .box-right {
        width: 60%;
        float: right;
      }
      .logo {
        position: relative;
        width: 100%;
        overflow: hidden;
      }
      .moving-logo {
        animation: moverImagem 10s linear infinite;
        left: 0;
        top: 0;
      }
      @keyframes moverImagem {
        0% {
          transform: translateX(0);
        }
        50% {
          transform: translateX(100%);
        }
        100% {
          transform: translate(0);
        }
      }
      .clearfix {
        clear: both;
      }
    </style>
    <script>
            
    </script>
  </head>
  <body>
    <div class="container mt-3 background">
      <div class="box-left">
        <?php 

          $url = "https://stream01.ouveai.com.br:2020/json/stream/1186";

          $ch = curl_init($url);

          curl_setopt_array($ch, [
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_SSL_VERIFYPEER => false
          ]);

          $resultado = json_decode(curl_exec($ch));
          /*echo "<pre>";
          print_r($resultado);
          echo "</pre>";*/

          echo "<h1>NO AR AGORA</h1>";
          echo "-> $resultado->nowplaying.<br>";
        ?>
      <br>
      <img src="<?= $resultado->coverart ?>" alt="">
      <br>
      </div>
      <div class="box-right">
        <h3>O QUE JÁ TOCOU</h3>
        
        <?php 

        foreach ($resultado->trackhistory as $som){
            echo "-> " .$som . "<br>";
        }
        ?>
        <br>
        
        <audio controls autoplay id="playAudio">
          <source src="https://stream01.ouveai.com.br:2020/stream/1186" type="audio/mpeg">
        </audio>
      </div>
      <br>

        <p class="logo clearfix">
          <img src="logo.jpg" alt="" class="moving-logo">
        </p>
      <?php

      /*foreach ($resultado->results as $titulo){
          echo "Está tocando agora <strong>$titulo->nowplaying</strong>  na Dinâmico FM. <br> ";
      }*/

      ?>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </body>
</html>



