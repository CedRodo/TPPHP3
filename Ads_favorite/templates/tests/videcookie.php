<?php
if (isset($_COOKIE['favoris'])) {
    echo "PRESENT";
    unset($_COOKIE['favoris']);
    setcookie('favoris', '', time() - 3600, '/'); // empty value and old timestamp
}?>
<?php var_dump($_COOKIE); ?>
<p>COOKIE VIDE</p>