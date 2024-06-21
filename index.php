<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peli Marvel</title>
</head>

<body>
    <?php
    const API_URL = "https://whenisthenextmcufilm.com/api";
    #Inicializar una nueva sesion de CURL
    $ch = curl_init(API_URL);
    // queremos recibir la informacion de la api y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /*ejecutamos la peticion y
guardamos el resultado */
    $result = curl_exec($ch);
    $data = json_decode($result, true);
    curl_close($ch);


    // una alternativa seria hacer un file_get_contents
    // $result = file_get_contents(API_URL); // si solo quieres hacer un get de una api

    ?>
    <!-- <pre> <?php var_dump($data); ?> </pre> -->


    <main>

        <h1>La proxima peli de Marvel</h1>
        <h2>TITULO: <?php echo $data["title"] ?></h2>
        <p>La peli va de: <?php echo $data["overview"] ?></p>

        <section> <img src="<?= $data["poster_url"]; ?>" width="300" alt=""></section>
    </main>



    <!-- // estilos -->

    <style>
        :root {
            color-scheme: dark;
        }

        body {
            display: grid;
            place-content: center;
            text-align: center;
        }
    </style>
</body>

</html>