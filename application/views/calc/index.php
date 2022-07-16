<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="float-left">Perhitungan</h4>
                </div>
                <br>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Periode</th>
                            <th>Jumlah Kasus (X1)</th>
                            <th>Jumlah Alert (X2)</th>
                            <th>Jumlah Burn Area (Y)</th>
                            <th>X1Y</th>
                            <th>X2Y</th>
                            <th>X1X2</th>
                            <th>X1^2</th>
                            <th>X2^2</th>
                            <th>Y^2</th>
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
                            if($row->num_rows() > 0) :
                                foreach($row->result() as $key => $value) : ?>
                                <tr>
                                    <td><?=$value->alert_year?></td>
                                    <td><?=$no?></td> <!-- periode -->
                                    <td><?=$value->alert_count?></td> <!-- x1 -->
                                    <td><?=$value->alert_sum?></td> <!-- x2 -->
                                    <td><?=$value->burn_sum?></td> <!-- y -->
                                    <td><?=$value->alert_count * $value->burn_sum?></td> <!-- x1y -->
                                    <td><?=$value->alert_sum * $value->burn_sum?></td> <!-- x2y -->
                                    <td><?=$value->alert_count * $value->alert_sum?></td> <!-- x1x2 -->
                                    <td><?=$value->alert_count * $value->alert_count?></td> <!-- x1x1 -->
                                    <td><?=$value->alert_sum * $value->alert_sum?></td> <!-- x2x2 -->
                                    <td><?=$value->burn_sum * $value->burn_sum?></td> <!-- yy -->
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
                                $no++;
                                endforeach;
                            else : ?>
                                <tr>
                                    <td colspan="11" class="text-center">Dataset belum diinput</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                        <?php if($sum_n != 0) : ?>
                        <tfoot>
                            <tr>
                                <th>Total (∑)</th>
                                <td><?=$sum_n?></td>
                                <td><?=$sum_x1?></td>
                                <td><?=$sum_x2?></td>
                                <td><?=$sum_y?></td>
                                <td><?=$sum_x1y?></td>
                                <td><?=$sum_x2y?></td>
                                <td><?=$sum_x1x2?></td>
                                <td><?=$sum_x1x1?></td>
                                <td><?=$sum_x2x2?></td>
                                <td><?=$sum_yy?></td>
                            </tr>
                            <tr>
                                <th>Rata2</th>
                                <td><?=$sum_n / ($no-1)?></td>
                                <td><?=$sum_x1 / ($no-1)?></td>
                                <td><?=$sum_x2 / ($no-1)?></td>
                                <td><?=$sum_y / ($no-1)?></td>
                                <td><?=$sum_x1y / ($no-1)?></td>
                                <td><?=$sum_x2y / ($no-1)?></td>
                                <td><?=$sum_x1x2 / ($no-1)?></td>
                                <td><?=$sum_x1x1 / ($no-1)?></td>
                                <td><?=$sum_x2x2 / ($no-1)?></td>
                                <td><?=$sum_yy / ($no-1)?></td>
                            </tr>
                        </tfoot>
                        <?php endif; ?>
                    </table>
                </div>
                <?php if($sum_n != 0) : ?>
                <br>
                <div>
                    n = <?=$no-1?>
                    <br><br>
                    <table style="text-align:center;">
                        <tr>
                            <td style="border-left:1px solid;">n</td>
                            <td>∑X1</td>
                            <td style="border-right:1px solid;">∑X2</td>
                            <td style="width:20px;"></td>
                            <td style="width:40px; border-left:1px solid; border-right:1px solid;">b0</td>
                            <td style="width:40px;"></td>
                            <td style="border-left:1px solid; border-right:1px solid;">∑Y</td>
                        </tr>
                        <tr>
                            <td style="border-left:1px solid;">∑X1</td>
                            <td>∑X1^2</td>
                            <td style="border-right:1px solid;">∑X1X2</td>
                            <td></td>
                            <td style="border-left:1px solid; border-right:1px solid;">b1</td>
                            <td>=</td>
                            <td style="border-left:1px solid; border-right:1px solid;">∑X1Y</td>
                        </tr>
                        <tr>
                            <td style="border-left:1px solid;">∑X2</td>
                            <td>∑X1X2</td>
                            <td style="border-right:1px solid;">∑X2^2</td>
                            <td></td>
                            <td style="border-left:1px solid; border-right:1px solid;">b2</td>
                            <td></td>
                            <td style="border-left:1px solid; border-right:1px solid;">∑X2Y</td>
                        </tr>
                        <tr>
                            <td colspan="7" style="height:30px;"></td>
                        </tr>
                        <tr>
                            <td style="border-left:1px solid;"><?=$no-1?></td>
                            <td><?=$sum_x1?></td>
                            <td style="border-right:1px solid;"><?=$sum_x2?></td>
                            <td colspan="3">
                            <td style="border-left:1px solid; border-right:1px solid;"><?=$sum_y?></td>
                        </tr>
                        <tr>
                            <td style="border-left:1px solid;"><?=$sum_x1?></td>
                            <td><?=$sum_x1x1?></td>
                            <td style="border-right:1px solid;"><?=$sum_x1x2?></td>
                            <td colspan="3">
                            <td style="border-left:1px solid; border-right:1px solid;"><?=$sum_x1y?></td>
                        </tr>
                        <tr>
                            <td style="padding:0 10px; border-left:1px solid;"><?=$sum_x2?></td>
                            <td style="padding:0 10px;"><?=$sum_x1x2?></td>
                            <td style="padding:0 10px; border-right:1px solid;"><?=$sum_x2x2?></td>
                            <td colspan="3">
                            <td style="padding:0 10px; border-left:1px solid; border-right:1px solid;"><?=$sum_x2y?></td>
                        </tr>
                    </table>
                    <div style="margin:15px 0 25px 0;">
                        Det (A) = 
                        <?php
                        $arr = array(
                            [($no-1), $sum_x1, $sum_x2],
                            [$sum_x1, $sum_x1x1, $sum_x1x2],
                            [$sum_x2, $sum_x1x2, $sum_x2x2]
                        );
                        /*      a b c
                        * arr = d e f
                        *       g h i
                        * det = a*(e*i - f*h) - b*(d*i-f*g) + c*(d*h - e*g)
                        */
                        $det = $arr[0][0] * ($arr[1][1] * $arr[2][2] - $arr[1][2] * $arr[2][1]) -
                            $arr[0][1] * ($arr[1][0] * $arr[2][2] - $arr[1][2] * $arr[2][0]) +
                            $arr[0][2] * ($arr[1][0] * $arr[2][1] - $arr[1][1] * $arr[2][0]);
                        echo $det;
                        ?>
                    </div>
                    <table style="text-align:center;">
                        <tr>
                            <td style="border-left:1px solid;"><?=$sum_y?></td>
                            <td><?=$sum_x1?></td>
                            <td style="border-right:1px solid;"><?=$sum_x2?></td>
                        </tr>
                        <tr>
                            <td style="border-left:1px solid;"><?=$sum_x1y?></td>
                            <td><?=$sum_x1x1?></td>
                            <td style="border-right:1px solid;"><?=$sum_x1x2?></td>
                        </tr>
                        <tr>
                            <td style="padding:0 10px; border-left:1px solid;"><?=$sum_x2y?></td>
                            <td style="padding:0 10px;"><?=$sum_x1x2?></td>
                            <td style="padding:0 10px; border-right:1px solid;"><?=$sum_x2x2?></td>
                        </tr>
                    </table>
                    <div style="margin:15px 0 25px 0;">
                        Det (A1) = 
                        <?php
                        $arr = array(
                            [$sum_y, $sum_x1, $sum_x2],
                            [$sum_x1y, $sum_x1x1, $sum_x1x2],
                            [$sum_x2y, $sum_x1x2, $sum_x2x2]
                        );
                        $det1 = $arr[0][0] * ($arr[1][1] * $arr[2][2] - $arr[1][2] * $arr[2][1]) -
                            $arr[0][1] * ($arr[1][0] * $arr[2][2] - $arr[1][2] * $arr[2][0]) +
                            $arr[0][2] * ($arr[1][0] * $arr[2][1] - $arr[1][1] * $arr[2][0]);
                        echo $det1;
                        ?>
                    </div>
                    <table style="text-align:center;">
                        <tr>
                            <td style="border-left:1px solid;"><?=$no-1?></td>
                            <td><?=$sum_y?></td>
                            <td style="border-right:1px solid;"><?=$sum_x2?></td>
                        </tr>
                        <tr>
                            <td style="border-left:1px solid;"><?=$sum_x1?></td>
                            <td><?=$sum_x1y?></td>
                            <td style="border-right:1px solid;"><?=$sum_x1x2?></td>
                        </tr>
                        <tr>
                            <td style="padding:0 10px; border-left:1px solid;"><?=$sum_x2?></td>
                            <td style="padding:0 10px;"><?=$sum_x2y?></td>
                            <td style="padding:0 10px; border-right:1px solid;"><?=$sum_x2x2?></td>
                        </tr>
                    </table>
                    <div style="margin:15px 0 25px 0;">
                        Det (A2) = 
                        <?php
                        $arr = array(
                            [$no-1, $sum_y, $sum_x2],
                            [$sum_x1, $sum_x1y, $sum_x1x2],
                            [$sum_x2, $sum_x2y, $sum_x2x2]
                        );
                        $det2 = $arr[0][0] * ($arr[1][1] * $arr[2][2] - $arr[1][2] * $arr[2][1]) -
                            $arr[0][1] * ($arr[1][0] * $arr[2][2] - $arr[1][2] * $arr[2][0]) +
                            $arr[0][2] * ($arr[1][0] * $arr[2][1] - $arr[1][1] * $arr[2][0]);
                        echo $det2;
                        ?>
                    </div>
                    <table style="text-align:center;">
                        <tr>
                            <td style="border-left:1px solid;"><?=$no-1?></td>
                            <td><?=$sum_x1?></td>
                            <td style="border-right:1px solid;"><?=$sum_y?></td>
                        </tr>
                        <tr>
                            <td style="border-left:1px solid;"><?=$sum_x1?></td>
                            <td><?=$sum_x1x1?></td>
                            <td style="border-right:1px solid;"><?=$sum_x1y?></td>
                        </tr>
                        <tr>
                            <td style="padding:0 10px; border-left:1px solid;"><?=$sum_x2?></td>
                            <td style="padding:0 10px;"><?=$sum_x1x2?></td>
                            <td style="padding:0 10px; border-right:1px solid;"><?=$sum_x2y?></td>
                        </tr>
                    </table>
                    <div style="margin:15px 0 30px 0;">
                        Det (A3) = 
                        <?php
                        $arr = array(
                            [$no-1, $sum_x1, $sum_y],
                            [$sum_x1, $sum_x1x1, $sum_x1y],
                            [$sum_x2, $sum_x1x2, $sum_x2y]
                        );
                        $det3 = $arr[0][0] * ($arr[1][1] * $arr[2][2] - $arr[1][2] * $arr[2][1]) -
                            $arr[0][1] * ($arr[1][0] * $arr[2][2] - $arr[1][2] * $arr[2][0]) +
                            $arr[0][2] * ($arr[1][0] * $arr[2][1] - $arr[1][1] * $arr[2][0]);
                        echo $det3;
                        ?>
                    </div>
                    <div style="margin-bottom:25px;">
                        b0 = <?=$det1 / $det?>
                        <br>
                        b1 = <?=$det2 / $det?>
                        <br>
                        b2 = <?=$det3 / $det?>
                    </div>
                    <div>
                        Y = b0 + b1 X1 + b2 X2
                        <br>
                        Y = <?=$det1 / $det?> + <?=$det2 / $det?> X1 + <?=$det3 / $det?> X2
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>