<?php include("partials/menu.php");?>

    <!--Maincontent section starts here -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //Displaying session message
                    unset($_SESSION['add']); //Removing session message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete']; //Displaying session message
                    unset($_SESSION['delete']); //Removing session message
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; //Displaying session message
                    unset($_SESSION['update']); //Removing session message
                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }

            
            ?>
            <br><br/>

            <!--Button to add admin-->
            <a href="add-admin.php" class="btn-primary">Add admin</a>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>


                <?php
                    //Query to get all admin
                    $sql = "SELECT * FROM tbl_admin";
                    //Execute all query
                    $res = mysqli_query($conn, $sql);

                    //Check whether teh query is executed or not
                    if($res==TRUE)
                    {
                        //Coungt rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res); //Function to get all the rows in database


                        $sn=1;//Create a variable and assign the value
                        //Check the num of rows
                        if($count>0)
                        {
                            //we have data in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //using while loop to get all data from database
                                //and while loop will run as long as we have data in database

                                //Get individual data
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //Display the value in our table
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>"  class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>

                             <?php
                            } 
                        }
                        else
                        {
                            //we do not have data in database
                        }
                    }
                    
                ?>

                
             </table>
         </div> 
     </div>
    <!--Main content section ends here -->

<?php include("partials/footer.php");?>
