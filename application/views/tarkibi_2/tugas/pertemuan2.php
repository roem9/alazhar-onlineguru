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
                    <div class="alert alert-info"><i class="fa fa-info-circle text-info"></i> Tentukan bentuk <b>Af'alul Khomsah</b> dari kata kerja berikut : </div>
                </div>

                <?php 
                    $soal = [
                        [
                            "no" => "1",
                            "soal" => "هما + يَكْتُبُ",
                            "jawaban" => "يَكْتُبَانِ",
                        ],
                        [
                            "no" => "2",
                            "soal" => "هم + يَكْتُبُ",
                            "jawaban" => "يَكْتُبُوْنَ",
                        ],
                        [
                            "no" => "3",
                            "soal" => "أنتما + يَكْتُبُ",
                            "jawaban" => "تَكْتُبَانِ",
                        ],
                        [
                            "no" => "4",
                            "soal" => "أنتم + يَكْتُبُ",
                            "jawaban" => "تَكْتُبُوْنَ",
                        ],
                        [
                            "no" => "5",
                            "soal" => "أنتِ + يَكْتُبُ",
                            "jawaban" => "تَكْتُبِيْنَ",
                        ],
                        [
                            "no" => "6",
                            "soal" => "هما  + يَكْوِى",
                            "jawaban" => "يَكْوِيَانِ",
                        ],
                        [
                            "no" => "7",
                            "soal" => "هم  + يَكْوِى",
                            "jawaban" => "يَكْوُوْنَ",
                        ],
                        [
                            "no" => "8",
                            "soal" => "أنتما  + يَكْوِى",
                            "jawaban" => "تَكْوِيَانِ",
                        ],
                        [
                            "no" => "9",
                            "soal" => "أنتم  + يَكْوِى",
                            "jawaban" => "تَكْوُوْنَ",
                        ],
                        [
                            "no" => "10",
                            "soal" => "أنتِ  + يَكْوِى",
                            "jawaban" => "تَكْوِيْنَ",
                        ],
                        [
                            "no" => "11",
                            "soal" => "هما + يَكْنُسُ",
                            "jawaban" => "يَكْنُسَانِ",
                        ],
                        [
                            "no" => "12",
                            "soal" => "هم + يَكْنُسُ",
                            "jawaban" => "يَكْنُسُوْنَ",
                        ],
                        [
                            "no" => "13",
                            "soal" => "أنتما + يَكْنُسُ",
                            "jawaban" => "تَكْنُسَانِ",
                        ],
                        [
                            "no" => "14",
                            "soal" => "أنتم + يَكْنُسُ",
                            "jawaban" => "تَكْنُسُوْنَ",
                        ],
                        [
                            "no" => "15",
                            "soal" => "أنتِ + يَكْنُسُ",
                            "jawaban" => "تَكْنُسِيْنَ",
                        ],
                        [
                            "no" => "16",
                            "soal" => "هما + يَجْلِسُ",
                            "jawaban" => "يَجْلِسَانِ",
                        ],
                        [
                            "no" => "17",
                            "soal" => "هم + يَجْلِسُ",
                            "jawaban" => "يَجْلِسُوْنَ",
                        ],
                        [
                            "no" => "18",
                            "soal" => "أنتما + يَجْلِسُ",
                            "jawaban" => "تَجْلِسَانِ",
                        ],
                        [
                            "no" => "19",
                            "soal" => "أنتم + يَجْلِسُ",
                            "jawaban" => "تَجْلِسُوْنَ",
                        ],
                        [
                            "no" => "20",
                            "soal" => "أنتِ + يَجْلِسُ",
                            "jawaban" => "تَجْلِسِيْنَ",
                        ],
                        [
                            "no" => "21",
                            "soal" => "هما + يَضِرِبُ",
                            "jawaban" => "يَضِرِبَانِ",
                        ],
                        [
                            "no" => "22",
                            "soal" => "هم + يَضِرِبُ",
                            "jawaban" => "يَضِرِبُوْنَ",
                        ],
                        [
                            "no" => "23",
                            "soal" => "أنتما + يَضِرِبُ",
                            "jawaban" => "تَضِرِبَانِ",
                        ],
                        [
                            "no" => "24",
                            "soal" => "أنتم + يَضِرِبُ",
                            "jawaban" => "تَضِرِبُوْنَ",
                        ],
                        [
                            "no" => "25",
                            "soal" => "أنتِ + يَضِرِبُ",
                            "jawaban" => "تَضِرِبِيْنَ",
                        ],
                        [
                            "no" => "26",
                            "soal" => "هما + يَفْلَحُ",
                            "jawaban" => "يَفْلَحَانِ",
                        ],
                        [
                            "no" => "27",
                            "soal" => "هم + يَفْلَحُ",
                            "jawaban" => "يَفْلَحُوْنَ",
                        ],
                        [
                            "no" => "28",
                            "soal" => "أنتما + يَفْلَحُ",
                            "jawaban" => "تَفْلَحَانِ",
                        ],
                        [
                            "no" => "29",
                            "soal" => "أنتم + يَفْلَحُ",
                            "jawaban" => "تَفْلَحُوْنَ",
                        ],
                        [
                            "no" => "30",
                            "soal" => "أنتِ + يَفْلَحُ",
                            "jawaban" => "تَفْلَحِيْنَ",
                        ],
                        [
                            "no" => "31",
                            "soal" => "هما + يَرْمِى",
                            "jawaban" => "يَرْمِيَانِ",
                        ],
                        [
                            "no" => "32",
                            "soal" => "هم + يَرْمِى",
                            "jawaban" => "يَرْمُوْنَ",
                        ],
                        [
                            "no" => "33",
                            "soal" => "أنتما + يَرْمِى",
                            "jawaban" => "تَرْمِيَانِ",
                        ],
                        [
                            "no" => "34",
                            "soal" => "أنتم + يَرْمِى",
                            "jawaban" => "تَرْمُوْنَ",
                        ],
                        [
                            "no" => "35",
                            "soal" => "أنتِ + يَرْمِى",
                            "jawaban" => "تَرْمِيْنَ",
                        ],
                        [
                            "no" => "36",
                            "soal" => "هما + يَقِى",
                            "jawaban" => "يَقِيَانِ",
                        ],
                        [
                            "no" => "37",
                            "soal" => "هم + يَقِى",
                            "jawaban" => "يَقُوْنَ",
                        ],
                        [
                            "no" => "38",
                            "soal" => "أنتما + يَقِى",
                            "jawaban" => "تَقِيَانِ",
                        ],
                        [
                            "no" => "39",
                            "soal" => "أنتم + يَقِى",
                            "jawaban" => "تَقُوْنَ",
                        ],
                        [
                            "no" => "40",
                            "soal" => "أنتِ + يَقِى",
                            "jawaban" => "تَقِيْنَ",
                        ],
                        [
                            "no" => "41",
                            "soal" => "هما + يَشْوِى",
                            "jawaban" => "يَشْوِيَانِ",
                        ],
                        [
                            "no" => "42",
                            "soal" => "هم + يَشْوِى",
                            "jawaban" => "يَشْوُوْنَ",
                        ],
                        [
                            "no" => "43",
                            "soal" => "أنتما + يَشْوِى",
                            "jawaban" => "تَشْوِيَانِ",
                        ],
                        [
                            "no" => "44",
                            "soal" => "أنتم + يَشْوِى",
                            "jawaban" => "تَشْوُوْنَ",
                        ],
                        [
                            "no" => "45",
                            "soal" => "أنتِ + يَشْوِى",
                            "jawaban" => "تَشْوِيْنَ",
                        ],
                        [
                            "no" => "46",
                            "soal" => "هما + يَقْلِى",
                            "jawaban" => "يَقْلِيَانِ",
                        ],
                        [
                            "no" => "47",
                            "soal" => "هم + يَقْلِى",
                            "jawaban" => "يَقْلُوْنَ",
                        ],
                        [
                            "no" => "48",
                            "soal" => "أنتما + يَقْلِى",
                            "jawaban" => "تَقْلِيَانِ",
                        ],
                        [
                            "no" => "49",
                            "soal" => "أنتم + يَقْلِى",
                            "jawaban" => "تَقْلُوْنَ",
                        ],
                        [
                            "no" => "50",
                            "soal" => "أنتِ + يَقْلِى",
                            "jawaban" => "تَقْلِيْنَ",
                        ],
                    ];
                ?>

                <div class="col-12 mb-3 bg-light" id="isiForm">
                    <?php 
                        $benar = 0;
                        foreach ($soal as $i => $soal) :
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
                                    <?php if($i != 49) :?>
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
                        <span class="btn btn-md btn-secondary"><span id="angka">1</span> / 50</span>
                    </div>

                </div>                

                <div class="col-12 mb-3 bg-light">
                    <ul class="list-group">
                        <form action="<?= base_url()?>tarkibi2/add_nilai_isian" method="POST" id="formInput">
                            <input type="hidden" name="id" value="<?= $data_latihan['id']?>">
                            <div class="form-group mt-3">
                                <label for="">Jumlah Jawaban Benar</label><br>
                                <span id="benar"><?= $benar?></span>/50
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




