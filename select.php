<?php
    include_once 'db.php';
    $user_select = $_POST['user'];
   
    // echo gettype($user_select) . "<br>";
    $id = (int)$user_select;

    $get_data_query =  "SELECT * FROM customers WHERE id=$id;";
    $data_fetched = mysqli_query($mysqli,$get_data_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/226212732c.js" crossorigin="anonymous"></script>
    <title>Select User</title>
</head>
<body>
<div class=" p-3 mb-4 shadow bg-white rounded" style="color: white;">
        <a href="./index.php"><h1><i class="fas fa-university" style="color:green;"></i> <span style="color:black;"> Banking System</span></h1></a>
</div>
<div class="container-fluid mb-5">
        <div class="row">
            <div class="col">
                <ol class="col-12 breadcrumb shadow">
                    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="./customers.php">Customers</a></li>
                    <li class="breadcrumb-item">Customer</li>   
                </ol>
            </div>
        </div>
</div>

  
    <div class="container">
    <h2 class="mb-5"><i class="fas fa-info-circle"></i> Customer Details</h2>
    <div class="card  mb-3 shadow-lg" style="max-width: 20rem;">
    <?php
        $rows=mysqli_fetch_assoc($data_fetched);
    ?> 

    <div class="card-header" style="font-size:1.2rem;">Account Number: <?php echo $rows['account_number'];  ?> </div>
    <div class="card-body text-dark">
    
        <h6>First Name: <?php echo $rows['first_name'];  ?></h6>
        <h6>Last Name: <?php echo $rows['last_name'];  ?></h6>
        <h6>Date of Birth: <?php echo $rows['dob']; ?></h6>
        <h6>Transactions: <?php echo $rows['transactions'];  ?></h6>
        <h6>Balance: $<?php echo $rows['balance'];  ?></h6>
    </div>
    </div>
    </div>
            <div class="container mt-5">
                <form action="./transfer.php">
                    <button type="submit" class="btn btn-warning shadow rounded">Make a Transfer</button>
                </form>
            </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>


