<?php

//Testa $_POST datan from form så att den inte innehåller felaktiga tecken etc.
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}