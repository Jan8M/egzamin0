<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Wycieczki po Europie</title>
</head>
<body>
    <header id="baner">
        <h1>BIURO TURYSTYCZNE</h1>
    </header>
    <section id="dane">
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <ul>
            <?php
            $servername = "localhost";
            $user = "root";
            $pass = "";
            $dbname = "biuro";
            $conn = mysqli_connect($servername, $user, $pass, $dbname);
            $sql = "SELECT id, dataWyjazdu, cel, cena FROM `wycieczki` WHERE dostepna = 1;";
            $result = mysqli_fetch_all(mysqli_query($conn, $sql));
            for ($i = 0; $i < count($result); $i++){
                echo "<li>".$result[$i][0]." dnia ".$result[$i][1]." jedziemy do ".$result[$i][2].", cena: ".$result[$i][3]."</li>";

            }
            mysqli_close($conn);
            ?>
        </ul>
    </section>
    <section id="lewy">
        <h2>Bestselery</h2>
        <table>
            <tr>
                <td>Wenecja</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>Londyn</td>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>Rzym</td>
                <td>wrzesień</td>
            </tr>
        </table>
    </section>
    <section id="srodek">
        <h2>Nasze zdjęcia</h2>
        <?php
        $servername = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "biuro";
        $conn = mysqli_connect($servername, $user, $pass, $dbname);
        $sql2 = "SELECT nazwaPliku, podpis FROM `zdjecia` WHERE 1 ORDER BY podpis DESC;";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) > 0){
            $table = mysqli_fetch_all($result2);
            for ($i = 0; $i < count($table); $i++) {
                echo '<img src="'.$table[$i][0].'" alt="'.$table[$i][1].'">';
            }
        }
        mysqli_close($conn);
        ?>
    </section>
    <section id="prawy">
        <h2>Skontaktuj się</h2>
        <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
        <p>telefon: 111222333</p>
    </section>
    <footer>
        <p>Stronę wykonał: JM</p>
    </footer>
    
</body>
</html>