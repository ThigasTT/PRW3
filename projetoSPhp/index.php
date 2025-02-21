<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function exibirAlunos(){
            const xhttp = new XMLHhttpRequest();
            xhttp.open("POST", "consulta.php");
            xhttp.send();
            
            xhttp.onload = function(){
                document.getElementById("Print").innerHTML = this.responseText
            }
        }
    </script>
</head>
<body>
    <button onclick="exibirAlunos()">Exibir</button>
    <p id="print"></p>
</body>
</html>