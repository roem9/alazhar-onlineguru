        <div class="container">
            <div class="row">
                <div class="mb-3">
                    <a href="<?= base_url()?>tarkibi2/tugas/<?= md5($data_latihan['id_kelas'])?>" class="btn btn-md btn-danger text-light"><i class="fa fa-times mr-1"></i>keluar</a>
                </div>
                
                <div class="col-12 p-0 mb-3">
                    <a href="javascript:void(0)" class="btn btn-md btn-block btn-success" id="allSoal">Tampilkan Semua Soal</a>
                </div>

                <input type="hidden" name="id" id="id" value="<?= $data_latihan['id']?>">

                <div class="col-12 p-0 mb-3">
                    <ul class="list-group">
                        <li class="list-group-item">Nama : <?= $peserta['nama']?></li>
                    </ul>
                </div>
                
                <div class="col-12 p-0">
                    <div class="alert alert-info"><i class="fa fa-info-circle text-info"></i> Buatlah contoh berupa <b>jumlah mufidah</b> dari : </div>
                </div>

                <div class="col-12 mb-3 bg-light" id="isiForm">
                    <ul class="list-group soal" id="soal1">
                        <div class="form-group mt-3">
                            <label for="">1. Asmaul Khomsah yang bersandar dengan <b>isim dhohir</b></label>
                            <div class="jawaban mb-3"><b>Jawaban :</b> <br><span style="font-size: 22px"><?= $data_latihan['jawaban'][0]?></span></div>
                            
                            <label for=""><b>Pembahasan</b></label>
                            <textarea name="pembahasan[]" id="" cols="30" rows="5" class="form-control form-control-lg"><?= $data_latihan['pembahasan'][0]?></textarea>
                            <small id="msg-empty-0" class="form-text text-danger">
                                <?php 
                                    if($data_latihan['pembahasan'][0] == ""):
                                ?>
                                    *jika jawaban benar tidak perlu mengisi pembahasan
                                <?php endif;?>
                            </small>

                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <span>
                                <?php if($data_latihan['periksa'] == 2 || $data_latihan['periksa'] == 1) :?>
                                    <!-- <a href="javascript:void(0)" class="btn btn-md btn-primary mr-3 btnSimpan" data-id="1">simpan</a> -->
                                <?php endif;?>
                            </span>
                            <span>
                                <a data-id="1" class="btn btn-md btn-success mr-3 text-light right"><i class="fa fa-angle-right"></i></a>
                            </span>
                        </div>
                    </ul>
                    <ul class="list-group soal" id="soal2">
                        <div class="form-group mt-3">
                            <label for="">2. Asmaul Khomsah yang bersandar dengan <b>isim dhomir</b></label>        
                            <div class="jawaban mb-3"><b>Jawaban :</b> <br><span style="font-size: 22px"><?= $data_latihan['jawaban'][1]?></span></div>
                            <label for=""><b>Pembahasan</b></label>
                            <textarea name="pembahasan[]" id="" cols="30" rows="5" class="form-control form-control-lg"><?= $data_latihan['pembahasan'][1]?></textarea>
                            <small id="msg-empty-1" class="form-text text-danger">
                                <?php 
                                    if($data_latihan['pembahasan'][1] == ""):
                                ?>
                                    *jika jawaban benar tidak perlu mengisi pembahasan
                                <?php endif;?>
                            </small>

                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <span>
                                <a data-id="2" class="btn btn-md btn-success mr-3 text-light left"><i class="fa fa-angle-left"></i></a>
                            </span>
                            <span>
                                <?php if($data_latihan['periksa'] == 2 || $data_latihan['periksa'] == 1) :?>
                                    <!-- <a href="javascript:void(0)" class="btn btn-md btn-primary mr-3 btnSimpan" data-id="2">simpan</a> -->
                                <?php endif;?>
                            </span>
                            <span>
                                <a data-id="2" class="btn btn-md btn-success mr-3 text-light right"><i class="fa fa-angle-right"></i></a>
                            </span>
                        </div>
                    </ul>
                    <ul class="list-group soal" id="soal3">
                        <div class="form-group mt-3">
                            <label for="">3. Isim ghoiru munsorif</label>        
                            <div class="jawaban mb-3"><b>Jawaban :</b> <br><span style="font-size: 22px"><?= $data_latihan['jawaban'][2]?></span></div>
                            <label for=""><b>Pembahasan</b></label>
                            <textarea name="pembahasan[]" id="" cols="30" rows="5" class="form-control form-control-lg"><?= $data_latihan['pembahasan'][2]?></textarea>
                            <small id="msg-empty-2" class="form-text text-danger">
                                <?php 
                                    if($data_latihan['pembahasan'][2] == ""):
                                ?>
                                    *jika jawaban benar tidak perlu mengisi pembahasan
                                <?php endif;?>
                            </small>

                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <span>
                                <a data-id="3" class="btn btn-md btn-success mr-3 text-light left"><i class="fa fa-angle-left"></i></a>
                            </span>
                            <span>
                                <?php if($data_latihan['periksa'] == 2 || $data_latihan['periksa'] == 1) :?>
                                    <!-- <a href="javascript:void(0)" class="btn btn-md btn-primary mr-3 btnSimpan" data-id="3">simpan</a> -->
                                <?php endif;?>
                            </span>
                            <span>
                                <a data-id="3" class="btn btn-md btn-success mr-3 text-light right"><i class="fa fa-angle-right"></i></a>
                            </span>
                        </div>
                    </ul>
                    <ul class="list-group soal" id="soal4">
                        <div class="form-group mt-3">
                            <label for="">4. Isim manqus</label>        
                            <div class="jawaban mb-3"><b>Jawaban :</b> <br><span style="font-size: 22px"><?= $data_latihan['jawaban'][3]?></span></div>
                            
                            <label for=""><b>Pembahasan</b></label>
                            <textarea name="pembahasan[]" id="" cols="30" rows="5" class="form-control form-control-lg"><?= $data_latihan['pembahasan'][3]?></textarea>
                            <small id="msg-empty-3" class="form-text text-danger">
                                <?php 
                                    if($data_latihan['pembahasan'][3] == ""):
                                ?>
                                    *jika jawaban benar tidak perlu mengisi pembahasan
                                <?php endif;?>
                            </small>

                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <span>
                                <a data-id="4" class="btn btn-md btn-success mr-3 text-light left"><i class="fa fa-angle-left"></i></a>
                            </span>
                            <span>
                                <?php if($data_latihan['periksa'] == 2 || $data_latihan['periksa'] == 1) :?>
                                    <!-- <a href="javascript:void(0)" class="btn btn-md btn-primary mr-3 btnSimpan" data-id="4">simpan</a> -->
                                <?php endif;?>
                            </span>
                            <span>
                                <a data-id="4" class="btn btn-md btn-success mr-3 text-light right"><i class="fa fa-angle-right"></i></a>
                            </span>
                        </div>
                    </ul>
                    <ul class="list-group soal" id="soal5">
                        <div class="form-group mt-3">
                            <label for="">5. Isim maqsur</label>        
                            <div class="jawaban mb-3"><b>Jawaban :</b> <br><span style="font-size: 22px"><?= $data_latihan['jawaban'][4]?></span></div>
                            
                            <label for=""><b>Pembahasan</b></label>
                            <textarea name="pembahasan[]" id="" cols="30" rows="5" class="form-control form-control-lg"><?= $data_latihan['pembahasan'][4]?></textarea>
                            <small id="msg-empty-4" class="form-text text-danger">
                                <?php 
                                    if($data_latihan['pembahasan'][4] == ""):
                                ?>
                                    *jika jawaban benar tidak perlu mengisi pembahasan
                                <?php endif;?>
                            </small>

                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <span>
                                <a data-id="5" class="btn btn-md btn-success mr-3 text-light left"><i class="fa fa-angle-left"></i></a>
                            </span>
                            <span>
                                <?php if($data_latihan['periksa'] == 2 || $data_latihan['periksa'] == 1) :?>
                                    <!-- <a href="javascript:void(0)" class="btn btn-md btn-primary mr-3 btnSimpan" data-id="5">simpan</a> -->
                                <?php endif;?>
                            </span>
                            <!-- <span>
                                <a data-id="5" class="btn btn-md btn-success mr-3 text-light right"><i class="fa fa-angle-right"></i></a>
                            </span> -->
                        </div>
                    </ul>

                    
                    <div class="d-flex mb-3">
                        <a href="javascript:void(0)" class="btn btn-md btn-block btn-primary btnSimpan">simpan</a>
                    </div>
                    
                    <div class="col-12 col-md-12 mb-3 text-center angka">
                        <span class="btn btn-md btn-secondary"><span id="angka">1</span> / 5</span>
                    </div>

                </div>
                <div class="col-12 mb-3 bg-light">
                    <ul class="list-group">
                        <form action="<?= base_url()?>tarkibi2/add_nilai_isian" method="POST" id="formInput">
                            <input type="hidden" name="id" value="<?= $data_latihan['id']?>">
                            <div class="form-group mt-3">
                                <label for="">Nilai</label>
                                <input type="text" name="nilai" id="nilai" class="form-control form-control-sm" value="<?= $data_latihan['nilai']?>" required>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="button" class="btn btn-md btn-primary" id="btnNilai">Simpan Nilai</button>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>

<script>
    $(".soal").hide();
    $("#soal1").show();
    
    $('#allSoal').on('click', function() {
        var click = $(this).data('clicks');

        if (click) {
            // $('.ure_billeder').show();
            $('#allSoal').html("Tampilkan Semua Soal")
            $(".soal").hide();
            $("#soal1").show();
            $(".left").show()
            $(".right").show()
            $(".angka").show()
            $("#angka").html("1")
        } else {
            $('#allSoal').html("Sembunyikan Semua Soal")
            $(".soal").show();
            $(".left").hide()
            $(".right").hide()
            $(".angka").hide()
        };

        $(this).data('clicks', !click); // you have to set it

    });

    $("#btnNilai").click(function(){        
        Swal.fire({
            icon: 'question',
            text: 'Yakin akan menginputkan nilai?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then(function (result) {
            if (result.value) {
                $("#formInput").submit();
            }
        })

        return false;
    })

    $(".right").click(function(){
        let id = $(this).data("id")
        id ++;
        $(".soal").hide();
        $("#soal"+id).show()
        $("#angka").html(id)
    })
    
    $(".left").click(function(){
        let id = $(this).data("id")
        id --;
        $(".soal").hide();
        $("#soal"+id).show()
        $("#angka").html(id)
    })

    $(".btnSimpan").click(function(){
        let id = $(this).data("id");
        let id_latihan = $("#id").val()
        let id_kelas = "<?= $data_latihan['id_kelas']?>";
        let pertemuan = "<?= $data_latihan['pertemuan']?>";

        html = "";

        $("textarea").each(function(){
            let text = $(this).val();
            html += text+"###";
        });
        
        $.ajax({
            url: "<?= base_url()?>tarkibi2/add_latihan_pembahasan",
            data: {id_latihan:id_latihan, id_kelas:id_kelas, pertemuan:pertemuan, text:html},
            type: "POST",
            success: function(data){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    text: 'berhasil menyimpan pembahasan',
                    showConfirmButton: false,
                    timer: 1500
                })

                $("textarea").each(function(i){
                    let text = $(this).val();
                    if(text == ""){
                        $("#msg-empty-"+i).html("*jika jawaban benar tidak perlu mengisi pembahasan");
                    } else {
                        $("#msg-empty-"+i).html("");
                    }
                });
            }
        })
    })
</script>




