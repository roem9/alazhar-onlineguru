
        <div class="container">
            <?php if( $this->session->flashdata('pesan') ) : ?>
                <div class="row">
                    <div class="col-12">
                        <?=$this->session->flashdata('pesan')?>
                    </div>
                </div>
            <?php endif; ?>
            <ul class="list-group shadow">
                <li class="list-group-item list-group-item-success d-flex justify-content-between">
                    <span>
                        <strong><?= $kelas['nama_kelas']?></strong>
                    </span>
                    <span>
                        <a href="<?= base_url()?>tarkibi2/kelas/<?= md5($kelas['id_kelas'])?>" class="btn btn-sm btn-danger"><i class="fa fa-sign-out-alt"></i></a>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div class="">
                        <i class="fa fa-users mr-2"></i><?= $peserta?> Orang
                    </div>
                </li>
                <li class="list-group-item"><i class="fa fa-book mr-2"></i>Pertemuan <?= $materi?></li>
                <!-- <li class="list-group-item d-flex justify-content-between">
                    <a href="http://" class="btn btn-sm btn-secondary">koreksi</a>
                </li> -->
            </ul>
            <ul class="list-group mt-3">
                <?php
                    foreach ($list as $list) :?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span><?= $list['peserta']['nama']?><br><b><?= $list['pertemuan']?></b></span>
                        <span>
                            <a href="<?= base_url()?>tarkibi2/koreksi/<?= md5($list['id'])?>" class="btn btn-sm btn-primary">periksa</a>
                        </span>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>

<div class="overlay"></div>

<script> 
</script>