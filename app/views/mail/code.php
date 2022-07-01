<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
    <title>Код восстановления</title>
</head>
<body>
   
    <h3 style="text-align: center; font-family: sans-serif;">Ваш код для восстановления:</h3>
    <h1 id="copyme" class="code" data-clipboard-action="copy" data-clipboard-target="#copyme" style="padding: 5px 10px;text-align: center; margin: auto; border: 1px solid #999999; width: 100px; cursor: pointer; color: #8a8a8a;"><?=$_SESSION['code'];?></h1>

    <script>
        let code = new ClipboardJS('.code');
        code.on('success', function(e){
            alert("Скопировано в буфер обмена");
        });
    </script>
</body>
</html>