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
        
        td {
            background-color: whitesmoke;
        }
    </style>

    <body>
        <div class="main">
            <h1>Recent Activity</h1>
            <h3>Users, Teacher, Students</h3>
            <table align="center">
                <tr>
                    <th width="200px">Name</th>
                    <th width="400">Operation</th>
                    <th width="200px">Date Modified</th>
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
                            if($count<=5){
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
                            <tr height="50px">
                                <td align="center" colspan="3">No updates yet!</td>
                            </tr>
                        <?php
                    }
                ?>
            </table><br>
            <h3>Section</h3>
            <table align="center">
                <tr>
                    <th width="200px">Name</th>
                    <th width="400">Operation</th>
                    <th width="200px">Date Modified</th>
                </tr>
                <?php
                    $count=0;
                    $sql_query="SELECT * FROM section_activities ORDER BY activities_date DESC";
                    
                    $result_set=mysqli_query($con,$sql_query);

                    if(mysqli_num_rows($result_set)>0)
                    {
                        while($row=mysqli_fetch_assoc($result_set))
                        {
                            $count++;
                            if($count<=5){
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
                    else{
                        ?>
                            <tr height="50px">
                                <td align="center" colspan="3">No updates yet!</td>
                            </tr>
                        <?php
                    }
                ?>
            </table><br>
            <h3>Level</h3>
            <table align="center">
                <tr>
                    <th width="200px">Name</th>
                    <th width="400">Operation</th>
                    <th width="200px">Date Modified</th>
                </tr>
                <?php
                    $count=0;
                    $sql_query="SELECT * FROM level_activities ORDER BY activities_date DESC";
                    
                    $result_set=mysqli_query($con,$sql_query);

                    if(mysqli_num_rows($result_set)>0)
                    {
                        while($row=mysqli_fetch_assoc($result_set))
                        {
                            $count++;
                            if($count<=5){
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
                    else{
                        ?>
                            <tr height="50px">
                                <td align="center" colspan="3">No updates yet!</td>
                            </tr>
                        <?php
                    }
                ?>
            </table><br>
            <h3>Record Type</h3>
            <table align="center">
                <tr>
                    <th width="200px">Name</th>
                    <th width="400">Operation</th>
                    <th width="200px">Date Modified</th>
                </tr>
                <?php
                    $count=0;
                    $sql_query="SELECT * FROM rt_activities ORDER BY activities_date DESC";
                    
                    $result_set=mysqli_query($con,$sql_query);
                    if(mysqli_num_rows($result_set)>0)
                    {
                        while($row=mysqli_fetch_assoc($result_set))
                        {
                            $count++;
                            if($count<=5){
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
                    else{
                        ?>
                            <tr height="50px">
                                <td align="center" colspan="3">No updates yet!</td>
                            </tr>
                        <?php
                    }
                ?>
            </table><br>
            <h3>School Year</h3>
            <table align="center">
                <tr>
                    <th width="200px">Name</th>
                    <th width="400">Operation</th>
                    <th width="200px">Date Modified</th>
                </tr>
                <?php
                    $count=0;
                    $sql_query="SELECT * FROM sy_activities ORDER BY activities_date DESC";
                    
                    $result_set=mysqli_query($con,$sql_query);
                    if(mysqli_num_rows($result_set)>0)
                    {
                        while($row=mysqli_fetch_assoc($result_set))
                        {
                            $count++;
                            if($count<=5){
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
                    else{
                        ?>
                            <tr height="50px">
                                <td align="center" colspan="3">No updates yet!</td>
                            </tr>
                        <?php
                    }
                ?>
            </table><br>
            <h3>Records</h3>
            <table align="center">
                <tr>
                    <th width="200px">Name</th>
                    <th width="400">Operation</th>
                    <th width="200px">Date Modified</th>
                </tr>
                <?php
                    $count=0;
                    $sql_query="SELECT * FROM records_activities ORDER BY activities_date DESC";
                    
                    $result_set=mysqli_query($con,$sql_query);
                    if(mysqli_num_rows($result_set)>0)
                    {
                        while($row=mysqli_fetch_assoc($result_set))
                        {
                            $count++;
                            if($count<=5){
                                ?>  
                                    <tr height="50px"> 
                                        <td align="center"><?php echo $row['record_type_id'];?></td>
                                        <td align="center"><?php echo $row['activities_description'];?></td>
                                        <td align="center"><?php echo $row['activities_date'];?></td>
                                    </tr>
                                <?php
                            } 
                        }   
                    }
                    else{
                        ?>
                            <tr height="50px">
                                <td align="center" colspan="3">No updates yet!</td>
                            </tr>
                        <?php
                    }
                ?>
            </table><br>
            <h3>Updates</h3>
            <table align="center">
                <tr>
                    <th width="200px">Name</th>
                    <th width="400">Operation</th>
                    <th width="200px">Date Modified</th>
                </tr>
                <?php
                    $count=0;
                    $sql_query="SELECT * FROM updates_activities ORDER BY activities_date DESC";
                    
                    $result_set=mysqli_query($con,$sql_query);
                    if(mysqli_num_rows($result_set)>0)
                    {
                        while($row=mysqli_fetch_assoc($result_set))
                        {
                            $count++;
                            if($count<=5){
                                ?>  
                                    <tr height="50px"> 
                                        <td align="center"><?php echo $row['update_description'];?></td>
                                        <td align="center"><?php echo $row['activities_description'];?></td>
                                        <td align="center"><?php echo $row['activities_date'];?></td>
                                    </tr>
                                <?php
                            } 
                        }   
                    }
                    else{
                        ?>
                            <tr height="50px">
                                <td align="center" colspan="3">No updates yet!</td>
                            </tr>
                        <?php
                    }
                ?>
            </table><br>
        </div>
    </body>
</html>