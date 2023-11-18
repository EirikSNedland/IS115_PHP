<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="katalog/style.css">
    <title>Modul 9.2</title>
</head>
<body>
    <?php
    use setasign\Fpdi\Fpdi;
    require_once("./katalog/fpdf/fpdf.php");
    require_once("./katalog/FPDI/FPDI-master/src/autoload.php");
    require("Logger.php");
    $event = "Faktura pdf generert";
    loggEvent($event);

    ?>
    <a href="index.php">Go Back</a><br> 
    <?php 
    #Kunde info
    $name = "Cookie Monster";
    $adr = "Sesamstreet 12";
    $invoiceIssuer = "Cookie Factory";
    $productName = "Cookies";
    $amount = 10;
    $price = 500;
    ?>
    <?php 
    $pdf = new FPDI();

    $pdf -> AddPage();

    $pdf -> setSourceFile("./katalog/ignoreMe/Innlevering9_fakturamal.pdf");

    $fs = $pdf -> importPage(1);

    $pdf -> useTemplate($fs);

    $pdf -> SetFont("Arial", "B", 14);
    $pdf -> Cell(50, 5, $invoiceIssuer, 0,0,"C");

    $pdf -> Ln(35);
    $pdf -> SetFont("Arial", "B", 10);
    $pdf -> Cell(20, 5, "Fakturert til:", 0,0,"C");

    $pdf -> Image("./katalog/testPics/cookie.png", 65, 0, 70, 70);
    
    $pdf -> SetXY(8,50);
    $pdf -> SetFont("Arial","",8);
    $pdf -> Cell(10, 5, "Navn: " . $name);

    $pdf -> SetXY(20,50);
    $pdf -> Cell(10, 13, "Adresse: " . $adr, 0,0,"C");

    $pdf -> SetY(100);
    $pdf -> SetFont("Arial","",8);
    $pdf -> Cell(55, 0, $productName);

    $pdf -> Cell(55, 0, $amount . "kg");

    $pdf -> Cell(55, 0, $price . "kr/kg");

    $pdf -> Cell(55, 0, $price * $amount . "kr");

    $pdf -> SetXY(175,0);
    $pdf -> Write(210, $price * $amount * 0.25 . "kr");
    $pdf -> SetXY(175,0);
    $pdf -> Write(219, $price * $amount * 1.25 . "kr");

    $pdf -> SetXY(100,190);
    $pdf -> SetFont("Arial","B",12);
    $pdf -> Write(0, $price * $amount * 1.25 . "kr");

    $pdf -> output("I", "faktura.pdf");

    ?>
</body>
</html>