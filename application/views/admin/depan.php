<!DOCTYPE html>
<html>
    <head>
    	<link rel="shortcut icon" href="<?php echo base_url($brand); ?>">
        <title><?php echo $title; ?></title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="<?php echo base_url('asset/avalon/') ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('asset/avalon/') ?>css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url('asset/avalon/') ?>css/fontAwesome.css">
        <link rel="stylesheet" href="<?php echo base_url('asset/avalon/') ?>css/hero-slider.css">
        <link rel="stylesheet" href="<?php echo base_url('asset/avalon/') ?>css/owl-carousel.css">
        <link rel="stylesheet" href="<?php echo base_url('asset/avalon/') ?>css/datepicker.css">
        <link rel="stylesheet" href="<?php echo base_url('asset/avalon/') ?>css/templatemo-style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <script src="<?php echo base_url('asset/avalon/') ?>js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
<body>
    <section class="banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="left-banner-content">
                        <div class="text-content">
                            <h6></h6>
                            <div class="line-dec"></div>
                            <h1>Sistem Pelayanan Kepegawaian</h1>
                            <div class="white-border-button">
                                <a href="<?php echo base_url('index.php/login') ?>" data-id="best-offer-section">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="right-banner-content">
                        <div class="logo"><a href="index.html"><img src="<?php echo base_url('asset/img/lembaga/Lambang_Kabupaten_Buton_Selatan.png') ?>" width="100px" alt=""></a></div>
                        <h2>e-SiPeKa</h2>
                        <span>Pemerintah Kabupaten Buton Selatan</span>
                        <div class="line-dec"></div>
                        <p>“ Terwujudnya Kabupaten Buton Selatan Sebagai Pusat Pertumbuhan Baru Melalui Optimalisasi Sumberdaya Lokal Menuju Masyarakat Sejahtera, Mandiri Dan Bermartabat. ”</p>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial" id="testimonial-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-image"></div>
                </div>
                <div class="col-md-8">
                    <div id="owl-testimonial" class="owl-carousel owl-theme">
                        <div class="item col-md-12">
								<script src="<?php echo base_url('asset/grafik/code/highcharts.js') ?>"></script>
								<script src="<?php echo base_url('asset/grafik/code/modules/exporting.js') ?>"></script>
								<div id="container3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
								<script type="text/javascript">

									Highcharts.chart('container3', {
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
                        <div class="item col-md-12">
                            <div id="container4"></div>
								<script type="text/javascript">
									Highcharts.chart('container4', {
										chart: {
											type: 'column'
										},
										title: {
											text: 'Grafik Pegawai Per-Eselon'
										},
										subtitle: {
											text: 'Source: Database Kabupaten Buton Selatan'
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
												text: 'Jumlah (Per-Eselon)'
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
											data: [<?php foreach ($mjab as $datajab): ?><?php echo '['."'".$datajab->nama_eselon."'".','.$this->Admin_m->jml_data('data_riwayat_jabatan','id_eselon',$datajab->id_eselon).'],'; ?><?php endforeach ?>],
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
    </section>      

    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright &copy; 2019 BKPSDM BUTON SELATAN</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('asset/avalon/') ?>js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="<?php echo base_url('asset/avalon/') ?>js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url('asset/avalon/') ?>js/datepicker.js"></script>
    <script src="<?php echo base_url('asset/avalon/') ?>js/plugins.js"></script>
    <script src="<?php echo base_url('asset/avalon/') ?>js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() 
	{
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>