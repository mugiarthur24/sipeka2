<script src="<?php echo base_url('asset/grafik/code/highcharts.js') ?>"></script>
<script src="<?php echo base_url('asset/grafik/code/modules/exporting.js') ?>"></script>
<div class="p-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    
                        <div id="container" style="min-width: 600px; height: 600px; margin: 0 auto"></div>

                        <script type="text/javascript">

                                    Highcharts.chart('container', {
                                        chart: {
                                            plotBackgroundColor: null,
                                            plotBorderWidth: null,
                                            plotShadow: false,
                                            type: 'pie'
                                        },
                                        title: {
                                            text: 'Grafik Pegawai Per-Golongan'
                                        },
                                        credits: {
                                            enabled: false
                                        },
                                        tooltip: {
                                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                        },
                                        plotOptions: {
                                            pie: {
                                                allowPointSelect: true,
                                                cursor: 'pointer',
                                                dataLabels: {
                                                    enabled: true,
                                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                    style: {
                                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                    }
                                                }
                                            }
                                        },
                                        series: [{
                                            name: 'Jumlah',
                                            colorByPoint: true,
                                            data: [<?php foreach ($mgol as $datas): ?><?php echo '{name:'."'".$datas->golongan."'".',y:'.$this->Admin_m->jml_data('data_riwayat_golongan','id_golongan',$datas->id_golongan).'},'; ?><?php endforeach ?>],
                                        }]
                                    });
                                </script>   
                    
                </div>
            </div>
        </div>
    </div>
</div>