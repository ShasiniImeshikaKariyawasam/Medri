<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
    
        if(isset($_POST['editDrug'])){

            $sid = $_POST['edit'];
            //Retrive data from supplier table
            $selectDrug = "SELECT * FROM drug WHERE  d_id ='$sid' ";
            //Performs query on databse
            $DrugQuery = mysqli_query($db,$selectDrug);
            //Fetch result row as associative array
                while($row = mysqli_fetch_assoc($DrugQuery)){
                    //Display supplier table data with edit buutton
                    echo "
                            <form method=\"post\" class=\"form-1\" style=\"margin-top:100px;\">
                                <h3 style=\"text-align:center;\">Edit Drug</h3>
                                <p>Drug Name</p>
                                <input type=\"text\" class=\"input\" name=\"d_name\" id=\"d_name\" placeholder=\"Edit Drug Name\" value=\"{$row['d_name']}\">

                                <p>Brand</p>
                                <input type=\"text\" class=\"input\" name=\"brand\" id=\"brand\" placeholder=\"Edit  brand\" value=\"{$row['brand']}\">

                                <p>Category</p>
                                <input type=\"text\" class=\"input\" name=\"category\" id=\"category\" placeholder=\"Edit the category\" value=\"{$row['category']}\">

                                <p>Supplier Id</p>
                                <input type=\"number\" class=\"input\" name=\"s_id\" id=\"s_id\" placeholder=\"Edit supplier Id\" value=\"{$row['s_id']}\">

                                <p>Reorder Level</p>
                                <input type=\"number\"  class=\"input\" name=\"reorder_level\" id=\"reorder_level\" placeholder=\"Edit reorder level\" value=\"{$row['reorder_level']}\">

                                 <p>Price</p>
                                <input type=\"number\"  class=\"input\" name=\"price\" id=\"price\" placeholder=\"Edit price\" value=\"{$row['price']}\">


                                <p></p>
                                <input type=\"hidden\" value=" .$row['d_id']. " name=\"EditID\">
                                <input type=\"submit\" name=\"EditSubmit\" value=\"EDIT\" class=\"btn-5\">

                            </form>";


            }       
             
        }

    ?>
    <?php 
        if (isset($_POST['EditSubmit'])) {
        $uid = $_POST['EditID'];
        $newDrugName = $_POST['d_name'];
        $newBrand = $_POST['brand'];
        $newCategory = $_POST['category'];
        $newSupplierId = $_POST['s_id'];
        $newReorderLevel = $_POST['reorder_level'];
        $newPrice = $_POST['price'];
        
        //Edit supplier table data by supplier id
        $EditQuery= "UPDATE drug SET d_name ='$newDrugName', category = '$newCategory', reorder_level ='$newReorderLevel', price = '$newPrice', s_id ='$newSupplierId', brand = '$newBrand' WHERE d_id = '$uid' ";
        $sqlQuery = mysqli_query($db,$EditQuery);
        if ($sqlQuery) {
            echo "<script>alert('Successfuly Upadated...')</script>";
            echo "<script>window.open('viewDrug.php','_self')</script>";
        }
        else{
            echo "<script>alert('Unsuccessfuly Upadated...')</script>";
            echo "<script>window.open('editDrug.php','_self')</script>";
        }
        }
        


    ?>
</body>
</html>
