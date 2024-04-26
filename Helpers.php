<?php
function contarTempo(string $data)
{
    $tempo = strtotime($data);
    $agora = strtotime(date("Y-m-d H:i:s"));
    $diferenca = $agora - $tempo;

    $segundos = $diferenca;
    $minutos = round($diferenca / 60);
    $horas = round($diferenca / 3600);
    $dias = round($diferenca / 86400);
    $semanas = round($diferenca / 604800);
    $meses = round($diferenca / 2419200);
    $anos = round($diferenca / 29030400);

    if ($segundos <= 60) {
        return "agora";
    } elseif ($minutos <= 60) {
        return $minutos == 1 ? "há 1 minuto" : "há $minutos minutos";
    } else if ($horas <= 24) {
        return $horas == 1 ? 'há 1horas' : "há $horas horas";
    }
}

function validarEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function url(string $url): string
{
    $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');

    $ambiente = ($servidor == 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO);

    if (str_starts_with($url, '/')) {
        return $ambiente . $url;
    }
    return $ambiente . '/' . $url;
}


function slug(string $string): string
{
    $mapa['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?¨|;:.,\\\'<>°ºª  ';

    $mapa['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';
    $slug = strtr(utf8_decode($string), utf8_decode($mapa['a']), $mapa['b']);
    $slug = strip_tags(trim($slug));
    $slug = str_replace(' ', '-', $slug);
    $slug = str_replace(['-----', '----', '---', '--', '-'], '-', $slug);

    return strtolower(utf8_decode($slug));
}
