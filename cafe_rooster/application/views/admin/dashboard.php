 <!-- Navbar -->
 <?php $this->load->view("admin/templates/header"); ?>
 <!-- End Navbar -->

 <!-- Sidebar -->
 <?php $this->load->view("admin/templates/sidebar"); ?>
 <!-- End Sidebar -->

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Dashboard</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard')?>">Home</a></li>
             <li class="breadcrumb-item active">Dashboard</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <!-- Small boxes (Stat box) -->
       <div class="row">
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-info">
             <div class="inner">
               <h3><?= $total_transaksi; ?></h3>

               <p>Total Transaksi</p>
             </div>
             <div class="icon">
               <i class="ion ion-bag"></i>
             </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-success">
             <div class="inner">
               <h3><?= $total_catering; ?></h3>

               <p>Total Catering</p>
             </div>
             <div class="icon">
               <i class="ion ion-stats-bars"></i>
             </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-warning">
             <div class="inner">
               <h3><?= $total_booking; ?></h3>

               <p>Total Booking</p>
             </div>
             <div class="icon">
               <i class="ion ion-person-add"></i>
             </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-danger">
             <div class="inner">
               <h3><?= $total_pengguna; ?></h3>

               <p>Total Pengguna</p>
             </div>
             <div class="icon">
               <i class="ion ion-pie-graph"></i>
             </div>
             <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
           </div>
         </div>
         <!-- ./col -->
       </div>
       <!-- /.row -->
       <!-- Main row -->
       <div class="row">
         <!-- Left col -->
         <section class="col-lg-7 connectedSortable">

           <!-- Custom tabs (Charts with tabs)-->
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">
                 <i class="fas fa-chart-pie mr-1"></i>
                 Transaksi
               </h3>
               <div class="card-tools">
                 <ul class="nav nav-pills ml-auto">
                   <li class="nav-item">
                     <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                   </li>
                 </ul>
               </div>
             </div><!-- /.card-header -->
             <div class="card-body">
               <div class="tab-content p-0">
                 <!-- Morris chart - Sales -->
                 <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                   <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                 </div>
                 <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                   <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                 </div>
               </div>
             </div><!-- /.card-body -->
           </div>
           <!-- /.card -->

       </div>

     </div>
     <!--/.direct-chat -->

   </section>
   <!-- /.Left col -->
   <!-- right col (We are only adding the ID to make the widgets sortable)-->
   <section class="col-lg-5 connectedSortable">

     <!-- Map card -->
     <div class="card bg-gradient-primary">
       <div class="card-header border-0">
         <h3 class="card-title">
           <i class="fas fa-map-marker-alt mr-1"></i>
           Visitors
         </h3>
         <!-- card tools -->
         <div class="card-tools">
           <button type="button" class="btn btn-primary btn-sm daterange" data-toggle="tooltip" title="Date range">
             <i class="far fa-calendar-alt"></i>
           </button>
           <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
             <i class="fas fa-minus"></i>
           </button>
         </div>
         <!-- /.card-tools -->
       </div>
       <div class="card-body">
         <div id="world-map" style="height: 250px; width: 100%;"></div>
       </div>
       <!-- /.card-body-->
       <div class="card-footer bg-transparent">
         <div class="row">
           <div class="col-4 text-center">
             <div id="sparkline-1"></div>
             <div class="text-white">Visitors</div>
           </div>
           <!-- ./col -->
           <div class="col-4 text-center">
             <div id="sparkline-2"></div>
             <div class="text-white">Online</div>
           </div>
           <!-- ./col -->
           <div class="col-4 text-center">
             <div id="sparkline-3"></div>
             <div class="text-white">Sales</div>
           </div>
           <!-- ./col -->
         </div>
         <!-- /.row -->
       </div>
     </div>
     <!-- /.card -->

     <!-- solid sales graph -->

     <!-- /.card -->

     <!-- Calendar -->
     <div class="card bg-gradient-success">
       <div class="card-header border-0">

         <h3 class="card-title">
           <i class="far fa-calendar-alt"></i>
           Calendar
         </h3>
         <!-- tools card -->
         <div class="card-tools">
           <!-- button with a dropdown -->
           <div class="btn-group">
             <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
               <i class="fas fa-bars"></i></button>
             <div class="dropdown-menu" role="menu">
               <a href="#" class="dropdown-item">Add new event</a>
               <a href="#" class="dropdown-item">Clear events</a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">View calendar</a>
             </div>
           </div>
           <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
             <i class="fas fa-minus"></i>
           </button>
           <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
             <i class="fas fa-times"></i>
           </button>
         </div>
         <!-- /. tools -->
       </div>
       <!-- /.card-header -->
       <div class="card-body pt-0">
         <!--The calendar -->
         <div id="calendar" style="width: 100%"></div>
       </div>
       <!-- /.card-body -->
     </div>
     <!-- /.card -->
   </section>
   <!-- right col -->
 </div>
 <!-- /.row (main row) -->
 </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Footer -->
 <?php $this->load->view("admin/templates/footer"); ?>
 <!-- End Footer -->