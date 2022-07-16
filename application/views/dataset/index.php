<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="float-left">Dataset</h4>
                    <div class="float-right">
                        <?php if($this->session->userdata('id_user')) : ?>
                        <a href="#modal-delete-all" data-toggle="modal" class="btn btn-danger">
                            <i class="mdi mdi-delete"></i> Del All
                        </a>
                        <?php endif; ?>
                        <a href="<?=site_url('dataset/create')?>" class="btn btn-success">
                            <i class="mdi mdi-plus-circle"></i> Add
                        </a>
                        <?php if($this->session->userdata('id_user')) : ?>
                        <a href="<?=site_url('dataset/import')?>" class="btn btn-info">
                            <i class="mdi mdi-file-excel"></i> Import
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                <br><br>
                <?php $this->view('messages') ?>
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>ISO</th>
                            <th>Alert Year</th>
                            <th>Alert Week</th>
                            <th>Burn Area (Ha)</th>
                            <?php if($this->session->userdata('id_user')) : ?>
                            <th>Opsi</th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach($row->result() as $key => $value) : ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$value->iso?></td>
                                <td><?=$value->alert_year?></td>
                                <td><?=$value->alert_week?></td>
                                <td><?=$value->burn_area?></td>
                                <?php if($this->session->userdata('id_user')) : ?>
                                <td class="text-center" style="width:15%;">
                                    <a href="<?=site_url('dataset/edit/'.$value->id_dataset)?>" class="btn btn-primary">
                                        <i class="mdi mdi-pencil"></i> Edit
                                    </a>
                                    <a href="#modal-delete" data-toggle="modal" onclick="$('#id_dataset').val('<?=$value->id_dataset?>')" class="btn btn-danger">
                                        <i class="mdi mdi-delete"></i> Delete
                                    </a>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Yakin hapus data ini?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-footer">
            <form action="<?=site_url('dataset/delete')?>" method="post">
                <input type="hidden" name="id_dataset" id="id_dataset" value="">
                <button class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button class="btn btn-danger" type="submit">Hapus</button>
            </form>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-delete-all" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Yakin hapus semua data?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-footer">
            <form action="<?=site_url('dataset/delAll')?>" method="post">
                <button class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button class="btn btn-danger" type="submit">Hapus</button>
            </form>
        </div>
    </div>
  </div>
</div>