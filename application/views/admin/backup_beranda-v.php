<script src="<?php echo base_url('asset/grafik/code/highcharts.js') ?>"></script>
<script src="<?php echo base_url('asset/grafik/code/modules/exporting.js') ?>"></script>
<div class="p-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div id="container" style="min-width: 600px; height: 600px; margin: 0 auto"></div>

                        <script type="text/javascript">

                            Highcharts.chart('container', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'GRAFIK JUMLAH PEGAWAI PER-SKPD'
                                },
                                subtitle: {
                                    text: 'Source: Database Kabupaten Buton Selatan'
                                },
                                xAxis: {
                                    type: 'category',
                                    labels: {
                                        rotation: -45,
                                        style: {
                                            fontSize: '10px',
                                            fontFamily: 'Verdana, sans-serif'
                                        }
                                    }
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'Jumlah (Orang)'
                                    }
                                },
                                legend: {
                                    enabled: false
                                },
                                tooltip: {
                                    pointFormat: 'Jumlah : <b>{point.y:.1f} Orang</b>'
                                },

                                series: [{
                                    name: 'Population',
                                    data: [<?php foreach ($fmgol as $datas): ?><?php echo '['."'".$datas->id_satuan_kerja."'".','.$this->Admin_m->jumlah_skpd($datas->id_satuan_kerja).'],'; ?><?php endforeach ?>],
                                    dataLabels: {
                                        enabled: true,
                                        rotation: -90,
                                        color: '#FFFFFF',
                                        align: 'right',
                    format: '{point.y:.1f}', // one decimal
                    y: 1, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    </script>
</div>
</div>
<div class="col-md-12">
    <div class="x_panel">
        <div class="xcontent">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama SKPD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fmgol as $data): ?>
                        <tr>
                            <td class="text-center"><?php echo $data->id_satuan_kerja; ?></td>
                            <td><?php echo $data->nama_satuan_kerja; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div> 
    </div>
</div>
</div>
</div>
</div>
</div>