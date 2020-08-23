<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
    
        if(isset($_POST['submit1']))
        {

            $s_id = $_POST['edit'];
            //Retrive data from supplier table
            $selectSupplier = "SELECT * FROM supplier WHERE  s_id ='$s_id' ";
            //Performs query on databse
            $supplierquery = mysqli_query($db,$selectSupplier);
            //Fetch result row as associative array
                while($row = mysqli_fetch_assoc($supplierquery))
                {
                    //Display supplier table data with edit buutton
                    echo "
                            <form method=\"post\" class=\"form-1\" style=\"margin-top:100px;\">
                                <h3 style=\"text-align:center;\">Edit Supplier</h3>
                                <p>Supplier Name</p>
                                <input type=\"text\" class=\"input\" name=\"s_name\" id=\"s_name\" placeholder=\"Edit Supplier Name\" value=\"{$row['s_name']}\">
                                <p>Location</p>
                                <input type=\"text\" class=\"input\" name=\"location\" id=\"location\" placeholder=\"Edit  Location\" value=\"{$row['location']}\">
                                <p>Email</p>
                                <input type=\"email\" class=\"input\" name=\"email\" id=\"email\" placeholder=\"Edit the Email\" value=\"{$row['email']}\">
                                <p>Contact No :</p>
                                <input type=\"number\" class=\"input\" name=\"telephone\" id=\"telephone\" placeholder=\"Edit the Contact\" value=\"{$row['telephone']}\">
                                <p>Credit Period</p>
                                <input type=\"number\"  class=\"input\" name=\"credit_period\" id=\"credit_period\" placeholder=\"Edit the credit Period\" value=\"{$row['credit_period']}\">
                                <p></p>
                                <input type=\"hidden\" value=" .$row['s_id']. " name=\"EditID\">
                                <input type=\"submit\" name=\"EditSubmit\" value=\"EDIT\" class=\"btn-5\">

                            </form>";
                }       
             
        }

    ?>
    <?php 

    if (isset($_POST['EditSubmit'])) 
    {
        $uid = $_POST['EditID'];
        $newSupplierName = $_POST['s_name'];
        $newLocation = $_POST['location'];
        $newEmail = $_POST['email'];
        $newContact = $_POST['telephone'];
        $newCreditPeriod = $_POST['credit_period'];
        
        //Edit supplier table data by supplier id
        $EditQuery= "UPDATE supplier SET s_name ='$newSupplierName',location = '$newLocation',email = '$newEmail',telephone ='$newContact',credit_period ='$newCreditPeriod' WHERE s_id = '$uid' ";
        $sqlQuery = mysqli_query($db,$EditQuery);
        if ($sqlQuery) 
        {
            echo "<script>alert('Successfuly Upadated...')</script>";
            echo "<script>window.open('removeSupplier.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('Unsuccessfuly Upadated...')</script>";
            echo "<script>window.open('removeSupplier.php','_self')</script>";
        }
    }
        


    ?>
</body>
</html>
