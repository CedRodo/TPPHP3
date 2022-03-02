<?php echo "$ Cookie : <br/><br/>";
    var_dump($_COOKIE);
    echo "<br/><br/>";
    echo "$ cookie['favoris'] : <br/><br/>";
    var_dump($_COOKIE['favoris']);
    echo "<br/><br/>";
    echo "$ cookie['favoris'] décodé dans une variable : <br/><br/>";
    $favoris_objet = json_decode(($_COOKIE['favoris']));
    var_dump($favoris_objet);
    echo "<br/><br/>";
    // echo "Contenu de session : <br/><br/>";
    // var_dump($_SESSION);
    // echo "<br/><br/>";

    ?>