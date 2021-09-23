<?php
    include('bus.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premid</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        html, body {
        width: 100%;
        height: 100%;
        margin: 0 auto;
        background-color: black;
        }

        .card {
            width: 45rem;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="card container mt-3 px-3">
        <h4 class="text-center card-header">BUS TICKET</h4>
        <br>
        <h6 class="text-center">Fare: Php 50.00</h6>
        <hr>
        <div class="sales">Total Sales:
            <?php
                if(isset($_SESSION['passengerL'])) {
                    $ctrSales = 0;
                    foreach($_SESSION['passengerL'] as $passengers) {
                        $ctrSales++;
                    }
                    $TS = $ctrSales * 50;
                    echo "Php. ".$TS.".00";
                }
            ?>
        </div>

        <form class="container form" action="" method="POST">
            <div class="row">
                <!-- <div class="col-12 col-sm-6"> -->
                <div class="mt-3 col-md-6">
                    <label for="pName">Passenger Name</label>
                    <input type="text" name="pName" id="pName" class="form-control mt-2">
                </div>
                
                <div class="mt-3 col-md-6">
                    <label for="pDest">Passenger Destination</label>
                    <input type="text" name="pDest" class="form-control mt-2">
                </div>
               
                <div class="mt-3 col-md-6">
                    <label for="busNum">Bus Number</label>
                    <select id="busNum" name="busNum" class="form-select d-block w-100">
                        <option value="">Choose...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary mt-5 mb-2 btn-lg">Book Ticket</button>
                </div>
            </div>
        <!-- </div> -->
    </div>

    <div class="container mt-5 card">
        <table class="table table-light table-striped table-danger">
            <thead>
                <tr>
                    <th scope="col">
                        <h4>Passenger Ticket</h4>
                    </th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th scope="row ">Passenger Name: </th>
                    <td><?php echo (isset($pass_name)) ? $pass_name : ("N/A");?></td>
                </tr>

                <tr>
                    <th scope="row">Destination: </th>
                    <td><?php echo (isset($pass_dest)) ? $pass_dest : ("N/A");?></td>
                </tr>

                <tr>
                    <th scope="row">Ticket Number: </th>
                    <td colspan="2"><?php echo (isset($_SESSION['passengerCtr'])) ? $_SESSION['passengerCtr'] : ("N/A");?></td>
                </tr>

                <tr>
                    <th scope="row">Bus Number: </th>
                    <td colspan="2"><?php echo (isset($ticketNum)) ? $ticketNum : ("N/A");?></td>
                </tr>

                <tr>
                    <th scope="row">Fare: </th>
                    <td colspan="2"><?php echo (isset($_POST['submit'])) ? ("PHP 50.00") : ("N/A"); ?></td>
                </tr>


            </tbody>
        </table>
    </div>


    <div class="container card mt-5">
        <h4 class="text-center card-header bg-danger" style="color:white">BUSES</h4>
        <hr>

        <div class="table-responsive-sm">
            <h5 class="bg-danger text-center" style="color:white">BUS 1</h3>
            <table class="table table-danger table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Bus Number</th>
                        <th scope="col">Ticket Number</th>
                        <th scope="col">Passenger Name</th>
                        <th scope="col">Passenger Destination</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(isset($_SESSION['passengerL'])) {
                            $bus1 = 0;
                            foreach($_SESSION['passengerL'] as $passengers) {
                                echo "<tr>";
                                if($passengers["bn"] == 1) {
                                    if($bus1 < 5) {
                                        $bus1++;
                                        foreach($passengers as $key => $value) {
                                            echo "<td>".$value."</td>";
                                        }
                                    }
                                    else {
                                        delPassenger();
                                        echo '<script>alert("BUS IS FULL!!")</script>';
                                    }
                                }
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>


        <div class="table-responsive-sm">
            <h5 class="bg-danger text-center" style="color:white">BUS 2</h5>
            <table class="table table-danger table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Bus Number</th>
                        <th scope="col">Ticket Number</th>
                        <th scope="col">Passenger Name</th>
                        <th scope="col">Passenger Destination</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(isset($_SESSION['passengerL'])) {
                            $bus2 = 0;
                            foreach($_SESSION['passengerL'] as $passengers) {
                                echo "<tr>";
                                if($passengers["bn"] == 2) {
                                    if($bus2 < 5) {
                                        $bus2++;
                                        foreach($passengers as $key => $value) {
                                            echo "<td>".$value."</td>";
                                        }
                                    }
                                    else {
                                        delPassenger();
                                        echo '<script>alert("BUS IS FULL!!")</script>';
                                    }
                                }
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive-sm">
            <h5 class="bg-danger text-center" style="color:white">BUS 3</h5>
            <table class="table table-danger table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Bus Number</th>
                        <th scope="col">Ticket Number</th>
                        <th scope="col">Passenger Name</th>
                        <th scope="col">Passenger Destination</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(isset($_SESSION['passengerL'])) {
                            $bus3 = 0;
                            foreach($_SESSION['passengerL'] as $passengers) {
                                echo "<tr>";
                                if($passengers["bn"] == 3) {
                                    if($bus3 < 5) {
                                        $bus3++;
                                        foreach($passengers as $key => $value) {
                                            echo "<td>".$value."</td>";
                                        }
                                    }
                                    else {
                                        delPassenger();
                                        echo '<script>alert("BUS IS FULL!!")</script>';
                                    }
                                }
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive-sm">
            <h5 class="bg-danger text-center" style="color:white">BUS 4</h5>
            <table class="table table-danger table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Bus Number</th>
                        <th scope="col">Ticket Number</th>
                        <th scope="col">Passenger Name</th>
                        <th scope="col">Passenger Destination</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(isset($_SESSION['passengerL'])) {
                            $bus4 = 0;
                            foreach($_SESSION['passengerL'] as $passengers) {
                                echo "<tr>";
                                if($passengers["bn"] == 4) {
                                    if($bus4 < 5) {
                                        $bus4++;
                                        foreach($passengers as $key => $value) {
                                            echo "<td>".$value."</td>";
                                        }
                                    }
                                    else {
                                        delPassenger();
                                        echo '<script>alert("BUS IS FULL!!")</script>';
                                    }
                                }
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive-sm">
            <h5 class="bg-danger text-center" style="color:white">BUS 5</h5>
            <table class="table table-danger table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Bus Number</th>
                        <th scope="col">Ticket Number</th>
                        <th scope="col">Passenger Name</th>
                        <th scope="col">Passenger Destination</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(isset($_SESSION['passengerL'])) {
                            $bus5 = 0;
                            foreach($_SESSION['passengerL'] as $passengers) {
                                echo "<tr>";
                                if($passengers["bn"] == 5) {
                                    if($bus5 < 5) {
                                        $bus5++;
                                        foreach($passengers as $key => $value) {
                                            echo "<td>".$value."</td>";
                                        }
                                    }
                                    else {
                                        delPassenger();
                                        echo '<script>alert("BUS IS FULL!!")</script>';
                                    }
                                }
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>