<?php
    include ('../connect.php');
?>

<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="right">
            <form action="search-result.php" method="POST">
                <input name="search" type="search" placeholder="search" style="position:relative; margin: 5px auto; width:99%; height:35px;padding:10px; border:none;" required>
                <input name="search_type" type="radio" value="students" required>Students
                <input name="search_type" type="radio" value="teachers" required>Teachers<br><br>
                <button name="submit" type="submit" style="position:relative; width:40px; height:35px; background-color:white; margin:auto; border:none;">OK</button>
            </form>
        </div>
        <div class="right">
            <h2>Recent Updates</h2>
            <?php
                $count=0;
                $sql_query="SELECT * FROM updates GROUP BY update_date DESC";
                $result_set=mysqli_query($con,$sql_query);
                if(mysqli_num_rows($result_set)>0)
                {
                    while($row=mysqli_fetch_row($result_set))
                    {
                        $count++;
                        if($count<=8){
                            ?>
                                <div style="position:relative; width:90%; margin:auto; margin-bottom:10px;">
                                    <p style="text-align:center; font-size:18px"><?php echo $row[1];?></p>
                                    <p style="text-align:center; font-size:10px; position:relative; width:100%; bottom:15px;"><?php echo $row[2];?></p>
                                </div>
                            <?php
                        }
                    }
                }
                else
                {
                    ?>
                        No updates yet!
                    <?php
                }
            ?>
        </div>
    </body>
</html>