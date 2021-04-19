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
                    <div class="alert alert-info"><i class="fa fa-info-circle text-info"></i> Tulislah kata berikut ini sesuai dengan i'rob yang berada di dalam kurung </div>
                </div>

                <?php 
                    $data_soal = [
                        [
                            "no" => "1",
                            "soal" => "صُوْرَة (رَفَعْ)",
                            "jawaban" => "صُوْرَةٌ"
                        ],
                        [
                            "no" => "2",
                            "soal" => "صُوْرَة (نَصَبْ)",
                            "jawaban" => "صُوْرَةً"
                        ],
                        [
                            "no" => "3",
                            "soal" => "صُوْرَة (جَرْ)",
                            "jawaban" => "صُوْرَةٍ"
                        ],
                        [
                            "no" => "4",
                            "soal" => "مَدْرَسَتَان (رَفَعْ)",
                            "jawaban" => "مَدْرَسَتَانِ"
                        ],
                        [
                            "no" => "5",
                            "soal" => "مَدْرَسَتَان (نَصَبْ)",
                            "jawaban" => "مَدْرَسَتَيْنِ"
                        ],
                        [
                            "no" => "6",
                            "soal" => "مَدْرَسَتَان (جَرْ)",
                            "jawaban" => "مَدْرَسَتَيْنِ"
                        ],
                        [
                            "no" => "7",
                            "soal" => "كافرين (رَفَعْ)",
                            "jawaban" => "كَافِرُوْنَ"
                        ],
                        [
                            "no" => "8",
                            "soal" => "كافرين (نَصَبْ)",
                            "jawaban" => "كَافِرِيْنَ"
                        ],
                        [
                            "no" => "9",
                            "soal" => "كافرين (جَرْ)",
                            "jawaban" => "كَافِرِيْنَ"
                        ],
                        [
                            "no" => "10",
                            "soal" => "مُؤْمِنَاتٌ (رَفَعْ)",
                            "jawaban" => "مُؤْمِنَاتٌ"
                        ],
                        [
                            "no" => "11",
                            "soal" => "مُؤْمِنَاتٌ (نَصَبْ)",
                            "jawaban" => "مُؤْمِنَاتٍ"
                        ],
                        [
                            "no" => "12",
                            "soal" => "مُؤْمِنَاتٌ (جَرْ)",
                            "jawaban" => "مُؤْمِنَاتٍ"
                        ],
                        [
                            "no" => "13",
                            "soal" => "أَبُوْهَا (رَفَعْ)",
                            "jawaban" => "أَبُوْهَا"
                        ],
                        [
                            "no" => "14",
                            "soal" => "أَبُوْهَا (نَصَبْ)",
                            "jawaban" => "أَبَاهَا"
                        ],
                        [
                            "no" => "15",
                            "soal" => "أَبُوْهَا (جَرْ)",
                            "jawaban" => "أَبِيْهَا"
                        ],
                        [
                            "no" => "16",
                            "soal" => "قَلَمَيْن (رَفَعْ)",
                            "jawaban" => "قَلَمَانِ"
                        ],
                        [
                            "no" => "17",
                            "soal" => "قَلَمَيْن (نَصَبْ)",
                            "jawaban" => "قَلَمَيْنِ"
                        ],
                        [
                            "no" => "18",
                            "soal" => "قَلَمَيْن (جَرْ)",
                            "jawaban" => "قَلَمَيْنِ"
                        ],
                        [
                            "no" => "19",
                            "soal" => "مُسْتَشْفًى (رَفَعْ)",
                            "jawaban" => "مُسْتَشْفًى"
                        ],
                        [
                            "no" => "20",
                            "soal" => "مُسْتَشْفًى (نَصَبْ)",
                            "jawaban" => "مُسْتَشْفًى"
                        ],
                        [
                            "no" => "21",
                            "soal" => "مُسْتَشْفًى (جَرْ)",
                            "jawaban" => "مُسْتَشْفًى"
                        ],
                        [
                            "no" => "22",
                            "soal" => "مَكَاتِبُ (رَفَعْ)",
                            "jawaban" => "مَكَاتِبُ"
                        ],
                        [
                            "no" => "23",
                            "soal" => "مَكَاتِبُ (نَصَبْ)",
                            "jawaban" => "مَكَاتِبَ"
                        ],
                        [
                            "no" => "24",
                            "soal" => "مَكَاتِبُ (جَرْ)",
                            "jawaban" => "مَكَاتِبَ"
                        ],
                        [
                            "no" => "25",
                            "soal" => "مُدَرِّسُوْنَ (رَفَعْ)",
                            "jawaban" => "مُدَرِّسُوْنَ"
                        ],
                        [
                            "no" => "26",
                            "soal" => "مُدَرِّسُوْنَ (نَصَبْ)",
                            "jawaban" => "مُدَرِّسِيْنَ"
                        ],
                        [
                            "no" => "27",
                            "soal" => "مُدَرِّسُوْنَ (جَرْ)",
                            "jawaban" => "مُدَرِّسِيْنَ"
                        ],
                    ];
                ?>

                <div class="col-12 mb-3 bg-light" id="isiForm">
                    <?php 
                        $benar = 0;
                        foreach ($data_soal as $i => $soal) :
                            if($soal['jawaban'] == $data_latihan['jawaban'][$i]) $benar++;
                    ?>
                        <ul class="list-group soal" id="soal<?= $i+1?>">
                            <div class="form-group mt-3">
                                <label for="" class="d-flex justify-content-end"><?= angka_arab($soal['no']).". ".$soal['soal']?></label>
                                <div class="jawaban mb-3"><b>Jawaban :</b> <br><span style="font-size: 22px"><?= $data_latihan['jawaban'][$i]?></span></div>
                                <label for=""><b>Pembahasan</b></label>

                                <?php 
                                    if($data_latihan['pembahasan'][$i] == "" && $data_latihan['jawaban'][$i] != $soal['jawaban']):
                                ?>
                                    <?php $pembahasan = $soal['jawaban']?>
                                <?php else :?>
                                    <?php $pembahasan = $data_latihan['pembahasan'][$i]?>
                                <?php endif;?>

                                <textarea name="pembahasan[]" id="" cols="30" rows="5" class="form-control form-control-lg"><?= $pembahasan?></textarea>
                                <small id="msg-empty-<?= $i?>" class="form-text text-danger">
                                    <?php 
                                        if($data_latihan['jawaban'][$i] != $soal['jawaban']):
                                    ?>
                                        *jawaban perlu dikoreksi
                                    <?php endif;?>
                                </small>

                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <span>
                                    <?php if($data_latihan['periksa'] == 0) :?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-md btn-primary mr-3 btnSimpan" data-id="1">simpan</a> -->
                                    <?php endif;?>
                                </span>
                                <span>
                                    <?php if($i != 0):?>
                                        <a data-id="<?= $i+1?>" class="btn btn-md btn-success text-light left mr-3"><i class="fa fa-angle-left"></i></a>
                                    <?php endif;?>
                                    <?php if($i != COUNT($data_soal)-1) :?>
                                        <a data-id="<?= $i+1?>" class="btn btn-md btn-success mr-3 text-light right"><i class="fa fa-angle-right"></i></a>
                                    <?php endif;?>
                                </span>
                            </div>
                        </ul>
                    <?php endforeach;?>
                    
                    <div class="d-flex mb-3">
                        <a href="javascript:void(0)" class="btn btn-md btn-block btn-primary btnSimpan">simpan</a>
                    </div>
                    
                    <div class="col-12 col-md-12 mb-3 text-center angka">
                        <span class="btn btn-md btn-secondary"><span id="angka">1</span> / <?= COUNT($data_soal)?></span>
                    </div>

                </div>                

                <div class="col-12 mb-3 bg-light">
                    <ul class="list-group">
                        <form action="<?= base_url()?>tarkibi2/add_nilai_isian" method="POST" id="formInput">
                            <input type="hidden" name="id" value="<?= $data_latihan['id']?>">
                            <div class="form-group mt-3">
                                <label for="">Jumlah Jawaban Benar</label><br>
                                <span id="benar"><?= $benar?></span>/<?= COUNT($data_soal)?>
                            </div>
                            <div class="form-group">
                                <label for="">Nilai</label>
                                <input type="text" name="nilai" id="nilai" class="form-control form-control-md" value="<?= $data_latihan['nilai']?>" required>
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
            // $(".soal").removeClass("mb-3");
            $(".soal").hide();
            $("#soal1").show();
            $(".left").show()
            $(".right").show()
            $(".angka").show()
            $("#angka").html("1")
        } else {
            $('#allSoal').html("Sembunyikan Semua Soal")
            // $(".soal").addClass("mb-3");
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
            }
        })
    })
</script>