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

        $conn=pg_pconnect("host=localhost dbname=" . dbname . " user=" . user . " password=" . password);
        
        if(!$conn)
        {
            die("<p>Database Connection Error checkout my Frontend only version of this project on <a href='https://github.com/woodsmanlucas/portfolio'>GitHub Pages</a></p>");
        }

        $resultProject = pg_query($conn, "SELECT * FROM project");
        
        $resultTech = pg_query($conn, "SELECT * FROM tech");

        $Tech = [];

        while($row = pg_fetch_array($resultTech)){
            array_splice($Tech, ($row[0]-1), 0, $row[1]);
        }

    ?>
<div class="wrapper">
<div id="header"></div>
 </div>
 <script src="scripts/menu.js"></script>   
 <div class="cards">
<?php
        while ($row = pg_fetch_array($resultProject)){
        echo "<div class='card'>";
        echo "<img src='$row[4]' alt='$row[1]'>";
        echo "<div class='row'>";
        echo $row[1]; // Name
        echo "<a href='$row[2]'>$row[1] on github</a>"; // github link
        if ($row[3] != null){
        echo "<a href='$row[3]'>$row[1] as a website</a>"; // on github pages
        }
        echo "</div><hr />";
        echo "<div class=row>";
        $resultProjectTechnology = pg_query($conn, "SELECT * FROM projecttechnology");

        while ($ptrow = pg_fetch_array($resultProjectTechnology)){
            if($row[0] == $ptrow[0]){
                $techId = $ptrow[1]-1;
                echo "<p>$Tech[$techId]</p>";
                echo "<p>$ptrow[2] / 5 </p>";
            }
        }
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