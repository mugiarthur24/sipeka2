<?php if ($this->ion_auth->is_admin()): ?>
<div class="p-4">
	<div class="row">
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cspkpb/pengangkatan_main/') ?>">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/svg/promotion.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Pengangkatan</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cspkpb/pemberhentian_main/') ?>">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/svg/worker.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Pemberhentian</span>
                    </div>
                </div>
            </a>
        </div>
	</div>
</div>
<?php else: ?>
<div class="p-4">
	<div class="row">
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cskartu/karsu_main/') ?>">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/id-card_1.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Pengangkatan</span>
                    </div>
                </div>
            </a>
        </div>
		<div class="col">
            <a href="<?php echo base_url('index.php/admin/cskartu/karsi_main/') ?>">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body text-center">
                        <span style="font-size: 50px;"><img src="<?php echo base_url('asset/img/id-card.svg') ?>" width="100" height="100"></span><br/><br/>
                        <span class="text-light">Pemberhentian</span>
                    </div>
                </div>
            </a>
        </div>
	</div>
</div>
 <?php endif ?>