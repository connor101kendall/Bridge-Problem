<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>The Bridge Problem</title>    
    <meta name="description" content="##">
    <meta name="author" content="Connor Kendall">    
    <!-- styles - internal (not linked) -->
    <style>
    #container {
        width: 90%;
        padding: 25px;
        margin-top: 30px;
        margin-left: auto;
        margin-right: auto;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        background: #F8F8FF;
        border-radius: 0.5em;
        -moz-border-radius: 0.5em;
        -webkit-border-radius: 0.5em;
        box-shadow: 5px 5px 15px #000000;
        text-align: center;
    }   
    body {
        font-family: 'Goldman', cursive;
        color: #000000;
        font-size: 1.1em;
        background-image: url("images/hex-background.png");
    }
    table{
        border: 1px solid black;
        border-collapse: collapse;
        width: 1000px;
    }
    tr, th, td{
        border: 1px solid black;
        border-collapse: collapse;
        width: 250px;
    }
    form {
            font-family: 'Goldman', cursive;
            font-size: 1.1em;
            padding: 10px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 2em;
        }
    input, select, textarea {
            font-family: 'Goldman', cursive;
            font-size: 1.1em;
            padding: 5px;
            border-radius: 0.5em;
            outline: none;
            margin: 5px;
            border: 1px solid #003366;
        }
    a.back-button:link, a.back-button:visited , a.back-button:active {
            padding: 2px;
            font-size: 1.5em;
            color: #000000; 
            font-family: Calibri;
            border-radius: 0 0.2em 0 0.2em; /*Top/Right/Botton/Left */
            -moz-border-radius: 0.3em 0.3em 0.3em 0.3em; 
            -webkit-border-radius: 0.3em 0.3em 0.3em 0.3em;             
        }
        a.back-button:hover {
            background: #ffff00;
            color: #000000;
            padding: 2px 8px;
            box-shadow: 5px 5px 5px #222222;
            -webkit-box-shadow: 5px 5px 5px #222222;
            -moz-box-shadow: 5px 5px 5px #222222;
             transition: all 0.25s ease;
         }
    .subButton {
        font-size: 1.2em;
        border: 1px solid #003366;
        padding: 5px;
        }
    .subButton:hover {
        border: 1px solid black;
        cursor: pointer;
        color: black;
        padding: 5px 15px;
        background-color: green;
        transition: all ease 0.25s;
        }
    h3, h1 {
    color: black;
    text-decoration: underline;
    }
    </style>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goldman&display=swap" rel="stylesheet">
</head>
<body>
    <a class="back-button" href="../"><i class="fas fa-home"></i></a>
    <!-- main content -->
    <div id="container">
    <h1 align="center">The Bridge Problem</h1>
    <table align="center">
<thead>
  <tr>
    <th colspan="2">A person is standing in the middle of a 10 meter long bridge.  The person is equally like to take a step forward as backward.  Each step is 1 meter long. Run a do while loop that shows how many steps it takes to get off the bridge when a submit button is pressed.
</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td><img style="width: 400px;" src="images/bridge.jpg"></img><br /></td>
    <td><form align= "center" name="UserInput2" action="the_bridge_problem.php" method="post">
        <input type="number" name="endNum" placeholder="# of Iterations" required="" max="1000000" value=""></input><br />
        Show each iteration?<input type="radio" name="show"  value="yes">Yes</input><input checked type="radio" name="show"  value="no">No</input><br />
        <input type="submit" name="submit" class="subButton" value="START SIMULATION"></input>
    </form></td>
  </tr>
  <tr>
    <td colspan="2">
    <?
    if ($_POST["submit"]) {
        // store values
    $endNum = $_POST['endNum'];
    $show = $_POST['show'];
    $total=0;
    $forward = 0;
    $back = 0;
    $l = 5;
    //set error to false
        $error = "false";
        //check for errors 
        if($endNum == "" OR $endNum == "0") {
            $error = "true";
            $errorMessage = "<h4>Error: Please Input A Value</h4>";
        }
        if($endNum > 1000000) {
            $error = "true";
            $errorMessage = "<h4>Error: Iteration number greater than 1000000, please try again with a smaller number</h4>";
        }
        if ($error == "false"){
            for($y=1; $y<=$endNum; $y++) {
                       for ($i=1; $i<=1000; $i=$i+1) {
                        if($l == 10 OR $l == 0){
                            //echo "You are No Longer on the bridge! </br>";
                            $i=1000;
                        }else{
                            $x = rand(0,1);
                                if ($x == 1){
                                    $l++;
                                    $forward++;
                                    $p++;
                                } else if ($x == 0){ 
                                    $l--;
                                    $back++;
                                    $p++;  
                                    }
                        }
                    } 
                if ($show == "yes"){
                    echo "<h4># of Steps: <b>" . ($p) . "</b> Moved Forward: " . $forward . " times</b> Moved back: <b>" . $back . " times</b></h4>";
                }
                $total=$total+$p;
                $plotPoint .= "[" . $total . " , " . $p . "],";
                $l=5;
                $p=0;
                $forward=0;
                $back=0;
            }
            $eAvg = round(($total/($endNum)));
            $pError = round(abs((($eAvg-25)/25)*100));
            echo "<table align=center>
                    <tbody>
                      <tr>
                        <td><b>Experimental Average Steps</b></td>
                        <td>" . $eAvg . "</td> 
                      </tr>
                      <tr>
                        <td><b>Theoretical Average Steps</b></td>
                        <td>25</td>
                        
                      </tr>
                      <tr>
                        <td><b>Percent Error</b></td>
                        <td>" . $pError . "%</td>
                      </tr>
                    </tbody>
                    </table>";
        }
        } else {
            echo $errorMessage;
        }

        ?>
</td>
  </tr>
  
</tbody>
</table>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawLineColors);

        function drawLineColors() {
              var data = new google.visualization.DataTable();
              data.addColumn('number', '# ITERATIONS');
              data.addColumn('number', '# STEPS');
              data.addRows([
                <?php
                echo $plotPoint;
                ?>
              ]);

              var options = {
                hAxis: {
                  title: '# of Iterations'
                },
                vAxis: {
                  title: '# of Steps'
                },
                colors: ['#a52714']
              };

              var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
              chart.draw(data, options);
            }
                        </script>               
            <div id="chart_div" style="width: 100%; height: 500px;"></div>
    <!-- end main content -->
    <!-- load jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>
</html>