<script src="<?php echo base_url('asset/grafik/code/highcharts.js') ?>"></script>
<script src="<?php echo base_url('asset/grafik/code/modules/exporting.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url('asset/grafik/code/highcharts.js') ?>"></script>
<script src="<?php echo base_url('asset/grafik/code/highcharts-3d.js') ?>"></script>
<script src="<?php echo base_url('asset/grafik/code/modules/exporting.js') ?>"></script>
<div class="p-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div id="container" style="min-width: 600px; height: 600px; margin: 0 auto"></div>

<style type="text/css">
#container, #sliders {
    min-width: 310px; 
    max-width: 800px;
    margin: 0 auto;
}
#container {
    height: 400px; 
}
        </style>
                            <script type="text/javascript">
                                    Highcharts.chart('container', {
                                        chart: {
                                            type: 'column'
                                        },
                                        title: {
                                            text: 'Grafik Pegawai Per-Jabatan'
                                        },
                                        subtitle: {
                                            text: 'Source: Database Kabupaten Buton'
                                        },
                                        xAxis: {
                                            type: 'category',
                                            labels: {
                                                rotation: -45,
                                                style: {
                                                    fontSize: '13px',
                                                    fontFamily: 'Roboto, sans-serif'
                                                }
                                            }
                                        },
                                        yAxis: {
                                            min: 0,
                                            title: {
                                                text: 'Jumlah (Per-Jabatan)'
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
                                            data: [<?php foreach ($mjab as $datajab): ?><?php echo '['."'".$datajab->nm_jabatan."'".','.$this->Admin_m->jml_data('data_riwayat_jabatan','nm_jabatan',$datajab->nm_jabatan).'],'; ?><?php endforeach ?>],
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
            </div>
        </div>
    </div>
</div>