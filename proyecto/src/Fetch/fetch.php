<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button id="btnMostrarJson" type="button">Mostrar JSON</button>
<div id="data"></div>
<pre id="jsonData"></pre>

<script>
    const url = "https://jsonplaceholder.typicode.com/users";
    const btnMostrarJson = document.getElementById("btnMostrarJson");
    const jsonData = document.getElementById("jsonData");
    const data = document.getElementById("data");

    
        btnMostrarJson.addEventListener("click", function () {
            fetch(url)
                .then(function (response) {
                    if (!response.ok) throw new Error("Error al recuperar json");
                    return response.json();
                })
                .then(function (json) {
                    // Parte de la imagen: generar lista con nombres.
                    const lis = json
                        .map(function (user) {
                            return "<li>" + user.name + "</li>";
                        })
                        .join("");

                    data.innerHTML = "<ul>" + lis + "</ul>";

                    // Parte de tu función actual: mostrar JSON completo.
                    jsonData.textContent = JSON.stringify(json, null, 2);
                })
                .catch(function (error) {
                    data.textContent = "";
                    jsonData.textContent = "Error en catch: " + error.message;
                });
        });
    


</script>
</body>
</html>