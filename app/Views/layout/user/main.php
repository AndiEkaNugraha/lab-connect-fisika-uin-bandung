<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Niche Admin - Powerful Bootstrap 4 Dashboard and Admin Template</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="/assets/user/dist/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="/assets/user/dist/css/style.css">
<link rel="stylesheet" href="/assets/user/dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/user/dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="/assets/user/dist/css/themify-icons/themify-icons.css">

<?php if (isset($edit_avatar) || isset($input_image)) : ?>
<!-- dropify -->
<link rel="stylesheet" href="/assets/user/dist/plugins/dropify/dropify.min.css">
<?php endif; ?>
<?php if (isset($edit_longForm) || isset($input_longText)) : ?>
<link rel="stylesheet" href="/assets/user/dist/plugins/summernote/summernote-bs4.css">
<?php endif; ?>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- jQuery 3 --> 
<script src="/assets/user/dist/js/jquery.min.js"></script> 

<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
    <a href="index.html" class="logo blue-bg"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <span class="logo-mini"><img src="/assets/user/dist/img/logo-n.png" alt=""></span> 
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg"><img src="/assets/user/dist/img/logo.png" alt=""></span> </a> 
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar blue-bg navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <ul class="nav navbar-nav pull-left">
        <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
      </ul>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 new messages</li>
              <li>
                <ul class="menu">
                  <li><a href="#">
                    <div class="pull-left"><img src="/assets/user/dist/img/img1.jpg" class="img-circle" alt="User Image"> <span class="profile-status online pull-right"></span></div>
                    <h4>Alex C. Patton</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="/assets/user/dist/img/img3.jpg" class="img-circle" alt="User Image"> <span class="profile-status offline pull-right"></span></div>
                    <h4>Nikolaj S. Henriksen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">10:15 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="/assets/user/dist/img/img2.jpg" class="img-circle" alt="User Image"> <span class="profile-status away pull-right"></span></div>
                    <h4>Kasper S. Jessen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">8:45 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="/assets/user/dist/img/img4.jpg" class="img-circle" alt="User Image"> <span class="profile-status busy pull-right"></span></div>
                    <h4>Florence S. Kasper</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">12:15 AM</span></p>
                    </a></li>
                </ul>
              </li>
              <li class="footer"><a href="#">View All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notifications</li>
              <li>
                <ul class="menu">
                  <li><a href="#">
                    <div class="pull-left icon-circle red"><i class="icon-lightbulb"></i></div>
                    <h4>Alex C. Patton</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle blue"><i class="fa fa-coffee"></i></div>
                    <h4>Nikolaj S. Henriksen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">1:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle green"><i class="fa fa-paperclip"></i></div>
                    <h4>Kasper S. Jessen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle yellow"><i class="fa  fa-plane"></i></div>
                    <h4>Florence S. Kasper</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">11:10 AM</span></p>
                    </a></li>
                </ul>
              </li>
              <li class="footer"><a href="#">Check all Notifications</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?= $user->avatar? '/assets/file/avatar/'. $user->avatar : '/assets/img/profile-default.jpg'  ?>" class="user-image" alt="User Image"> <span class="hidden-xs"><?= $user->name??'' ?></span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img">
                  <img src="<?= $user->avatar? '/assets/file/avatar/'. $user->avatar : '/assets/img/profile-default.jpg'  ?>" 
                        class="img-responsive" alt="User" height="160" width="160" style="object-fit: cover;object-position: center;height: 80px; width: 80px;">
                </div>
                <p class="text-left"><?= $user->name??'' ?><small><?= $user->email??'' ?></small> </p>
              </li>
              <li><a href="/u/<?= $user->seo_user??'' ?>/profile"><i class="icon-profile-male"></i> My Profile</a></li>
              <li><a href="#"><i class="icon-wallet"></i> My Balance</a></li>
              <li><a href="#"><i class="icon-envelope"></i> Inbox</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><i class="icon-gears"></i> Account Setting</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/logout"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"> 
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar"> 
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Personal</li>
        <li class=""> 
          <a href="/u/<?= $user->seo_user??''?>/labolatorium"> 
            <i class="fa fa-hospital-o"></i> 
            <span>Dashboard</span> 
          </a>
        </li>
        <?php if(check('user_manajemen')): ?>
        <li class="header">Management User</li>
        <li class="treeview"> 
          <a href="#"> 
            <i class="fa fa-address-card-o"></i> <span>User</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> 
          </a>
          <ul class="treeview-menu">
            <li><a href="/u/<?=$user->seo_user??''?>/manajemen-user/laboratory">Laboran</a></li>
            <li><a href="/u/<?=$user->seo_user??''?>/manajemen-user/lecturer">Dosen</a></li>
            <li><a href="/u/<?=$user->seo_user??''?>/manajemen-user/student">Mahasiswa</a></li>
          </ul>
        </li>
        <?php endif;?>
        <?php if(check('edit_labolatorium')): ?>
        <li class="header">Fasilitas</li>
        <li class=""> 
          <a href="/u/<?= $user->seo_user??''?>/labolatorium"> 
            <i class="fa fa-hospital-o"></i> 
            <span>Labolatorium</span> 
          </a>
        </li>
        <li class=""> 
          <a href="/u/<?= $user->seo_user??''?>/lab-equipment"> 
            <i class="fa fa-thermometer-half"></i>
            <span>Alat & Bahan</span>
          </a>
        </li>
        <li class=""> 
          <a href="/u/<?= $user->seo_user??''?>/lab-news"> 
            <i class="fa fa-globe"></i>
            <span>News</span>
          </a>
          </li>
        <?php endif;?>
      </ul>
    </div>
    <!-- /.sidebar --> 
  </aside>
  
    <?= $content ?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">Version 1.2</div>
    Copyright © 2017 Yourdomian. All rights reserved.</footer>
</div>
<!-- ./wrapper --> 



<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js"></script>
<!-- v4.0.0-alpha.6 --> 
<script src="/assets/user/dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="/assets/user/dist/js/niche.js"></script> 

<!-- Morris JavaScript --> 
<script src="/assets/user/dist/plugins/raphael/raphael-min.js"></script> 
<script src="/assets/user/dist/plugins/morris/morris.js"></script>
<script src="/assets/user/dist/plugins/functions/morris-init.js"></script>

<?php if (isset($edit_avatar) || isset($input_image)) : ?>
<script src="/assets/user/dist/plugins/dropify/dropify.min.js"></script> 
<script>
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
<?php endif; ?>
<?php if (isset($edit_longForm) || isset($input_longText)) : ?>
<script src="/assets/user/dist/plugins/summernote/summernote-bs4.js"></script> 
<script> 
    $('#summernote').summernote({
          height: 300, // set editor height
          placeholder: 'Hello default Summernote',
          minHeight: null, // set minimum height of editor
          maxHeight: null, // set maximum height of editor
          focus: false // set focus to editable area after initializing summernote
    });
    $('form').submit(function(event) {
        var bioContent = $('#summernote').summernote('code'); // Ambil isi Summernote
        $('input[name="bio"]').val(bioContent); // Masukkan ke dalam input hidden
    });
</script>
<?php endif; ?>
</body>
</html>
