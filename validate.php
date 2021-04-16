<?php 
    include_once 'db.php';
    $user_select = $_POST['user'];
    $id = (int)$user_select;
    // echo $id;

    $amount_str = $_POST['amount'];
    $amount = (int)$amount_str;
    // echo $amount;

    $get_data_query =  "SELECT * FROM customers WHERE id=$id";
    $data_fetched = mysqli_query($mysqli,$get_data_query);
    $rows=mysqli_fetch_assoc($data_fetched);
    
    $current_balance_str = $rows['balance'];
    $transactions_str =  $rows['transactions'];
    $current_balance = (int)$current_balance_str;
    $transactions = (int)$transactions_str;
    $new_bal=0;
    $new_bal = $current_balance + $amount;
    $transactions = $transactions + 1;
    $set_data_query = "UPDATE customers SET balance=$new_bal, transactions=$transactions WHERE id=$id;";

    // <?php $data_updated = mysqli_query($mysqli,$set_data_query); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Transactions Status</title>
    <script src="https://kit.fontawesome.com/226212732c.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="p-3 mb-4 shadow bg-white rounded" style="color: white;">
        <a href="./index.php"><h1><i class="fas fa-university" style="color:green;"></i> <span style="color:black;"> Banking System</span></h1></a>
</div>
    <div class="container mt-5">       
        <div class="row">
            <div class="col">
            <?php if(mysqli_query($mysqli,$set_data_query)) { ?>
                <h1 class="text-center"><i class="fas fa-check-square" style="color:green;"></i> Transaction Successful</h1>
                <h6 class="text-center text-muted">redirecting to homepage.....</h6>
            <?php }else {  ?>
                <h1 class="text-center"><i class="fas fa-window-close" style="color:red;"></i>Transaction UnSuccessful</h1>
                <h6 class="text-center text-muted">redirecting to homepage.....</h6>
            <?php } ?>
            </div>
        </div>
    </div>

</body>
</html>

<?php header("refresh:3;url=index.php"); ?>