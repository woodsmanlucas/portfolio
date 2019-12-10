<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lucas Johnson</title>
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="import" href="/navbar.html">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="styles/main.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Oswald&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
    <div id="header"></div>
    <div class="content">
        <main>
            <?php
            require_once("connect.php");        

            $conn=pg_pconnect("host=localhost dbname=" . dbname . " user=" . user . " password=" . password);
            if(!$conn)
            {
                die("<p>Database Connection Error checkout my Frontend only version of this project on <a href='https://github.com/woodsmanlucas/portfolio'>GitHub Pages</a></p>");
            }


            $company = ""; $name= ""; $number = ""; $location = "";

            $displayform = false;

            $errors = "";

            if( !isset($_GET['Company']) || !isset($_GET['Name']) || !isset($_GET['Number']) || !isset($_GET['Time']) || !isset($_GET["location"])){
                $errors = $errors . "<p>Please fill out the form </p>";
                $displayform = true;
            }else{
                $name = trim($_GET['Name']);
                $company = trim($_GET['Company']);
                $number = trim($_GET['Number']);
                $time = trim($_GET['Time']);
                $location = trim($_GET['location']);

                if($company == ""){
                    $errors = $errors ."<p>Please provide a Company</p>";
                    $displayform = true;
                }
                if($name == ""){
                    $errors = $errors ."<p>Please provide a Name</p>";
                    $displayform = true;
                }
                if($number == ""){
                    $errors = $errors ."<p>Please provide a Phone Number</p>";
                    $displayform = true;
                }
                if($time == ""){
                    $errors = $errors ."<p>Please provide a Time to meet</p>";
                    $displayform = true;
                }else{
                    $Date = date_parse($time);
                }
                if($location == ""){
                    $errors = $errors ."<p>Please provide a Location to meet</p>";
                    $displayform = true;
                }
                
                if($errors == ""){
                    echo "<p>See you at $location on " . $Date["month"]."/". $Date["day"]." at ". $Date["hour"]. ":";
                    if($Date["minute"] < 10){
                        echo "0";
                    }
                    echo $Date["minute"]. "</p>";
                    echo "<p>If I have any scheduling conflicts I will try to reschedule within the next business day</p>";
                    echo "<p>If you email me a the job ad (or description) I will bring a resume and cover letter taylored to your job to the interview</p>";
                }
            }

            echo $errors;

            if ($displayform){
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <div>
                    <label for="Company">Company: </label>
                    <input type="text" name="Company" placeholder="enter your company" />
                </div>
                <div>
                <label for="Name">Name: </label>
                <input type="text" name="Name" id="Name" placeholder="enter your name" />
                </div>  
                <div>
                <label for="Number">Number: </label>
                <input type="text" name="Number" id="Number" placeholder="Phone Number" />
                </div>
                <div></div>
                <label for="Time">Time:</label>
                <input type="datetime-local" name="Time" id="Time">
                <br />
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" placeholder="Where should we meet? (address prefered)" />
                <br />
                <button type="submit">Submit</button>
            </form>
            <?php
            };
            ?>
            </div>
        </main>
    </div>
    <script src="scripts/menu.js"></script>

</body>
<script>
        $(function(){
            $('#header').load('navbar.html', function() {
                const body = document.body;
const btn = document.querySelector('.btn-menu');

btn.addEventListener('click', function(){
    body.classList.toggle('show');
});

btn.addEventListener('mousedown', function(e){
    e.preventDefault();
});});
        });
        </script>
</html>