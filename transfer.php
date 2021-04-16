<?php
 include_once 'db.php';
 
 $get_data_query =  "SELECT * FROM customers;";
 $data_fetched = mysqli_query($mysqli,$get_data_query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Transfer</title>
    <script src="https://kit.fontawesome.com/226212732c.js" crossorigin="anonymous"></script>
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
                    <li class="breadcrumb-item"><a href="./select.php">Customer</a></li>  
                    <li class="breadcrumb-item">Transfer</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container">
       <div class="row-12 mt-5">
                <div class="col-xs-12">
                <form action="./validate.php" method="POST">
                <h4 class="label">Select customer to transfer money:</h4>
                    <input type="number" class="form-control mb-2" placeholder="Enter Amount...." name="amount">
                    <select class="form-select" aria-label="" name="user">
                    <option selected>Select user</option>
                    <?php
                    while($rows=mysqli_fetch_assoc($data_fetched)){
                    ?>
                    <option value="<?php echo $rows['id']?>"><?php echo $rows['first_name'], ' ' , $rows['last_name']; ?></option>
                    <?php
                    }
                    ?>

                    </select>
                <button type="submit" class="btn btn-warning mt-3 shadow">Make Transfer</button>
                </form>
                </div>
        <div class="row-8 text-center">
        <img src="./img/transfer.jpg"  width="570" height="400"alt="">
        </div>
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