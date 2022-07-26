<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="float-left">Prediksi</h4>
                </div>
                <br><br>
                <?php $no = 1;
                $sum_n = 0;
                $sum_x1 = 0; $sum_x2 = 0;
                $sum_y = 0;
                $sum_x1y = 0; $sum_x2y = 0;
                $sum_x1x2 = 0;
                $sum_x1x1 = 0; $sum_x2x2 = 0;
                $sum_yy = 0;
                foreach($row->result() as $key => $value) :
                    $sum_n = $sum_n + $no;
                    $sum_x1 = $sum_x1 + $value->alert_count;
                    $sum_x2 = $sum_x2 + $value->alert_sum;
                    $sum_y = $sum_y + $value->burn_sum;
                    $sum_x1y = $sum_x1y + ($value->alert_count * $value->burn_sum);
                    $sum_x2y = $sum_x2y + ($value->alert_sum * $value->burn_sum);
                    $sum_x1x2 = $sum_x1x2 + ($value->alert_count * $value->alert_sum);
                    $sum_x1x1 = $sum_x1x1 + ($value->alert_count * $value->alert_count);
                    $sum_x2x2 = $sum_x2x2 + ($value->alert_sum * $value->alert_sum);
                    $sum_yy = $sum_yy + ($value->burn_sum * $value->burn_sum);
                    $no++;
                endforeach;

                $hasil_prediksi = "";
                if($sum_n != 0) :
                    $arr = array(
                        [($no-1), $sum_x1, $sum_x2],
                        [$sum_x1, $sum_x1x1, $sum_x1x2],
                        [$sum_x2, $sum_x1x2, $sum_x2x2]
                    );
                    $det = $arr[0][0] * ($arr[1][1] * $arr[2][2] - $arr[1][2] * $arr[2][1]) -
                        $arr[0][1] * ($arr[1][0] * $arr[2][2] - $arr[1][2] * $arr[2][0]) +
                        $arr[0][2] * ($arr[1][0] * $arr[2][1] - $arr[1][1] * $arr[2][0]);
                    
                    $arr = array(
                        [$sum_y, $sum_x1, $sum_x2],
                        [$sum_x1y, $sum_x1x1, $sum_x1x2],
                        [$sum_x2y, $sum_x1x2, $sum_x2x2]
                    );
                    $det1 = $arr[0][0] * ($arr[1][1] * $arr[2][2] - $arr[1][2] * $arr[2][1]) -
                        $arr[0][1] * ($arr[1][0] * $arr[2][2] - $arr[1][2] * $arr[2][0]) +
                        $arr[0][2] * ($arr[1][0] * $arr[2][1] - $arr[1][1] * $arr[2][0]);

                    $arr = array(
                        [$no-1, $sum_y, $sum_x2],
                        [$sum_x1, $sum_x1y, $sum_x1x2],
                        [$sum_x2, $sum_x2y, $sum_x2x2]
                    );
                    $det2 = $arr[0][0] * ($arr[1][1] * $arr[2][2] - $arr[1][2] * $arr[2][1]) -
                        $arr[0][1] * ($arr[1][0] * $arr[2][2] - $arr[1][2] * $arr[2][0]) +
                        $arr[0][2] * ($arr[1][0] * $arr[2][1] - $arr[1][1] * $arr[2][0]);

                    $arr = array(
                        [$no-1, $sum_x1, $sum_y],
                        [$sum_x1, $sum_x1x1, $sum_x1y],
                        [$sum_x2, $sum_x1x2, $sum_x2y]
                    );
                    $det3 = $arr[0][0] * ($arr[1][1] * $arr[2][2] - $arr[1][2] * $arr[2][1]) -
                        $arr[0][1] * ($arr[1][0] * $arr[2][2] - $arr[1][2] * $arr[2][0]) +
                        $arr[0][2] * ($arr[1][0] * $arr[2][1] - $arr[1][1] * $arr[2][0]);
                        ?>
                    <!-- Y = b0 + b1 X1 + b2 X2
                    Y = <?=$det1 / $det?> + <?=$det2 / $det?> X1 + <?=$det3 / $det?> X2 -->
                    <?php
                    if(isset($_POST['proses'])) {
                        $new_x1 = $this->input->post('jumlah_kasus');
                        $new_x2 = $this->input->post('jumlah_alert');
                        $hasil_prediksi = $det1 / $det + $det2 / $det * $new_x1 + $det3 / $det * $new_x2;
                    }
                endif;
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Jumlah Kasus (X1) *</label>
                                <input type="number" name="jumlah_kasus" value="<?=$this->input->post('jumlah_kasus')?>" class="form-control" required <?=$sum_n == 0 ? "readonly" : ""?>>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Alert (X2) *</label>
                                <input type="number" name="jumlah_alert" value="<?=$this->input->post('jumlah_alert')?>" class="form-control" required <?=$sum_n == 0 ? "readonly" : ""?>>
                            </div>
                            <div class="form-group">
                                <label>Hasil Prediksi Burn Area (Ha)</label>
                                <input type="number" value="<?=$hasil_prediksi?>" class="form-control" required readonly>
                            </div>
                            <button type="submit" name="proses" class="btn btn-success mr-2">Proses</button>
                            <a href="<?=site_url('predict')?>" class="btn btn-light">Reset</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>