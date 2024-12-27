          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manajemen Tanaman/</span> Edit Tanaman</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Form Edit Tanaman</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                      <form method="POST" action="<?php echo site_url('tanaman/edit');?>" enctype="multipart/form-data">
                      <input type="hidden" name="id_tanaman" value="<?php echo $tanaman->id_tanaman;?>">
                        <div class="row mb-3">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Nama Tanaman</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="basic-default-name" name="nama_tanaman" placeholder="Nama Album" value="<?php echo $tanaman->nama_tanaman;?>" />
                          </div>
                        </div>
                        
                        <div class="row mb-3">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Harga Tanaman</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" id="basic-default-name" name="harga_tanaman" placeholder="Harga" value="<?php echo $tanaman->harga_tanaman;?>" />
                          </div>
                        <div class="row mb-3">
                          <label class="col-sm-3 col-form-label" for="basic-default-message">Deskripsi</label>
                          <div class="col-sm-9">
                            <textarea
                              id="basic-default-message"
                              class="form-control"
                              name="deskripsi"
                              placeholder="Deskripsi"
                              value="<?php echo $tanaman->deskripsi;?>" 
                            ></textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Qty</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" id="basic-default-name" name="qty" placeholder="Qty" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Gambar</label>
                          <div class="col-sm-9">
                            <input type="file" name="gambar" value="<?php echo $tanaman->gambar;?>" />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-12">
                            <button type="submit" class="btn rounded-pill btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- / Content -->
