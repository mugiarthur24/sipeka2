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
                                            text: 'Grafik Pegawai Per Jenis Kelamin'
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
                                            data: [<?php foreach ($mjk as $datas): ?><?php echo '{name:'."'".$datas->nm_jk."'".',y:'.$this->Admin_m->jml_data('data_pegawai','jenis_kelamin',$datas->kode_jk).'},'; ?><?php endforeach ?>],
                                        }]
                                    });
                                </script>   
                    
                </div>
            </div>
        </div>
    </div>
</div>