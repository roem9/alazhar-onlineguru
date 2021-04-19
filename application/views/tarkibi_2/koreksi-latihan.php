
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
                <li class="list-group-item d-flex justify-content-center mb-3">
                    <a href="javascript:void(0)" class="btn btn-md btn-secondary mr-1" id="btnTugas">list tugas</a>
                    <a href="javascript:void(0)" class="btn btn-md btn-primary" id="btnKoreksi">koreksi tugas</a>
                </li>
            </ul>

            <div id="list-koreksi">
                <ul class="list-group">
                    <div class="list-koreksi"></div>
                </ul>
            </div>
            
            <div id="list-tugas">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between mb-3">
                        <input type="text" name="search_peserta" id="search_peserta" class="form-control form-control-md mr-1" placeholder="Cari nama">
                        <a href="javascript:void(0)" id="btnSearch" class="btn btn-md btn-success"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <ul class="list-group">
                    <div class="list-tugas"></div>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="overlay"></div>

<script> 
    reload_data();

    $("#list-tugas").hide();

    $("#btnKoreksi").click(function(){
        $("#list-koreksi").show();
        $("#btnKoreksi").addClass("btn-primary")
        $("#btnKoreksi").removeClass("btn-secondary")

        
        $("#list-tugas").hide();
        $("#btnTugas").removeClass("btn-primary")
        $("#btnTugas").addClass("btn-secondary")

        reload_data()
    })

    $("#btnTugas").click(function(){
        $("#list-koreksi").hide();
        $("#btnKoreksi").removeClass("btn-primary")
        $("#btnKoreksi").addClass("btn-secondary")

        $("#list-tugas").show();
        $("#btnTugas").addClass("btn-primary")
        $("#btnTugas").removeClass("btn-secondary")
    })

    $("#btnSearch").click(function(){
        let nama = $("#search_peserta").val();
        $.ajax({
            url: "<?= base_url()?>tarkibi2/get_tugas_by_name",
            method: "POST",
            dataType: "JSON",
            data: {nama: nama, id_kelas:<?= $kelas['id_kelas']?>},
            success: function(result){
                html = "";

                if(result.list.length != 0){
                    result.list.forEach(list => {
                        html += `
                            <li class="list-group-item d-flex justify-content-between mb-1">
                                <span>`+list.peserta.nama+`<br><b>`+list.pertemuan+`</b><br>Nilai: `+list.nilai+`</span>
                                <span>
                                    <a href="<?= base_url()?>tarkibi2/koreksi/`+list.id_md5+`" class="btn list-group-item-success">edit</a>
                                </span>
                            </li>
                        `;
                    });
                } else {
                    html = `<div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning"></i> nama tidak ditemukan.</div>`;
                }

                $(".list-tugas").html(html)
            }
        })

    })

    function reload_data(){
        $.ajax({
            url : "<?= base_url()?>tarkibi2/ajax_tugas",
            method: "POST",
            dataType : "JSON",
            data: {id_kelas: <?= $kelas['id_kelas']?>},
            success : function(result){
                html = "";

                if(result.list.length != 0){
                    result.list.forEach(list => {
                        html += `
                            <li class="list-group-item d-flex justify-content-between mb-1">
                                <span>`+list.peserta.nama+`<br><b>`+list.pertemuan+`</b></span>
                                <span>
                                    <a href="<?= base_url()?>tarkibi2/koreksi/`+list.id_md5+`" class="btn list-group-item-warning">koreksi</a>
                                </span>
                            </li>
                        `;
                    });
                } else {
                    html = `<div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning"></i> list koreksi kosong.</div>`;
                }

                $(".list-koreksi").html(html)
            }
        })
    }
</script>