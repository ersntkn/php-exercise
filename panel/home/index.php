<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Articles</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <section class="col-12 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Articles </h3>
              <a class="btn btn-md btn-primary float-right" id="addArticleModal" data-toggle="modal" data-target="#addArticle"><i class="fas fa-plus"></i> Add Article</a>
            </div>
            <div class="card-body"  id="articlesTable">

            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="addArticle" tabindex="-1" role="dialog" aria-labelledby="addArticle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="title">Title *</label>
          <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Enter title">
        </div>
        <div class="form-group">
          <label for="description">Description *</label>
          <textarea type="text" class="form-control" id="description"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeBtn" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id="saveArticle">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="updateArticleModal" tabindex="-1" role="dialog" aria-labelledby="updateArticleModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="articleTitle">New Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="title">Title *</label>
          <input type="text" class="form-control" id="updatedTitle" aria-describedby="title" placeholder="Enter title">
        </div>
        <div class="form-group">
          <label for="description">Description *</label>
          <textarea type="text" class="form-control" id="updatedDescription"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeBtn" data-dismiss="modal">Close</button>
          <input type="hidden" id="updatedArticleId" >
        <button type="button" class="btn btn-primary" id="updateArticle">Save</button>
      </div>
    </div>
  </div>
</div>




<script>
  $(document).ready(function(){
   refreshTable()
  });

  $(document).on('click', ".custom-control-input", function(){
  var id          = $(this).attr("id");
  if((id != "")){
    $.ajax({
      url: "<?php echo "./functions/isActiveController.php";?>",
      type: "POST",
      data: {id: id},
      success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        if(dataResult.statusCode==200){
          iziToast.success({
              title: 'Availability updated',
              message: '',
              position : "topCenter"
            });
            refreshTable();
        }
     }
    });
  }else {
    iziToast.error({
      title: "System error has occurred.Please try it again later.",
      message: '',
      position : "topCenter"
    });
  }
});

  $(document).on('click', "#saveArticle", function(){
  var title          = $('#title').val();
  var description    = $('#description').val();
  if((title != "") && (description != "")){
    $.ajax({
      url: "<?php echo "./functions/addarticle.php";?>",
      type: "POST",
      data: {title: title,description:description},
      success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        if(dataResult.statusCode==200){
          iziToast.success({
              title: 'Article added on the system successfully.',
              message: '',
              position : "topCenter"
            });
            refreshTable();
            $('#title').val("")
            $('#description').val("")
            $( ".closeBtn" ).click()
        }
        else if(dataResult.statusCode==201){
          iziToast.error({
          title: "System error has occurred.Please try it again later.",
          message: '',
          position : "topCenter"
        });
      }
     }
    });
  }else {
      iziToast.info({
        title: "Please fill the required places.",
        message: '',
        position : "topCenter"
    });
  }
  });

  $(document).on('click', ".fillArticleModal", function(){
  var id          = $(this).attr("value");
  if((id != "")){
    $.ajax({
      url: "<?php echo "./functions/getarticle.php";?>",
      type: "POST",
      data: {id: id},
      success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        $('#updatedTitle').val(dataResult["title"])
        $('#updatedDescription').html(dataResult["description"])
        $('#titleUpdate').val(dataResult["title"])
        $('#updatedArticleId').val(dataResult["id"])
     }
    });
  }else {
      iziToast.info({
        title: "System error has occurred.Please try it again later.",
        message: '',
        position : "topCenter"
    });
  }
  });

  $(document).on('click', "#updateArticle", function(){
  var id                   = $('#updatedArticleId').val()
  var updatedTitle         = $('#updatedTitle').val()
  var updatedDescription   = $('#updatedDescription').val()
  if((id != "") && (updatedTitle != "") && (updatedDescription != "")){
    $.ajax({
      url: "<?php echo "./functions/updatearticle.php";?>",
      type: "POST",
      data: {id: id, updatedTitle:updatedTitle, updatedDescription:updatedDescription},
      success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        if(dataResult.statusCode==200){
          iziToast.success({
              title: 'Article updated successfully.',
              message: '',
              position : "topCenter"
            });
            refreshTable();
            $( ".closeBtn" ).click()
        }else if(dataResult.statusCode==201){
            iziToast.error({
            title: "System error has occurred.Please try it again later.",
            message: '',
            position : "topCenter"
          });
        }
     }
    });
  }else {
    iziToast.info({
      title: "Please fill the required places.",
      message: '',
      position : "topCenter"
    });
   }
  });

  $(document).on('click', ".deleteArticle", function(){
  var id                   = $(this).attr("value")
  if((id != "")){
    iziToast.show({
        theme: 'dark',
        closeOnClick: true,
        icon: 'fas fa-question',
        title: 'Are you sure to delete this article?',
        message: '',
        position: 'center',
        timeout: 3000,
        progressBarColor: 'rgb(0, 255, 184)',
        buttons: [
            ['<button>Ok</button>', function (instance, toast) {
              $.ajax({
                url: "<?php echo "./functions/deletearticle.php";?>",
                type: "POST",
                data: {id: id},
                success: function(dataResult){
                  var dataResult = JSON.parse(dataResult);
                  if(dataResult.statusCode==200){
                    iziToast.success({
                        title: 'Article deleted successfully.',
                        message: '',
                        position : "topCenter"
                      });
                  refreshTable();
                  }else if(dataResult.statusCode==201){
                      iziToast.error({
                      title: "System error has occurred.Please try it again later.",
                      message: '',
                      position : "topCenter"
                    });
                  }
               }
              });
            }, true], // true to focus
            ['<button>Close</button>', function (instance, toast) {
              iziToast.info({
                  title: "Article don't deleted.",
                  message: '',
                  position : "topCenter"
                });
                instance.hide({
                    transitionOut: 'fadeOutUp',
                }, toast, 'buttonName');
            }]
        ],
        onOpening: function(instance, toast){
        },
        onClosing: function(instance, toast, closedBy){
        }
    });
   }
  });

  function refreshTable(){
    $.ajax({
      url: "<?php echo "./functions/refreshTable.php";?>",
      type: "POST",
      data: {},
      success: function(dataResult){
        $("#articlesTable").html(dataResult)
        setTimeout(function()
       {
             $("#example1").DataTable({
               "responsive": true, "lengthChange": false, "autoWidth": false,
               "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
             }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
             $('#example2').DataTable({
               "paging": true,
               "lengthChange": false,
               "searching": false,
               "ordering": true,
               "info": true,
               "autoWidth": false,
               "responsive": true,
             });
       }, 500);

     }
    });
  }

  </script>
