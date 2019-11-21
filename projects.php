<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects</title>
    <link rel="stylesheet" href="/styles/navbar.css">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="import" href="/navbar.html">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato|Oswald&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        require_once("connect.php");

        // echo "host=localhost dbname=" . dbname . " user=" . user . " password=" . password;
        

        $conn=pg_pconnect("host=localhost dbname=" . dbname . " user=" . user . " password=" . password);

        $result = pg_query($conn, "SELECT * FROM project");
        



    ?>
<div class="wrapper">
<div id="header"></div>
 </div>
 <script src="scripts/menu.js"></script>   
 <div class="cards">
<?php
        while ($row = pg_fetch_array($result)){
        echo "<div class='card'>";
        echo "<img src='$row[4]' alt='$row[1]'>";
        echo "<div class='row'>";
        echo $row[1]; // Name
        echo "<a href='$row[2]'>$row[1] on github</a>"; // github link
        echo "<a href='$row[3]'>$row[1] as a website</a>"; // on github pages
        echo "</div></div>";
        }
?>
</div>

</body>
<script>
        $(function(){
            $('#header').load('navbar.html', function (){
                const body = document.body;
const btn = document.querySelector('.btn-menu');

btn.addEventListener('click', function(){
    body.classList.toggle('show');
});

btn.addEventListener('mousedown', function(e){
    e.preventDefault();
});
            });
        });
        </script>
</html>