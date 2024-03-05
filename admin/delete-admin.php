<?php
    //Include constants.php file here
    include('../config/constants.php');

    //1.get the id of admin to be deleted
    $id = $_GET['id'];

    //2.Create SQL query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed sucessfully or not
    if($res==true)
    {
        //Query executed sucessfully and admin deleted
        //echo "admin deleted";
        //Create session variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to delete admin
        //echo "Failed to delete admin";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try again later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3.REdirected to manage admin page with message (success/error)

?>