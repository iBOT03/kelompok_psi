<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin keluar?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Pilih "Logout" untuk keluar, pilih "Batal" untuk kembali ke Panel Admin.</div>
              <div class="modal-footer">
                  <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
                  <a class="btn btn-danger" href="<?php echo site_url('admin/Auth/logout') ?>">Logout</a>
              </div>
          </div>
      </div>
  </div>

  <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin untuk menghapus?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Pilih "Hapus" untuk menghapus, pilih "Batal" untuk kembali ke Panel Admin.</div>
              <div class="modal-footer">
                  <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
                  <a class="btn btn-danger" href="<?php echo site_url('admin/administrator/hapus') ?>">Hapus</a>
              </div>
          </div>
      </div>
  </div>