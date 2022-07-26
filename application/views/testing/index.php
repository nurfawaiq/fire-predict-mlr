<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="float-left">Pengujian</h4>
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
                    <div>
                        Y = b0 + b1 X1 + b2 X2
                        <br>
                        Y = <?=$det1 / $det?> + <?=$det2 / $det?> X1 + <?=$det3 / $det?> X2
                    </div>
                <?php endif; ?>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                                <th>Tahun</th>
                                <th>Burn Area (Y)</th>
                                <th>Prediksi (Y')</th>
                                <th>Error</th>
                                <th>Absolute Error</th>
                                <th>e*e</th>
                                <th>PE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $sum_n = 0;
                            $sum_x1 = 0; $sum_x2 = 0;
                            $sum_y = 0;
                            $sum_x1y = 0; $sum_x2y = 0;
                            $sum_x1x2 = 0;
                            $sum_x1x1 = 0; $sum_x2x2 = 0;
                            $sum_yy = 0;
                            $sum_ae = 0; $sum_ee = 0; $sum_pe = 0;
                            if($row->num_rows() > 0) :
                                foreach($row->result() as $key => $value) :
                                    if($key == 0) {
                                        continue;
                                    } ?>
                                    <tr>
                                        <td><?=$value->alert_year?></td>
                                        <td><?=$value->burn_sum?></td>
                                        <td>
                                            <?php
                                            $pred = $det1 / $det + $det2 / $det * $value->alert_count + $det3 / $det * $value->alert_sum;
                                            echo $pred;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $error = $value->burn_sum - $pred;
                                            echo $error;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $ae = abs($error);
                                            echo $ae;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $ee = $ae * $ae;
                                            echo $ee;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $pe = round($ae / $value->burn_sum * 100);
                                            echo $pe;
                                            ?>%
                                        </td>
                                    </tr>
                                    <?php
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
                                    $sum_ae = $sum_ae + $ae;
                                    $sum_ee = $sum_ee + $ee;
                                    $sum_pe = $sum_pe + $pe;
                                    $no++;
                                endforeach;
                                ?>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>Avg</td>
                                    <td><?=$sum_ae / ($no-1)?></td>
                                    <td><?=$sum_ee / ($no-1)?></td>
                                    <td><?=round($sum_pe / ($no-1))?>%</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td>MAD</td>
                                    <td>MSE</td>
                                    <td>MAPE</td>
                                </tr>
                                <?php
                            else : ?>
                                <tr>
                                    <td colspan="7" class="text-center">Dataset belum diinput</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>