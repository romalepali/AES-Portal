<html>
<head>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="../css/tables.css">
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

    #sortby {
        box-shadow:0px 1px 10px;
        margin: 20px auto;
        width:100%;
        padding:5px;
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
        <h1>Recent Users</h1>
        <div id="sortby">
            <h3>Users</h3>
            <div style="width:98%; overflow:hide;">
                <table align="center">
                    <tr>
                        <th width="400px">User</th>
                        <th width="200px">Operation</th>
                        <th width="200px">Date</th>
                    </tr>
                </table>
            </div>
            <div style="overflow-y:scroll; height:200px;">
                <table align="center">
                    <?php
                        $count=0;
                        if($_SESSION['user_type']=='Super Admin'){
                            $sql_query="SELECT a.*,b.* FROM access a INNER JOIN users b ON a.user_id=b.user_id GROUP BY operation_date DESC";
                        }
                        else{
                            $sql_query="SELECT a.*,b.* FROM access a INNER JOIN users b ON a.user_id=b.user_id WHERE b.user_type!='Super Admin' GROUP BY operation_date DESC";
                        }
                        
                        $result_set=mysqli_query($con,$sql_query);
                        if(mysqli_num_rows($result_set)>0)
                        {
                            while($row=mysqli_fetch_assoc($result_set))
                            {
                                $count++;
                                if($count<=5){
                                ?>  
                                    <tr height="50px"> 
                                        <td width="400px" align="center"><?php echo $row['lname'].", ".$row['fname']." ".$row['mname'];?></td>
                                        <td width="200px" align="center"><?php echo $row['operation'];?></td>
                                        <td width="200px" align="center"><?php echo $row['operation_date'];?></td>
                                    </tr>
                                <?php
                                }
                            }   
                        }
                        else{
                            ?>
                                <tr height="50px">
                                    <td align="center" colspan="3">No users logged in!</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table><br>
            </div>
        </div>
        <br>

        <h1>Recent Changes</h1>                            
        <div id="sortby">
            <h3>Users, Teachers, Students</h3>
            <div style="width:98%; overflow:hide;">
                <table align="center">
                    <tr>
                        <th width="400px">Name</th>
                        <th width="200px">Operation</th>
                        <th width="200px">Date Modified</th>
                    </tr>
                </table>
            </div>
            <div style="overflow-y:scroll; height:200px;">
                <table align="center">
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
                                        <td width="400px" align="center"><?php echo $row['lname'].","." ". $row['fname'] ." ".$row['mname'];?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_description'];?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_date'];?></td>
                                    </tr>
                                <?php
                                }
                            }   
                        }
                        else{
                            ?>
                                <tr height="50px">
                                    <td align="center" colspan="3">No changes found!</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table><br>
            </div>
        </div>
        <br>
        
        <div id="sortby">
            <h3>Section</h3>
            <div style="width:98%; overflow:hide;">
                <table align="center">
                    <tr>
                        <th width="400px">Section</th>
                        <th width="200px">Operation</th>
                        <th width="200px">Date Modified</th>
                    </tr>
                </table>
            </div>
            <div style="overflow-y:scroll; height:200px;">
                <table align="center">
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
                                        <td width="400px" align="center"><?php echo $row['section_description'];?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_description'];?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_date'];?></td>
                                    </tr>
                                <?php
                                }
                            }   
                        }
                        else{
                            ?>
                                <tr height="50px">
                                    <td align="center" colspan="3">No changes found!</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table><br>
            </div>
        </div>
        <br>
        
        <div id="sortby">
            <h3>Level</h3>
            <div style="width:98%; overflow:hide;">
                <table align="center">
                    <tr>
                        <th width="400px">Level</th>
                        <th width="200px">Operation</th>
                        <th width="200px">Date Modified</th>
                    </tr>
                </table>
            </div>
            <div style="overflow-y:scroll; height:200px;">
                <table align="center">
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
                                        <td width="400px" align="center"><?php echo $row['level_description'];?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_description'];?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_date'];?></td>
                                    </tr>
                                <?php
                                }
                            }   
                        }
                        else{
                            ?>
                                <tr height="50px">
                                    <td align="center" colspan="3">No changes found!</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table><br>
            </div>
        </div>
        <br>
        
        <div id="sortby">
            <h3>Record Type</h3>
            <div style="width:98%; overflow:hide;">
                <table align="center">
                    <tr>
                        <th width="400px">Record Type</th>
                        <th width="200px">Operation</th>
                        <th width="200px">Date Modified</th>
                    </tr>
                </table>
            </div>
            <div style="overflow-y:scroll; height:200px;">
                <table align="center">
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
                                        <td width="400px" align="center"><?php echo $row['type'];?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_description'];?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_date'];?></td>
                                    </tr>
                                <?php
                                }
                            }   
                        }
                        else{
                            ?>
                                <tr height="50px">
                                    <td align="center" colspan="3">No changes found!</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table><br>
            </div>
        </div>
        <br>
        
        <div id="sortby">
            <h3>School Year</h3>
            <div style="width:98%; overflow:hide;">
                <table align="center">
                    <tr>
                        <th width="400px">School Year</th>
                        <th width="200px">Operation</th>
                        <th width="200px">Date Modified</th>
                    </tr>
                </table>
            </div>
            <div style="overflow-y:scroll; height:200px;">
                <table align="center">
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
                                        <td width="400px" align="center"><?php echo $row['sy_description'];?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_description'];?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_date'];?></td>
                                    </tr>
                                <?php
                                }
                            }   
                        }
                        else{
                            ?>
                                <tr height="50px">
                                    <td align="center" colspan="3">No changes found!</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table><br>
            </div>
        </div>
        <br>
        
        <div id="sortby">
            <h3>Records</h3>
            <div style="width:98%; overflow:hide;">
                <table align="center">
                    <tr>
                        <th width="400px">Name</th>
                        <th width="200px">Operation</th>
                        <th width="200px">Date Modified</th>
                    </tr>
                </table>
            </div>
            <div style="overflow-y:scroll; height:200px;">
                <table align="center">
                    <?php
                        $count=0;
                        $sql_query="SELECT a.*,b.type,c.lname,c.fname,c.mname FROM records_activities a INNER JOIN record_type b ON a.record_type_id=b.id INNER JOIN students c ON a.student_id=c.student_id GROUP BY a.activities_date DESC";
                        
                        $result_set=mysqli_query($con,$sql_query);
                        if(mysqli_num_rows($result_set)>0)
                        {
                            while($row=mysqli_fetch_assoc($result_set))
                            {
                                $count=0;
                                if($count<=5){
                                ?>  
                                    <tr height="50px"> 
                                        <td width="400px" align="center"><?php echo $row['lname'].", ".$row['fname']." ".$row['lname'];?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_description']."<br>[".$row['type']."]";?></td>
                                        <td width="200px" align="center"><?php echo $row['activities_date'];?></td>
                                    </tr>
                                <?php
                                }
                            }   
                        }
                        else{
                            ?>
                                <tr height="50px">
                                    <td align="center" colspan="3">No changes found!</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table><br>
            </div>
        </div>
        <br>

        <h1>Recent Updates</h1>
        <div id="sortby">
            <h3>Updates</h3>
            <div style="width:98%; overflow:hide;">
                <table align="center">
                    <tr>
                        <th width="425px">Update</th>
                        <th width="175px">Date Posted</th>
                    </tr>
                </table>
            </div>
            <div style="overflow-y:scroll; height:200px;">
                <table align="center">
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
                                        <td width="425px" align="center"><?php echo $row['update_description'];?></td>
                                        <td width="175px" align="center"><?php echo $row['activities_date'];?></td>
                                    </tr>
                                <?php
                                }
                            }   
                        }
                        else{
                            ?>
                                <tr height="50px">
                                    <td align="center" colspan="3">No updates found!</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table><br>
            </div>
        </div>
    </div>
</body>
</html>