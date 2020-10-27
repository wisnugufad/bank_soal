<?php 
  include('../models/connection.php');
  include('../models/chapter.php');

  $sql = "SELECT a.*, b.name as subject_name FROM chapter as a JOIN subject as b ON b.id = a.subject_id";
  $query = MYSQLI_QUERY($connect,$sql);

  $sqlSubject = "SELECT a.*, b.name as jenjang_name FROM subject as a JOIN jenjang as b ON b.id = a.jenjang_id";
  $querySubject = MYSQLI_QUERY($connect,$sqlSubject);

  $sqlTaxonomy = "SELECT * FROM taxonomy";
  $queryTaxonomy = MYSQLI_QUERY($connect,$sqlTaxonomy);

  function abc($i)
  {
    switch ($i) {
      case '0':
        echo "A. ";
        break;
      case '1':
        echo "B. ";
        break;
      case '2':
        echo "C. ";
        break;
      case '3':
        echo "D. ";
        break;
      default:
        echo "E. ";
        break;
    }
  }
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

      .modal-xl {
        width: 90%;
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
                          Question List
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
                          <th hidden>subject_id</th>
                          <th>Subject</th>
                          <th>Chapter Name</th>
                          <th style="width: 150px !important;">#</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          while ($row = MYSQLI_FETCH_ASSOC($query)) {
                        ?>
                        <tr>
                          <td hidden><?php echo $row['id'] ?></td>
                          <td hidden><?php echo $row['subject_id'] ?></td>
                          <td><?php echo $row['subject_name'] ?></td>
                          <td><?php echo $row['name'] ?></td>
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
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" id="addModalLabel">Add</h3>
                </div>
                <form action="" method="post">
                  <div class="modal-body">
                    
                    <input hidden type="text" name="id" id="id">
                    <input hidden type="text" name="type" id="type">

                    <div class="row">
                      <div class="col-md-4">
                        <label for="subject_id">Subject:</label>
                        <select name="subject_id" id="subject_id" class="form-control">
                          <?php 
                            while ($rowSubject = MYSQLI_FETCH_ASSOC($querySubject)) {
                          ?>
                              <option value="<?php echo $rowSubject['id']; ?>"><?php echo "(".$rowSubject['jenjang_name'].") - ".$rowSubject['name']; ?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="chapter_id">Chapter:</label>
                        <select name="chapter_id" id="chapter_id" class="form-control">
                          <?php 
                            while ($rowChapter = MYSQLI_FETCH_ASSOC($queryChapter)) {
                          ?>
                              <option value="<?php echo $rowChapter['id']; ?>"><?php echo $rowChapter['name']; ?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="taxonomy_id">Taxonomy:</label>
                        <select name="taxonomy_id" id="taxonomy_id" class="form-control">
                          <?php 
                            while ($rowSubject = MYSQLI_FETCH_ASSOC($queryTaxonomy)) {
                          ?>
                              <option value="<?php echo $rowSubject['id']; ?>"><?php echo "(".$rowSubject['cognitive'].") - ".$rowSubject['name']; ?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                    <!-- form text -->
                    <label for="name" style="margin-top: 10px;">Text 1:</label>
                    <textarea class="form-control" name="text1" id="text1" required autocomplete="off" ></textarea>

                    <label for="name" style="margin-top: 10px;">Image:</label>
                    <input class="form-control" type="file" name="image" id="image">

                    <label for="name" style="margin-top: 10px;">Text 2:</label>
                    <textarea class="form-control" name="text2" id="text2" required autocomplete="off" ></textarea>
                    
                    <!-- answer question -->
                    <label for="name" style="margin-top: 10px;">
                      Answer (mark the right answer) :
                    </label>
                    <div class="row">
                      <?php 
                        for ($i=0; $i < 5 ; $i++) { 
                      ?>
                      <div class="col-lg-6" style="margin-top: 10px;">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <?php abc($i) ?>
                            <input type="radio" name='answer[]'>
                          </span>
                          <input type="text" class="form-control" name='is_true[]'>
                        </div><!-- /input-group -->
                      </div>
                      <?php
                        }
                      ?>
                    </div>
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

        $("#subject_id").change(function(){
      	var subject_id = $("#subject_id").val();
          	$.ajax({
          		type: 'POST',
              	url: "../models/get_chapter.php",
              	data: {subject_id: subject_id},
              	cache: false,
              	success: function(msg){
                  $("#chapter_id").html(msg);
                }
            });
        });


        $('.addBtn').on('click',function() {

          $('#addModal').modal('show');
          $('#addModalLabel').text('Add');

          $('#id').val('');
          $('#type').val('add');
          $('#name').val('');
          $('#subject_id').val('');
          $('#chapter_id').val('');
          $('#taxonomy_id').val('');
        })

        $('.editBtn').on('click',function() {
          
          $('#addModal').modal('show');
          $('#addModalLabel').text('Edit');

          $tr = $(this).closest('tr');
          var data = $tr.children('td').map(function() {
            return $(this).text();
          }).get();
          console.log(data);
          $('#id').val(data[0]);
          $('#type').val('edit');
          $('#name').val(data[3]);
          $('#subject_id').val(data[1]);
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