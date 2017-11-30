<?php
$link = mysqli_connect("localhost", "root", "", "cpsc471db");

if(!$link) {
	die('Unable to connect'. mysqli_error($link));
}

?>
<!DOCTYPE HTML>
<html>
        <head>
                <title> RO Assignments </title>
                <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
                <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <div class = "heading">
                <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
            </div>
                <form action ="View_Works_On.php" method="GET">
                <input type="text" name="search" placeholder="Enter a value"/>
                <input type="submit" value="Search"/>
                </form>
            <div class ="tableview">    
            <table width="200" border="1" cellpadding="1" cellspacing="1">
                        <tr>
                                <th>RO_Num</th>
                                <th>ID</th>
                        </tr>

                        <?php
                        //If the user performs a search
                        if(isset($_GET["search"]))
                        {
                                $search = $_GET["search"];
                                $search = mysqli_real_escape_string($link, $search);

                                $query = "SELECT * FROM works_on WHERE RO_Num = $search or ID = $search";

                                //If there are results...
                                if(mysqli_query($link, $query))
                                {
                                        $result = mysqli_query($link, $query);	

                                        while($WO=mysqli_fetch_assoc($result)) 
                                        {
                                                echo "<tr>";

                                                echo "<td>".$WO['RO_Num']."</td>";

                                                echo "<td>".$WO['ID']."</td>";

                                                echo "</tr>";
                                        } //End While					
                                }				
                        }

                        else
                        {
                                $query="SELECT * FROM works_on";
                                $result = mysqli_query($link, $query);

                                while($WO=mysqli_fetch_assoc($result)) 
                                {
                                        echo "<tr>";

                                        echo "<td>".$WO['RO_Num']."</td>";

                                        echo "<td>".$WO['ID']."</td>";

                                        echo "</tr>";
                                } //End While
                        }
                        ?>
                </table>
            </div>
        </body>
</html>
