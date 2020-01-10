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
        type: 'bar'
    },
    title: {
        text: 'Grafik Pegawai Per-Unit Kerja'
    },
    subtitle: {
        text: 'Database Kab. Buton Selatan'
    },
    xAxis: {
        categories: [<?php foreach ($allskpd as $data): ?>
            <?php echo "'".$data->nama_satuan_kerja."'".',' ?>
        <?php endforeach ?>],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Jumlah Pegawai',
        data: [<?php foreach ($allskpd as $datas): ?>
            <?php echo $this->Pegawai_m->jmlpgwskpd($datas->id_satuan_kerja).','; ?>
        <?php endforeach ?>]
    }]
});
        </script>
</div>
</div>
</div>
</div>
</div>
</div>