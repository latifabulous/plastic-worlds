     
         <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
   <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800 mt-4"><i class="fas fa-tachometer-alt mr-3 warna"></i>Dashboard</h1>

            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i class="fas fa-download fa-fw mr-2 fa-sm text-white-50 "></i>Download Data</a>
          </div>
<!--  -->
          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penukaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $penukaran ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-recycle fa-fw fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Plastik</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $plastik ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dumpster fa-fw fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end row -->


        </div>

        <!-- end container fluid -->
      </div>



      
       <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <p>Copyright © <?= date('Y') ?> - Plastic World. All rights reserved.</p>
          </div>
        </div>
      </footer>

