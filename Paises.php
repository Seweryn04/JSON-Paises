<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paises</title>
    <style>
        @media(max-width: 600px)
        {
            table
            {
                width:100%;
            }      
        }
    </style>
</head>
<body>
    <?php
        $url = "https://restcountries.com/v3.1/all";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $json = curl_exec($curl);
        curl_close($curl);
        $objeto_json = json_decode($json, true);

        echo '<table border="1">';       
        echo '<tr><th>Nombre</th><th>Capital</th><th>Google Maps</th></tr>';
        foreach($objeto_json as $value)
        {
            $common = $value['name']['common'];
            if(isset($value['capital'][0]))
            {
                $capital = $value['capital'][0];
            }
            else
            {
                $capital = 'No especificada';
            }
            $mapa = $value['maps']['googleMaps'];
            echo '<tr>';
            echo '<td>'. $common .'</td>';
            echo '<td>'. $capital. '</td>';
            echo '<td><a href="'.$mapa.'">Miralo en el mapa</td>';
            echo '</tr>';  
        } 
        echo '</table>';
    ?>  
</body>
</html>
