
</div>
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/dist/js/adminlte.min.js?v=3.2.0"></script>

<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/jszip/jszip.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../assets/js/sweetalert.js"></script>
<script>
$(document).ready(function () {
  $('.summernote').summernote()
    $('.table').DataTable();
    $('.table1').DataTable();
  })
  $('.a-confirm').on('click', function (e) {
    e.preventDefault()
    val = $(this).attr('href')
    Swal.fire({
      title: "Apakah Kamu yakin ?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#118613",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya"
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = val
        // Swal.fire({
        //   title: "Deleted!",
        //   text: "Your file has been deleted.",
        //   icon: "success"
        // });
      }
    });
  })
  $('.foto_add').on('change',function(event) {
        $(".view_img_add").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    });
    $('.foto_update').on('change',function(event) {
        $(".view_img_update").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    });
</script>

</body>

</html>
<?php
if (isset($_SESSION['flash_data'])) {
  unset($_SESSION['flash_data']);
}
?>