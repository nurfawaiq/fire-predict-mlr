<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="float-left">Total Rekap Per Tahun</h4>
                </div>
                <br>
                <?php $this->view('messages') ?>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tahun</th>
                            <th>Jumlah Kasus</th>
                            <th>Jumlah Alert</th>
                            <th>Jumlah Burn Area (Ha)</th>
                            <?php if($this->session->userdata('id_user')) : ?>
                            <th>Opsi</th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if($row->num_rows() > 0) :
                                foreach($row->result() as $key => $value) : ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$value->alert_year?></td>
                                    <td><?=$value->alert_count?></td>
                                    <td><?=$value->alert_sum?></td>
                                    <td><?=$value->burn_sum?></td>
                                    <?php if($this->session->userdata('id_user')) : ?>
                                    <td class="text-center" style="width:10%;">
                                        <a href="#modal-delete" data-toggle="modal" onclick="$('#alert_year').val('<?=$value->alert_year?>')" class="btn btn-danger">
                                            <i class="mdi mdi-delete"></i> Del Year
                                        </a>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                                <?php
                                endforeach;
                            else : ?>
                                <tr>
                                    <td colspan="6" class="text-center">Dataset belum diinput</td>
                                </tr>
                            <?php endif; ?>
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
            <form action="<?=site_url('total/delete')?>" method="post">
                <input type="hidden" name="alert_year" id="alert_year" value="">
                <button class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button class="btn btn-danger" type="submit">Hapus</button>
            </form>
        </div>
    </div>
  </div>
</div>