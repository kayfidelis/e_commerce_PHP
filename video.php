<!DOCTYPE html>
<html>
<head>
    <title>Meu Site com Vídeo</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        #video-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        video {
            width: 100%;
            height: auto;
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }

        h1 {
            font-size: 4vw;
            margin-bottom: 20px;
        }

        p {
            font-size: 2vw;
        }
    </style>
</head>
<body>
    <div id="video-container">
        <video autoplay muted loop>
            <source src="imagens/coverr-a-skate-park-9922-1080p.mp4" type="video/mp4">
        </video>
        <div class="content">
            <h1>GRUTA.SB</h1>
            <p>A MELHOR SKATESHOP DO BRASIL.</p>
        </div>
    </div>
    <br/><br/>

    <!-- Outro conteúdo do site vem aqui -->

</body>
</html>
