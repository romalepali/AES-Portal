<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
    </head>

    <style>
        p {
            text-align:justify;
            font-size:20px;
        }

        h1 {
            text-align:center;
            font-size:40px;
        }

        th {
            background-color: rgb(0, 100, 0);
            padding: 10px;
            color: white;
        }
        
    </style>

    <body>
        <div class="main">
            <h1>Recent Activity</h1>
            <table align="center">
                <tr>
                    <th width="250px">Name</th>
                    <th width="350px">Operation</th>
                    <th width="150px">Date Modified</th>
                </tr>

                <?php
                    $count=0;
                    $sql_query="SELECT * FROM activities ORDER BY activities_date DESC";
                    
                        $result_set=mysqli_query($con,$sql_query);

                        if(mysqli_num_rows($result_set)>0)
                        {

                            while($row=mysqli_fetch_assoc($result_set))
                            {
                                $count++;
                                if($count<=8){
                                    ?>  
                                        <tr height="50px"> 
                                            <td align="center"><?php echo $row['lname'].","." ". $row['fname'] ." ".$row['mname'];?></td>
                                            <td align="center"><?php echo $row['activities_description'];?></td>
                                            <td align="center"><?php echo $row['activities_date'];?></td>
                                        </tr>
                                    <?php
                                } 
                            }   
                        }
                        else{
                        ?>
                            No Updates Yet!
                        <?php
                    }
                ?>

                <?php
                    $count=0;
                    $sql_query="SELECT * FROM section_activities ORDER BY activities_date DESC";
                    
                        $result_set=mysqli_query($con,$sql_query);

                        if(mysqli_num_rows($result_set)>0)
                        {

                            while($row=mysqli_fetch_assoc($result_set))
                            {
                                $count++;
                                if($count<=8){
                                    ?>  
                                        <tr height="50px"> 
                                            <td align="center"><?php echo $row['section_description'];?></td>
                                            <td align="center"><?php echo $row['activities_description'];?></td>
                                            <td align="center"><?php echo $row['activities_date'];?></td>
                                        </tr>
                                    <?php
                                } 
                            }   
                        }
                ?>

                <?php
                    $count=0;
                    $sql_query="SELECT * FROM level_activities ORDER BY activities_date DESC";
                    
                        $result_set=mysqli_query($con,$sql_query);

                        if(mysqli_num_rows($result_set)>0)
                        {

                            while($row=mysqli_fetch_assoc($result_set))
                            {
                                $count++;
                                if($count<=8){
                                    ?>  
                                        <tr height="50px"> 
                                            <td align="center"><?php echo $row['level_description'];?></td>
                                            <td align="center"><?php echo $row['activities_description'];?></td>
                                            <td align="center"><?php echo $row['activities_date'];?></td>
                                        </tr>
                                    <?php
                                } 
                            }   
                        }
                ?>

                <?php
                    $count=0;
                    $sql_query="SELECT * FROM rt_activities ORDER BY activities_date DESC";
                    
                        $result_set=mysqli_query($con,$sql_query);

                        if(mysqli_num_rows($result_set)>0)
                        {

                            while($row=mysqli_fetch_assoc($result_set))
                            {
                                $count++;
                                if($count<=8){
                                    ?>  
                                        <tr height="50px"> 
                                            <td align="center"><?php echo $row['type'];?></td>
                                            <td align="center"><?php echo $row['activities_description'];?></td>
                                            <td align="center"><?php echo $row['activities_date'];?></td>
                                        </tr>
                                    <?php
                                } 
                            }   
                        }
                ?>

                <?php
                    $count=0;
                    $sql_query="SELECT * FROM sy_activities ORDER BY activities_date DESC";
                    
                        $result_set=mysqli_query($con,$sql_query);

                        if(mysqli_num_rows($result_set)>0)
                        {

                            while($row=mysqli_fetch_assoc($result_set))
                            {
                                $count++;
                                if($count<=8){
                                    ?>  
                                        <tr height="50px"> 
                                            <td align="center"><?php echo $row['sy_description'];?></td>
                                            <td align="center"><?php echo $row['activities_description'];?></td>
                                            <td align="center"><?php echo $row['activities_date'];?></td>
                                        </tr>
                                    <?php
                                } 
                            }   
                        }
                ?>
            </table>
        </div>
    </body>
</html>