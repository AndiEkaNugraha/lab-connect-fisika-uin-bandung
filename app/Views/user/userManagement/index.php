  <!-- DataTables -->
  <link rel="stylesheet" href="/assets/user/dist/plugins/datatables/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Data Tables</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Tables</li>
        <li><i class="fa fa-angle-right"></i> Data Tables</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
        <h4 class="text-black">Data Export</h4>
        <p>Export data to Copy, CSV, Excel, PDF & Print</p>
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-hover" data-name="cool-table">
            <thead>
              <tr>
                <th>ID #</th>
                <th>Opended by</th>
                <th>Cust.Email</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Assign to</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < 1000; $i++) : ?>
              <tr>
                <td>1001</td>
                <td>Alexander</td>
                <td>alexander@gmail.com</td>
                <td>Sed cursus dapibus diam</td>
                <td><span class="label label-success">Complete</span></td>
                <td>Pierce Sr.</td>
                <td>03-10-2017</td>
              </tr>
              <?php endfor; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>ID #</th>
                <th>Opended by</th>
                <th>Cust.Email</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Assign to</th>
                <th>Date</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      
      <div class="info-box">
      <h4 class="text-black">Data Table</h4>
      <p>Data Table With Full Features</p>
      <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Rendering engine</th>
              <th>Browser</th>
              <th>Platform(s)</th>
              <th>Engine version</th>
              <th>CSS grade</th>
            </tr>
            </thead>
            <tbody>
            <?php for ($i = 0; $i < 1000; $i++) : ?>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 4.0
                </td>
                <td>Win 95+</td>
                <td> 4</td>
                <td>X</td>
              </tr>
            <?php endfor; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Rendering engine</th>
              <th>Browser</th>
              <th>Platform(s)</th>
              <th>Engine version</th>
              <th>CSS grade</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->

  <!-- DataTable --> 
<script src="/assets/user/dist/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="/assets/user/dist/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script>
  $(function () {
    $('#example2.table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    $('#example1.table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

<script src="/assets/user/dist/plugins/table-expo/filesaver.min.js"></script>
<script src="/assets/user/dist/plugins/table-expo/xls.core.min.js"></script>
<script src="/assets/user/dist/plugins/table-expo/tableexport.js"></script>
<script>
  $(".table").tableExport({formats: ["xlsx","xls", "csv", "txt"],    });
</script>