<?php 
  include('../models/connection.php');
  include('../models/taxonomy.php');

  $sql = "SELECT * FROM taxonomy";
  $query = MYSQLI_QUERY($connect,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bang Soal</title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="../asset/css/plugins/simple-line-icons.css"/>
    <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../asset/css/plugins/fullcalendar.min.css"/>
    <link rel="stylesheet" type="text/css" href="../asset/css/plugins/datatables.bootstrap.min.css"/>
    <link href="../asset/css/style.css" rel="stylesheet">
    <style>
      .nav-list>li>a {
        padding: 0px 15px !important;
      }
    </style>
	<!-- end: Css -->

	<link rel="shortcut icon" href="../asset/img/logomi.png">
  </head>

 <body id="mimin" class="dashboard">
      <!-- navigasi atas -->
      <?php include('./component/topbar.php') ?>
      <div class="container-fluid mimin-wrapper">
        <!-- navigasi samping -->
        <?php include('./component/sidebar.php') ?>
          <!-- start: content -->
            <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">
                          Taxonomy Bloom
                        </h3>
                      </div>
                    <div class="col-md-6 col-sm-12">
                    </div>
                  </div>                    
                </div>
                <div class="col-md-12" style="padding:20px;">
                <div class="col-md-12 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-body">
                      <?php if (isset($result)){ echo "<div>" . $result . "</div>";} ?>
                      <button class="btn btn-primary btn-lg addBtn" style="margin-bottom: 10px;" id="add">Add</button>
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th hidden>Id</th>
                          <th>Name</th>
                          <th>Cognitif</th>
                          <th style="width: 150px !important;">#</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          while ($row = MYSQLI_FETCH_ASSOC($query)) {
                        ?>
                        <tr>
                          <td hidden><?php echo $row['id'] ?></td>
                          <td><?php echo $row['name'] ?></td>
                          <td><?php echo $row['cognitive'] ?></td>
                          <td style="width: 150px !important;">
                            <button class="btn btn-warning btn-sm editBtn" id="edit">edit</button>
                            <button class="btn btn-danger btn-sm deleteBtn" id="hapus">hapus</button>
                        </td>
                        </tr>
                        <?php 
                          }
                        ?>
                      </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
            </div>
          <!-- end: content -->

          <!-- Modal -->
          <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="addModalLabel">Add</h3>
                </div>
                <form action="" method="post">
                  <div class="modal-body">
                        <input hidden type="text" name="id" id="id">
                        <input hidden type="text" name="type" id="type">
                        <label for="name">Name:</label>
                        <input class="form-control" type="text" name="name" id="name" required autocomplete="off">
                        <label for="name" style="margin-top: 10px;">Cognitif:</label>
                        <input class="form-control" type="text" name="cognitive" id="cognitive" required autocomplete="off">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal Delete  -->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="deleteLabel">Add</h3>
                </div>
                <form action="" method="post">
                  <div class="modal-body" align='center'>
                      <input hidden type="text" name="id" id="idDelete">
                      <input hidden type="text" name="type" id="typeDelete">
                      <h1 style="color: crimson;"><span class="glyphicon glyphicon-trash"></span></h1>
                      <h3>Anda yakin ingin menghapus ini ?</h3>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End Modal -->
      </div>
      <!-- navigasi samping -->
      <?php include('./component/mobile_nav.php') ?>
      

    <!-- start: Javascript -->
    <script src="../asset/js/jquery.min.js"></script>
    <script src="../asset/js/jquery.ui.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
   
    
    <!-- plugins -->
    <script src="../asset/js/plugins/moment.min.js"></script>
    <script src="../asset/js/plugins/fullcalendar.min.js"></script>
    <script src="../asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="../asset/js/plugins/jquery.vmap.min.js"></script>
    <script src="../asset/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="../asset/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="../asset/js/plugins/jquery.datatables.min.js"></script>
    <script src="../asset/js/plugins/datatables.bootstrap.min.js"></script>
    <script src="../asset/js/plugins/chart.min.js"></script>


    <!-- custom -->
    <script src="../asset/js/main.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        $("#flash-msg").delay(5000).fadeOut("slow");
        
        $('#datatables-example').DataTable();


        $('.addBtn').on('click',function() {

          $('#addModal').modal('show');
          $('#addModalLabel').text('Add');

          $('#id').val('');
          $('#type').val('add');
          $('#name').val('');
          $('#cognitive').val('');
        })

        $('.editBtn').on('click',function() {

          $('#addModal').modal('show');
          $('#addModalLabel').text('Edit');

          $tr = $(this).closest('tr');
          var data = $tr.children('td').map(function() {
            return $(this).text();
          }).get();

          $('#id').val(data[0]);
          $('#type').val('edit');
          $('#name').val(data[1]);
          $('#cognitive').val(data[2]);
        })

        $('.deleteBtn').on('click',function() {

          $('#deleteModal').modal('show');
          $('#deleteLabel').text('Delete');

          $tr = $(this).closest('tr');
          var data = $tr.children('td').map(function() {
            return $(this).text();
          }).get();

          $('#idDelete').val(data[0]);
          $('#typeDelete').val('delete');
        })

      });
    </script>
  <!-- end: Javascript -->
  </body>
</html>