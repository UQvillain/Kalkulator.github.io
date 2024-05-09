<?php
$cookie_inputAngka = "angka";
$cookie_nilai1 = "";
$cookie_inputOperasi = "operasi";
$cookie_nilai2 = "";
$cookie_inputKoma = "";
$cookie_nilai3 = "";


if (isset($_POST['angka'])) {
    $angka_sebelumnya = $_POST['inputBilangan'];
    $angka = $angka_sebelumnya . ($_POST['angka'] == ',' ? '.' : $_POST['angka']);
} elseif (isset($_POST['koma'])) {
    $angka_sebelumnya = $_POST['inputBilangan'];
    $angka = $angka_sebelumnya . '.';
} else {
    $angka = "";
}

if (isset($_POST['operasi'])) {
    $cookie_nilai1 = $_POST['inputBilangan'];
    setcookie($cookie_inputAngka, $cookie_nilai1, time() + (86400 * 30), "/");

    $cookie_nilai2 = $_POST['operasi'];
    setcookie($cookie_inputOperasi, $cookie_nilai2, time() + (86400 * 30), "/");
    
}


if (isset($_POST['operasi']) && $_POST['operasi'] == '%') {
    // Memeriksa apakah nilai angka sebelumnya telah disetel
    if(isset($_COOKIE['angka'])) {
        $angka_sebelumnya = $_COOKIE['angka'];
        $result = $angka_sebelumnya / 100;
        $angka = $result;
    } else {
        // Jika nilai angka sebelumnya belum disetel, mungkin ada kesalahan logika.
        // Di sini, Anda bisa mengatur nilai angka menjadi kosong atau memberikan pesan kesalahan.
        $angka = "Error: No previous number set";
    }
}

if (isset($_POST['hasil'])) {
    $angka = $_POST['inputBilangan'];
    $result = 0;
    if (isset($_COOKIE['operasi'])) {
        switch ($_COOKIE['operasi']) {
            case "+":
                $result = $_COOKIE['angka'] + $angka;
                break;
            case "-":
                $result = $_COOKIE['angka'] - $angka;
                break;
            case "*":
                $result = $_COOKIE['angka'] * $angka;
                break;
            case "/":
                $result = $angka == 0 ? "Tak terdefinisi" : $_COOKIE['angka'] / $angka;
                break;
        }
    }
    $angka = $result;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- link icon  -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- link css  -->
    <link rel="stylesheet" href="styleKalkulator.css">

</head>

<body>
    <div class="kalkulator">
        <h3>CITIZEN</h3>
        <form action="" method="post">
            <br>
            <input type="text" class="inputAngka" name="inputBilangan" value="<?php echo $angka; ?>">
            <br><br>
            <input type="submit" class="btnClear" name="num" value="C">
            <input type="submit" class="btnPersen" name="operasi" value="%">
            <input type="submit" class="btnComa" name="koma" value=".">
            <input type="submit" class="btnOperasi" name="operasi" value="+"> <br><br>
            <input type="submit" class="btnAngka" name="angka" value="7">
            <input type="submit" class="btnAngka" name="angka" value="8">
            <input type="submit" class="btnAngka" name="angka" value="9">
            <input type="submit" class="btnOperasi" name="operasi" value="-"> <br><br>
            <input type="submit" class="btnAngka" name="angka" value="4">
            <input type="submit" class="btnAngka" name="angka" value="5">
            <input type="submit" class="btnAngka" name="angka" value="6">
            <input type="submit" class="btnOperasi" name="operasi" value="*"> <br><br>
            <input type="submit" class="btnAngka" name="angka" value="1">
            <input type="submit" class="btnAngka" name="angka" value="2">
            <input type="submit" class="btnAngka" name="angka" value="3">
            <input type="submit" class="btnOperasi" name="operasi" value="/"> <br><br>
            <input type="submit" class="btnAngka" name="angka" value="0">
            <input type="submit" class="btnAngka0" name="angka" value="00">
            <input type="submit" class="btnHasil" name="hasil" value="=">
        </form>
    </div>
</body>


</html>