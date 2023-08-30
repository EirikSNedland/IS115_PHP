<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Go back</a>
    <p>
        PHPinfo kan gi en bedre forståelse av hvordan php er konfigurert.
        Dette kan hjelpe bruker med å bedre forstå hva som foregår og eventuelt forbedre oppsetet.<br>
        PHPinfo gir informasjon om konfigurasjon av webserveren, kan være nyttig når det kommer til debugging og feilsøking. 
        Her kan du også se hvilken PHP version som blir brukt.
        Det gir også informasjon om serveren som kan føre til sensetiv informasjon blir vist når det ikke bør bli vist så bruk varsmomt
    </p>
    <p>
        Display_errors: local value: on, Master Value on
    </p>
    <p>
        document_root: C:/xampp/htdocs
    </p>
    <?php phpinfo() ?>
</body>
</html>
