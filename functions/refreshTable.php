<?php
  include '../db/db.php';

  $tableBody = "";
  $tableTop    = '<table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info"><thead><tr class="text-center" role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Title</th>
  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Who is Add?: activate to sort column ascending">Who is Add?</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Description</th>
  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Availability: activate to sort column ascending">Availability</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="General Operations: activate to sort column ascending">General Operations</th></tr></thead><tbody id="tableBody">
  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12">';
  $count = 0;
  $result = mysqli_query($conn,'SELECT * FROM articles');

  while($data = mysqli_fetch_array($result)){
    if (($count % 2) == 0) {$oddEven = "even";}else {$oddEven = "odd";}
    if (($data["isActive"]) == 1) {$isActive = "checked";}else {$isActive = "";}

    $tableBody .="<tr class='".$oddEven." text-center'><td class='dtr-control sorting_1' tabindex='0'>".$data["title"]."</td><td>".$data["whoIsAdd"]."</td><td>".$data["description"]."</td>
      <td><div class='form-group'><div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' ".$isActive ." id='".$data["id"]."'>
      <label class='custom-control-label' for='".$data["id"]."'></label></div></div></td><td><a class='btn btn-sm btn-warning fillArticleModal' data-toggle='modal' data-target='#updateArticleModal' value='".$data["id"]."'>
      <i class='fas fa-pen'></i> Edit</a><a class='btn btn-sm btn-danger deleteArticle ml-2'  value='".$data["id"]."'><i class='fas fa-trash'></i> Delete</a></td></tr>";
    $count++;
  }

  $tableBottom  =  '</tbody><tfoot><tr><th rowspan="1" colspan="1">Title</th><th rowspan="1" colspan="1">Who is Add?</th><th rowspan="1" colspan="1">Description</th><th rowspan="1" colspan="1">Availability</th><th rowspan="1" colspan="1">General Operations</th></tr></tfoot></table></div></div></div>';

  echo $tableTop.$tableBody.$tableBottom;

  mysqli_close($conn);
?>
