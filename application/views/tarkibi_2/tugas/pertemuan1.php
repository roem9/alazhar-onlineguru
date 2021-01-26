        <div class="container">
            <div class="row">
                <div class="mb-3">
                    <a href="<?= base_url()?>tarkibi2/list_koreksi/<?= md5($data_latihan['id_kelas'])?>" class="btn btn-sm btn-danger text-light"><i class="fa fa-times mr-1"></i>keluar</a>
                </div>
                <!-- <div class="alert alert-info"><i class="fa fa-info-circle text-info"></i> Pilihlah <b>salah satu</b> cara untuk mengumpulkan tugas Anda. <b>Dengan mengupload foto</b> atau <b>Dengan mengisi form latihan</b></div>
                <div class="col-12 d-flex justify-content-center mb-3">
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger mr-3">Upload Foto</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger">Isi Form</a>
                </div> -->
                
                <!-- <input type="hidden" name="pertemuan" value="<?= $materi?>">
                <input type="hidden" name="id_kelas" value="<?= $id_kelas?>"> -->

                <div class="alert alert-info"><i class="fa fa-info-circle text-info"></i> Buatlah contoh berupa <b>jumlah mufidah</b> dari : </div>

                <div class="col-12 mb-3 bg-light" id="isiForm">
                    <ul class="list-group soal" id="soal1">
                        <div class="form-group mt-3">
                            <label for="">1. Asmaul Khomsah yang bersandar dengan <b>isim dhohir</b></label>
                            <div class="jawaban mb-3"><b>Jawaban :</b> <br><span style="font-size: 22px"><?= $data_latihan['jawaban'][0]?></span></div>
                            
                            <label for=""><b>Pembahasan</b></label>
                            <textarea name="pembahasan[]" id="" cols="30" rows="5" class="form-control form-control-lg"><?= $data_latihan['pembahasan'][0]?></textarea>
                            <small id="msg-filled-1" class="form-text msg-form"></small>
                            <?php 
                                if($data_latihan['pembahasan'][0] == ""):
                            ?>
                                <small id="msg-empty-1" class="form-text text-danger">*jika jawaban benar tidak perlu mengisi pembahasan</small>
                            <?php endif;?>

                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <span>
                                <?php if($data_latihan['periksa'] == 0) :?>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary mr-3 btnSimpan" data-id="1">simpan</a>
                                <?php endif;?>
                            </span>
                            <span>
                                <a data-id="1" class="btn btn-sm btn-success mr-3 text-light right"><i class="fa fa-angle-right"></i></a>
                            </span>
                        </div>
                    </ul>
                    <ul class="list-group soal" id="soal2">
                        <div class="form-group mt-3">
                            <label for="">2. Asmaul Khomsah yang bersandar dengan <b>isim dhomir</b></label>        
                            <div class="jawaban mb-3"><b>Jawaban :</b> <br><span style="font-size: 22px"><?= $data_latihan['jawaban'][1]?></span></div>
                            <label for=""><b>Pembahasan</b></label>
                            <textarea name="pembahasan[]" id="" cols="30" rows="5" class="form-control form-control-lg"><?= $data_latihan['pembahasan'][1]?></textarea>
                            <small id="msg-filled-2" class="form-text msg-form"></small>
                            <?php 
                                if($data_latihan['pembahasan'][1] == ""):
                            ?>
                                <small id="msg-empty-2" class="form-text text-danger">*jika jawaban benar tidak perlu mengisi pembahasan</small>
                            <?php endif;?>

                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <span>
                                <a data-id="2" class="btn btn-sm btn-success mr-3 text-light left"><i class="fa fa-angle-left"></i></a>
                            </span>
                            <span>
                                <?php if($data_latihan['periksa'] == 0) :?>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary mr-3 btnSimpan" data-id="2">simpan</a>
                                <?php endif;?>
                            </span>
                            <span>
                                <a data-id="2" class="btn btn-sm btn-success mr-3 text-light right"><i class="fa fa-angle-right"></i></a>
                            </span>
                        </div>
                    </ul>
                    <ul class="list-group soal" id="soal3">
                        <div class="form-group mt-3">
                            <label for="">3. Isim ghoiru munsorif</label>        
                            <div class="jawaban mb-3"><b>Jawaban :</b> <br><span style="font-size: 22px"><?= $data_latihan['jawaban'][2]?></span></div>
                            <label for=""><b>Pembahasan</b></label>
                            <textarea name="pembahasan[]" id="" cols="30" rows="5" class="form-control form-control-lg"><?= $data_latihan['pembahasan'][2]?></textarea>
                            <small id="msg-filled-3" class="form-text msg-form"></small>
                            <?php 
                                if($data_latihan['pembahasan'][2] == ""):
                            ?>
                                <small id="msg-empty-3" class="form-text text-danger">*jika jawaban benar tidak perlu mengisi pembahasan</small>
                            <?php endif;?>

                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <span>
                                <a data-id="3" class="btn btn-sm btn-success mr-3 text-light left"><i class="fa fa-angle-left"></i></a>
                            </span>
                            <span>
                                <?php if($data_latihan['periksa'] == 0) :?>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary mr-3 btnSimpan" data-id="3">simpan</a>
                                <?php endif;?>
                            </span>
                            <span>
                                <a data-id="3" class="btn btn-sm btn-success mr-3 text-light right"><i class="fa fa-angle-right"></i></a>
                            </span>
                        </div>
                    </ul>
                    <ul class="list-group soal" id="soal4">
                        <div class="form-group mt-3">
                            <label for="">4. Isim manqus</label>        
                            <div class="jawaban mb-3"><b>Jawaban :</b> <br><span style="font-size: 22px"><?= $data_latihan['jawaban'][3]?></span></div>
                            
                            <label for=""><b>Pembahasan</b></label>
                            <textarea name="pembahasan[]" id="" cols="30" rows="5" class="form-control form-control-lg"><?= $data_latihan['pembahasan'][3]?></textarea>
                            <small id="msg-filled-4" class="form-text msg-form"></small>
                            <?php 
                                if($data_latihan['pembahasan'][3] == ""):
                            ?>
                                <small id="msg-empty-4" class="form-text text-danger">*jika jawaban benar tidak perlu mengisi pembahasan</small>
                            <?php endif;?>

                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <span>
                                <a data-id="4" class="btn btn-sm btn-success mr-3 text-light left"><i class="fa fa-angle-left"></i></a>
                            </span>
                            <span>
                                <?php if($data_latihan['periksa'] == 0) :?>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary mr-3 btnSimpan" data-id="4">simpan</a>
                                <?php endif;?>
                            </span>
                            <span>
                                <a data-id="4" class="btn btn-sm btn-success mr-3 text-light right"><i class="fa fa-angle-right"></i></a>
                            </span>
                        </div>
                    </ul>
                    <ul class="list-group soal" id="soal5">
                        <div class="form-group mt-3">
                            <label for="">5. Isim maqsur</label>        
                            <div class="jawaban mb-3"><b>Jawaban :</b> <br><span style="font-size: 22px"><?= $data_latihan['jawaban'][4]?></span></div>
                            
                            <label for=""><b>Pembahasan</b></label>
                            <textarea name="pembahasan[]" id="" cols="30" rows="5" class="form-control form-control-lg"><?= $data_latihan['pembahasan'][4]?></textarea>
                            <small id="msg-filled-5" class="form-text msg-form"></small>
                            <?php 
                                if($data_latihan['pembahasan'][4] == ""):
                            ?>
                                <small id="msg-empty-5" class="form-text text-danger">*jika jawaban benar tidak perlu mengisi pembahasan</small>
                            <?php endif;?>

                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <span>
                                <a data-id="5" class="btn btn-sm btn-success mr-3 text-light left"><i class="fa fa-angle-left"></i></a>
                            </span>
                            <span>
                                <?php if($data_latihan['periksa'] == 0) :?>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary mr-3 btnSimpan" data-id="5">simpan</a>
                                <?php endif;?>
                            </span>
                            <!-- <span>
                                <a data-id="5" class="btn btn-sm btn-success mr-3 text-light right"><i class="fa fa-angle-right"></i></a>
                            </span> -->
                        </div>
                    </ul>
                    <ul class="list-group mt-3">
                        <form action="<?= base_url()?>tarkibi2/add_nilai_isian" method="POST" id="formInput">
                            <input type="hidden" name="id" value="<?= $data_latihan['id']?>">
                            <div class="form-group">
                                <label for="">Nilai</label>
                                <input type="text" name="nilai" id="nilai" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <input type="submit" value="Simpan Nilai" class="btn btn-sm btn-primary" id="btnNilai">
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

    $("#formInput").submit(function(){
        if(!confirm("Yakin akan menyimpan nilai")){
            return false
        }
    })

    $(".right").click(function(){
        let id = $(this).data("id")
        id ++;
        $(".soal").hide();
        $("#soal"+id).show()
    })
    
    $(".left").click(function(){
        let id = $(this).data("id")
        id --;
        $(".soal").hide();
        $("#soal"+id).show()
    })

    $(".btnSimpan").click(function(){
        let id = $(this).data("id");
        let id_kelas = "<?= $data_latihan['id_kelas']?>";
        let pertemuan = "<?= $data_latihan['pertemuan']?>";

        html = "";

        $("textarea").each(function(){
            let text = $(this).val();
            html += text+"###";
        });

        $.ajax({
            url: "<?= base_url()?>tarkibi2/add_latihan_pembahasan",
            data: {id_kelas:id_kelas, pertemuan:pertemuan, text:html},
            type: "POST",
            success: function(data){
                $(".msg-form").hide()
                $("#msg-empty-"+id).hide()
                $("#msg-filled-"+id).show()
                $("#msg-filled-"+id).html(`<span class="text-success">Berhasil menyimpan pembahasan</span>`)
            }
        })
    })
</script>




