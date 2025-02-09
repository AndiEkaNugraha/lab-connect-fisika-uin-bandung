<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black">List Message</h1>
    <ol class="breadcrumb">
      <li>Message</li>
    </ol>
  </div>
  
  <!-- Main content -->
  <div class="content">
    <div class="card mt-4">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered" data-name="cool-table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Message</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listMessegage as $message) : ?>
                <tr>
                  <td><?= $message->name ?></td>
                  <td><?= $message->email ?></td>
                  <td><?= $message->created_at ?></td>
                  <td class="text-center"><span class="badge <?= $message->followUp ? 'badge-success' : 'badge-danger' ?>"><?= $message->followUp ? 'Done' : 'Need Response' ?></span></td>
                  <td class="text-center" style="font-size: 20px">
                    <a href="/u/<?= $user->seo_user??'' ?>/get-in-touch/<?= $message->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content --> 
</div>