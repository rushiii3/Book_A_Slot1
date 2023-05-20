<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Cancel Slot</title>
</head>
<body>

<?php
         include("session.php");
         require "connection/connect.php";
         require_once("loader.html"); 
         require "connection/connect.php";
     ?>
    <main id="main">

        <?php
     include("navigation.html");
    ?>

<div class="container mt-2">
        <div class="row p-3">

        <?php
date_default_timezone_set("Asia/Calcutta");
$today_date = date("Y-m-d");
$get_events_pending_approved="SELECT * FROM `EVENT` WHERE user_name = '$user_email' AND event_date > '$today_date'";
$result_of_events_pending_approved = mysqli_query($con,$get_events_pending_approved);
if(mysqli_num_rows($result_of_events_pending_approved)>0)
{
    while($row_of_query = mysqli_fetch_assoc($result_of_events_pending_approved))
    {
        ?>


            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card shadow p-1" style="width: auto;border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo($row_of_query['event_name']); ?></h5>
                        <div class="badge bg-success p-1 mb-2 
                        <?php
                    if($row_of_query['status_value']=="Approved")
                    {
                        echo("bg-success");
                    }
                    elseif($row_of_query['status_value']=="Pending")
                    {
                        echo("bg-warning");
                    }
                    else{
                        echo("bg-danger");
                    }
                    ?>
                    ">
                    <?php echo($row_of_query['status_value']); ?>
                    </div>
                        <!-- <h6 class="card-subtitle mb-2 text-body-secondary">29 MAY 2023</h6> -->
                        <p class="card-text"> <span class="fw-bold">Description : </span>  <?php echo($row_of_query['event_description']); ?>  </p>
                        <p class="card-text"> <span class="fw-bold">Date : </span> <?php echo(date('d M Y',strtotime($row_of_query['event_date']))); ?></p>
                        <p class="card-text"> <span class="fw-bold">Time : </span> <?php echo(date('H:m A',strtotime($row_of_query['event_start_time']))); ?> to <?php echo(date('H:m A',strtotime($row_of_query['event_end_time']))); ?> </p>
                        <p class="card-text"> <span class="fw-bold">Venue : </span> <?php echo($row_of_query['ar_name']); ?> </p>
                        <button type="button" class="btn btn-primary btn-danger w-100 my-1" data-bs-toggle="modal" data-bs-target="#failed">
  Cancel
</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="failed" tabindex="-1" aria-labelledby="staticBackdropLabel" >
                <div class="modal-dialog modal-dialog modal-dialog-centered w-75 mx-auto">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Reason why you want to cancel the slot?</h1>
                    </div>
                    <div class="modal-body">
                    <textarea class="form-control" id="eventDescription" rows="5"></textarea>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger px-3" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#confirmation" >Yes</button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="confirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" >
                <div class="modal-dialog modal-dialog modal-dialog-centered w-75 mx-auto">
                    <div class="modal-content">
                    <div class="modal-body">
                    <p class="fs-6 text-center">
                        Are you sure you want to cancel the slot?
                    </p>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger px-3" >Yes</button>
                    </div>
                    </div>
                </div>
            </div>








           <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




<?php
    }
}
?>
            




        </div>
    </div>
    </main>
    
</body>
</html>