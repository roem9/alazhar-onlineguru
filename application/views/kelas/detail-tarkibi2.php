
        <div class="container">
            <?php if( $this->session->flashdata('pesan') ) : ?>
                <div class="row">
                    <div class="col-12">
                        <?=$this->session->flashdata('pesan')?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row" id="dataKelas">
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info headerForm">Notifikasi</li>
                    </ul>
                </div>
            </div>
            <div class="row" id="dataPertemuan"></div>
            <div class="row" id="dataAbsen"></div>
            <div class="row" id="dataLatihan"></div>
            <div class="row" id="inputNilai">
                <div class="col-12">
                    <select name="input_latihan" id="input_latihan" class="form-control form-control-md">
                        <option value="">Pilih Input Nilai</option>
                        <?php for ($i=1; $i < 21; $i++) :
                            if($i != 7 && $i != 3 && $i != 6) :
                        ?>
                                <option value="1|Pertemuan <?= $i?>">Latihan Pertemuan <?= $i?></option>
                            <?php endif;?>
                        <?php endfor;?>
                        <?php for ($i=1; $i < 5; $i++) :?>
                            <option value="2|Review <?= $i?>">Review Pekan <?= $i?></option>
                        <?php endfor;?>
                    </select>
                </div>
                <div class="col-12 d-flex justify-content-end mt-2 mb-2">
                    <button class="btn btn-md btn-success" id="btnInputNilai">Tampilkan Form</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="msg-input-nilai"></div>
                </div>
                <div class="col-12">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info" id="titleForm"></li>
                        <div id="dataPeserta"></div>
                    </ul>
                </div>
            </div>
            <div class="row" id="listLatihan">
                <div class="col-12">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info d-flex justify-content-between">
                            Koreksi Latihan
                        </li>
                        <div id="list-latihan"></div>
                    </ul>
                </div>
            </div>
            <div class="row" id="listPeserta">
                <div class="col-12">
                    <ul class="list-group">
                        <div class="list-group-item list-group-item-info">List Peserta</div>
                        <div id="list-peserta"></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>

<!-- modal kelas -->
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBodyDetail">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-1"><i class="fas fa-clock"></i></a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#" class='nav-link active' id="btn-form-2"><i class="fas fa-tasks"></i></a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-2"><i class="fas fa-users"></i></a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="card-body cus-font">
                        <div id="form-1">
                            <div class="msgListPertemuan"></div>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info">List Pertemuan</li>
                            </ul>
                            <form id="formListPertemuan">
                                <input type="hidden" name="id_kelas">
                                <ul class="list-group">
                                    <div id="list-pertemuan"></div>
                                </ul>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<!-- modal kelas -->

<!-- modal sertifikat-->
    <div class="modal fade" id="modalSertifikat" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSertifikatTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body cus-font">
                        <div class="msgListSertifikat"></div>
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-info">List Sertifikat</li>
                        </ul>
                        <form id="formListSertifikat">
                            <ul class="list-group">
                                <div id="list-sertifikat"></div>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<!-- modal sertifikat-->

<!-- modal detail peserta -->
    <div class="modal fade" id="modalDetailPeserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailPesertaTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBodyDetail">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-2-1"><i class="fas fa-clock"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class='nav-link active' id="btn-form-2-2"><i class="fas fa-list-ol"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-2-3"><i class="fas fa-list-ol"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body cus-font">

                        <div id="form-2-1">
                            <div id="kehadiran"></div>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info">List Pertemuan</li>
                            </ul>
                            <input type="hidden" name="id_kelas">
                            <ul class="list-group">
                                <div id="list-absen"></div>
                            </ul>
                        </div>

                        <div id="form-2-2">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info titleNilai">Nilai Tugas Harian</li>
                            </ul>
                            <ul class="list-group">
                                <div id="list-tugas-harian"></div>
                            </ul>
                        </div>

                        <div class="card" id="form-2-3">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info">Nilai Tugas Review</li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Review Pekan 1</span>
                                    <span id="nilai-review-1"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Review Pekan 2</span>
                                    <span id="nilai-review-2"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Review Pekan 3</span>
                                    <span id="nilai-review-3"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Review Pekan 4</span>
                                    <span id="nilai-review-4"></span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<!-- modal detail peserta -->

<script>
    $("#inputNilai").hide();
    $("#titleForm").hide();
    $("#btnInputNilai").hide();
    $("#input_pertemuan").hide();
    $("#listLatihan").hide();
    // $("#listPeserta").hide();
    $("#dataPertemuan").hide();
    $("#listPeserta").hide();
    $(".headerForm").hide();

    $("#input_latihan").change(function(){
        let latihan = $("#input_latihan").val();
        
        $("#input_pertemuan").val("");
        $("#dataPeserta").hide();
        $("#titleForm").hide()

        if(latihan != "Tambahan" || latihan != "Hafalan"){
            $("#btnInputNilai").show();
            $("#input_pertemuan").hide();
        }        
    })

    $("#dataKelas").on("click", ".inputNilai", function(){
        $("#dataPeserta").hide();
        $("#btnInputNilai").hide();
        delete_msg()
        $(".headerForm").show();
        $(".headerForm").html("Input Nilai")
        $("#input_latihan").val("")
        $("#input_pertemuan").val("")
        $("#titleForm").hide();
        $("#dataPertemuan").hide();
        $("#dataAbsen").hide();
        $("#dataLatihan").hide();
        $("#inputNilai").show();
        $("#listLatihan").hide();
        $("#listPeserta").hide();

        $(".inputNilai").addClass("btn-info");
        $(".inputNilai").addClass("text-light");
        $(".notifikasi").removeClass("btn-info");
        $(".notifikasi").removeClass("text-light");
        $(".latihan").removeClass("btn-info");
        $(".latihan").removeClass("text-light");
    })
    
    $("#dataKelas").on("click", ".notifikasi", function(){
        $("#dataPeserta").hide();
        delete_msg()
        $(".headerForm").show();
        $(".headerForm").html("Notifikasi")
        $("#rekapPertemuan").val("")
        $("#dataPertemuan").show();
        $("#dataAbsen").hide();
        $("#dataLatihan").hide();
        $("#inputNilai").hide();
        $("#titleForm").hide();
        $("#listLatihan").hide();
        $("#listPeserta").hide();

        $(".inputNilai").removeClass("btn-info");
        $(".inputNilai").removeClass("text-light");
        $(".notifikasi").addClass("btn-info");
        $(".notifikasi").addClass("text-light");
        $(".latihan").removeClass("btn-info");
        $(".latihan").removeClass("text-light");
    })
    
    $("#dataKelas").on("click", ".latihan", function(){
        // list latihan
            html = "";

            $.ajax({
                url: "<?= base_url()?>tarkibi2/get_list_koreksi_latihan",
                dataType: "JSON",
                method: "POST",
                data: {id_kelas:"<?= $kelas['id_kelas']?>"},
                success: function(data){
                    console.log(data)
                    data.list.forEach(list => {
                        html += `
                            <li class="list-group-item d-flex justify-content-between">
                                <span>`+list.peserta.nama+`<br><b>`+list.pertemuan+`</b></span>
                                <span>
                                    <a href="<?= base_url()?>tarkibi2/koreksi/`+list.link+`" class="btn btn-md btn-primary">periksa</a>
                                </span>
                            </li>`;
                    });
                    $("#list-latihan").html(html);
                }
            })
        // list latihan
        
        $("#dataPeserta").hide();
        delete_msg()
        $(".headerForm").hide();
        $(".headerForm").html("Notifikasi")
        $("#rekapPertemuan").val("")
        $("#dataPertemuan").hide();
        $("#dataAbsen").hide();
        $("#dataLatihan").hide();
        $("#inputNilai").hide();
        $("#titleForm").hide();
        $("#listLatihan").show();
        $("#listPeserta").hide();

        $(".inputNilai").removeClass("btn-info");
        $(".inputNilai").removeClass("text-light");
        $(".notifikasi").removeClass("btn-info");
        $(".notifikasi").removeClass("text-light");
        $(".latihan").addClass("btn-info");
        $(".latihan").addClass("text-light");
    })
    
    $("#dataKelas").on("click", "#btnDataPeserta", function(){
        $("#dataPeserta").hide();
        delete_msg()
        $(".headerForm").hide();
        $(".headerForm").html("Notifikasi")
        $("#rekapPertemuan").val("")
        $("#dataPertemuan").hide();
        $("#dataAbsen").hide();
        $("#dataLatihan").hide();
        $("#inputNilai").hide();
        $("#titleForm").hide();
        $("#dataFaq").hide();
        $("#listPeserta").show();

        $(".inputNilai").removeClass("btn-info");
        $(".inputNilai").removeClass("text-light");
        $(".notifikasi").removeClass("btn-info");
        $(".notifikasi").removeClass("text-light");
        $(".faq").removeClass("btn-info");
        $(".faq").removeClass("text-light");
    })
    
    $("#btnInputNilai").click(function(){
        delete_msg()
        let pertemuan = $("#input_latihan").val()

        $("#dataPeserta").show()
        // $("#inputNilai").hide();
        // $(".headerForm").hide();
        $("#inputNilai").show();
        $(".headerForm").show();
        
        $.ajax({
            type: "POST",
            url: "<?= base_url()?>tarkibi2/get_nilai",
            dataType: "JSON",
            data: {id_kelas: "<?= $link?>", pertemuan: pertemuan},
            success: function(data){
                html = "";
                
                $("#titleForm").html($("#input_latihan option:selected").text());
                $("#titleForm").show();

                data.peserta.forEach(peserta => {
                    html += `
                        <li class="list-group-item">
                            <div class="row">
                                <input type="hidden" name="id_nilai" value="`+peserta.id_user+`|`+peserta.id_nilai+`">
                                <div class="col-8">
                                    `+peserta.nama+`
                                </div>
                                <div class="col-4">
                                    <input type="text" name="nilai" value="`+peserta.nilai+`" class="form-control form-control-md">
                                </div>
                            </div>
                        </li>
                    `;
                });

                html += `
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-md btn-primary mt-2" id="btnSimpanNilai">Simpan Nilai</button>
                    </div>
                `;

                $("#dataPeserta").html(html)
            }
        })
    })

    $("#dataPeserta").on("click", "#btnSimpanNilai", function(){
        if(confirm('Yakin akan menyimpan nilai?')){
            let id = [];
            let nilai = []
            let data = []
            let pertemuan = $("#input_latihan").val()


            $('input[name= "id_nilai"]').each(function(i, id_nilai){
                id[i] = id_nilai.value;
            });

            $('input[name= "nilai"]').each(function(i, data){
                nilai[i] = data.value;
            });
            
            for (let i = 0; i < id.length; i++) {
                data[i] = [id[i], nilai[i]]
            }

            $.ajax({
                method: "POST",
                url: "<?= base_url()?>tarkibi2/input_nilai",
                dataType: "JSON",
                data: {id_kelas: "<?= $link?>", pertemuan: pertemuan, data: data},
                success: function(datas){
                    // console.log(data)
                    $(".msg-input-nilai").html(`<div class="alert alert-success"><i class="fa fa-check-circle text-success"></i> berhasil menginputkan nilai peserta</div>`)
                    $(".container").scrollTop(0);
                }
            })
        }
    })
    
    // detail peserta 
        $("#listPeserta").on("click", ".detailPeserta", function(){
            a = [];
            $("#select1").html(0);
            const id = $(this).data('id');
            detail_peserta(id)
            btn_21();
            // nilai
                // $("#jenis_nilai").val("Harian")
                // $(".titleNilai").html("Nilai Tugas Harian");
                // $("#list-tugas-harian").show();
                // $("#list-tugas-tambahan").hide();
                // $("#list-tugas-hafalan").hide();
            // nilai
            // delete_msg();
        })
    // detail peserta 

    // add faq 
        $("#btnAddFaq").click(function(){
            if(confirm("Yakin akan menambahkan FAQ?")){
                let id_kelas = $("#id_kelas_add").val()
                let soal = $("#soal_add").val()
                let jawaban = $("#jawaban_add").val()

                $.ajax({
                    type: "POST",
                    url: "<?= base_url()?>kelas/add_faq",
                    dataType: "JSON",
                    data: {id_kelas: id_kelas, soal: soal, jawaban: jawaban},
                    success: function(data){
                        let html = `<div class="alert alert-success"><i class="fa fa-check-circle text-success"></i> berhasil menambahkan FAQ</div>`;
                        $(".msgFaq").html(html)
                        $("#formFaq").trigger("reset");
                        reload_data();
                    }
                })
            }
        })
    // add faq 

    // delete faq
        $("#btnDeleteFaq").click(function(){
            if(confirm("Yakin akan menghapus FAQ ini?")){
                let id = $("#id_faq_edit").val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url()?>kelas/delete_faq",
                    dataType: "JSON",
                    data: {id: id},
                    success: function(data){
                        reload_data();
                        $('#modalEditFaq').modal('hide');
                    }
                })
            }
        })
    // delete faq

    // edit faq 
        $("#btnEditFaq").click(function(){
            if(confirm("Yakin akan merubah FAQ ini?")){
                let soal = $("#soal_edit").val()
                let jawaban = $("#jawaban_edit").val()
                let id = $("#id_faq_edit").val();

                $.ajax({
                    type: "POST",
                    url: "<?= base_url()?>kelas/edit_faq",
                    dataType: "JSON",
                    data: {id: id, soal: soal, jawaban: jawaban},
                    success: function(data){
                        reload_data();
                        let html = `<div class="alert alert-success"><i class="fa fa-check-circle text-success"></i> berhasil merubah FAQ</div>`;
                        $(".msgFaqEdit").html(html)
                    }
                })
            }
        })
    // edit faq 

    // search faq
        $("#search_faq").on("change paste keyup", function() {
            let search = $(this).val();
            let program = "<?= $kelas['program']?>"
            
            faq(search, program)
        });
    // search faq

    $("#dataFaq").on("click", ".editFaq", function(){
        delete_msg();

        let id = $(this).data("id");

        $.ajax({
            type: "POST",
            url: "<?= base_url()?>kelas/get_faq",
            data: {id: id},
            dataType: "JSON",
            success: function(data){
                $("#id_faq_edit").val(id)
                $("#soal_edit").val(data.soal)
                $("#jawaban_edit").val(data.jawaban)
            }
        })
    })

    reload_data();
    // reload_peserta();

    let a = [];
    let b = [];

    $("#dataKelas").on("click", ".detail", function(){
        a = [];
        $("#select1").html(0);
        const id = $(this).data('id');
        detail(id)
        btn_1();
        delete_msg();
    })


    $("#dataKelas").on("click", ".sertifikat", function(){
        const id = $(this).data('id');
        // delete_msg();
        sertifikat(id);
    })

    $("#list-sertifikat").on("click", "#btnSaveNilai", function(){
        let id = $(this).data("id");
        let nilai = $("#nilai"+id).val();
        
        // console.log(id);
        // console.log(nilai);
        $.ajax({
            url: "<?= base_url()?>kelas/add_nilai_sertifikat",
            method: "POST",
            dataType: "JSON",
            data: {id:id, nilai:nilai},
            success: function(result){
                delete_msg();
                if(result == 1){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'berhasil menginputkan nilai',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#msg-"+id).html(`<small class="form-text text-success msg-nilai">berhasil menginputkan nilai</small>`)
                } else {
                    $("#msg-"+id).html(`<small class="form-text text-danger msg-nilai">nilai belum diinputkan</small>`)
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        text: 'nilai belum diinputkan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    })

    // sertifikat 
        $('#formListSertifikat').on('click', '#onSertifikat', function(){
            let id = $(this).data("id");
            $.ajax({
                type : "POST",
                url : "<?= base_url()?>kelas/add_sertifikat",
                dataType : "JSON",
                data : {id_sertifikat: id},
                success : function(data){
                    sertifikat(data);
                }
            })
        });
        
        $('#formListSertifikat').on('click', '#offSertifikat', function(){
            let id = $(this).data("id");
            if(confirm('Yakin akan menghapus sertifkat?')){
                $.ajax({
                    type : "POST",
                    url : "<?= base_url()?>kelas/delete_sertifikat",
                    dataType : "JSON",
                    data : {id_sertifikat: id},
                    success : function(data){
                        sertifikat(data);
                    }
                })
            }
        });
    // sertifikat 

    // pertemuan 
        $('#formListPertemuan').on('click', '#onPertemuan', function(){
            let data = $(this).data("id");
            data = data.split("|")
            $.ajax({
                type : "POST",
                url : "<?= base_url()?>kelas/add_pertemuan",
                dataType : "JSON",
                data : {pertemuan:data[0], id_kelas:data[1]},
                success : function(data){
                    detail(data);
                    reload_data();
                }
            })
        });
        
        $('#formListPertemuan').on('click', '#offPertemuan', function(){
            let data = $(this).data("id");
            data = data.split("|")
            if(confirm('Yakin akan menghapus '+data[0]+'?')){
                $.ajax({
                    type : "POST",
                    url : "<?= base_url()?>kelas/delete_pertemuan",
                    dataType : "JSON",
                    data : {pertemuan:data[0], id_kelas:data[1]},
                    success : function(data){
                        detail(data);
                        reload_data();
                    }
                })
            }
        });
    // pertemuan 
    
    // ujian 
        $('#formListUjian').on('click', '#onPertemuan', function(){
            let data = $(this).data("id");
            data = data.split("|")
            $.ajax({
                type : "POST",
                url : "<?= base_url()?>kelas/add_ujian",
                dataType : "JSON",
                data : {pertemuan:data[0], id_kelas:data[1]},
                success : function(data){
                    detail(data);
                    reload_data();
                }
            })
        });
        
        $('#formListUjian').on('click', '#offPertemuan', function(){
            let data = $(this).data("id");
            data = data.split("|")
            if(confirm('Yakin akan menghapus '+data[0]+'?')){
                $.ajax({
                    type : "POST",
                    url : "<?= base_url()?>kelas/delete_ujian",
                    dataType : "JSON",
                    data : {pertemuan:data[0], id_kelas:data[1]},
                    success : function(data){
                        detail(data);
                        reload_data();
                    }
                })
            }
        });
    // ujian 
    
    // presensi 
        $('#formListPertemuan').on('click', '#onAbsen', function(){
            let data = $(this).data("id");
            data = data.split("|")
            $.ajax({
                type : "POST",
                url : "<?= base_url()?>kelas/on_absen",
                dataType : "JSON",
                data : {pertemuan:data[0], id_kelas:data[1]},
                success : function(data){
                    detail(data);
                    reload_data();
                }
            })
        });

        $('#formListPertemuan').on('click', '#offAbsen', function(){
            let data = $(this).data("id");
            data = data.split("|")
            $.ajax({
                type : "POST",
                url : "<?= base_url()?>kelas/off_absen",
                dataType : "JSON",
                data : {pertemuan:data[0], id_kelas:data[1]},
                success : function(data){
                    detail(data);
                    reload_data();
                }
            })
        });
    // presensi

    $("#dataPertemuan").on('click', '#btnAbsen', function(){
        $("#dataAbsen").show();
        $("#dataLatihan").hide();

        $("#btnAbsen").addClass("btn-info");
        $("#btnLatihan").removeClass("btn-info");
    })
    
    $("#dataPertemuan").on('click', '#btnLatihan', function(){
        $("#dataAbsen").hide();
        $("#dataLatihan").show();
        
        $("#btnAbsen").removeClass("btn-info");
        $("#btnLatihan").addClass("btn-info");
    })

    // onchange pertemuan 
        $("#dataPertemuan").on('change', '#rekapPertemuan', function(){    
            let value = $(this).val();
            if(value != ""){
                $("#dataAbsen").show();
                $("#dataLatihan").hide();

                $("#btnAbsen").addClass("btn-info");
                $("#btnLatihan").removeClass("btn-info");

                let pertemuan = $(this).val();
                $.ajax({
                    type : "POST",
                    url : "<?= base_url()?>tarkibi2/ajax_pertemuan",
                    dataType : "JSON",
                    data : {id_kelas:"<?= $link?>", pertemuan:pertemuan},
                    success : function(data){
                        let html = "";

                        html = `<div class="col-12">`;
                        if(data.absen.length != 0){
                            data.absen.forEach(absen => {
                                html += `<ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>`+absen.nama+`</span>
                                                <span><a href="`+absen.pesan+`" target="_blank" class="btn btn-md btn-outline-success"><i class="fa fa-phone"></i></a></span>
                                            </li>
                                        </ul>`;
                            });
                        } else {
                            html += `<div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning"></i> list kosong</div>`;
                        }
                        
                        html += `</div>`;

                        $("#dataAbsen").html(html)
                        
                        html = `<div class="col-12">`;
                        if(data.latihan.length != 0){
                            data.latihan.forEach(latihan => {
                                html += `<ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>`+latihan.nama+`</span>
                                                <span><a href="`+latihan.pesan+`" target="_blank" class="btn btn-md btn-outline-success"><i class="fa fa-phone"></i></a></span>
                                            </li>
                                        </ul>`;
                            });
                        } else {
                            html += `<div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning"></i> list kosong</div>`;
                        }
                        
                        html += `</div>`;

                        $("#dataLatihan").html(html)
                    }
                })
            } else {
                $("#dataAbsen").hide();
                $("#dataLatihan").hide();

                $("#btnAbsen").removeClass("btn-info");
                $("#btnLatihan").removeClass("btn-info");
            }
        })
    // onchange pertemuan

    // detail
        $("#btn-form-1").click(function(){
            btn_1();
            delete_msg();
        })
        
        $("#btn-form-2").click(function(){
            btn_2();
            delete_msg();
        })
        
        $("#btn-form-3").click(function(){
            btn_3();
            delete_msg();
        })
    // detail
        
    // detail
        $("#btn-form-2-1").click(function(){
            btn_21();
            delete_msg();
        })
        
        $("#btn-form-2-2").click(function(){
            btn_22();
            delete_msg();
        })
        
        $("#btn-form-2-3").click(function(){
            btn_23();
            delete_msg();
        })
    // detail

    // function
        function reload_data(){
            $.ajax({
                type : "POST",
                url : "<?= base_url()?>kelas/ajax_one",
                dataType : "JSON",
                data : {id_kelas: "<?= $link?>"},
                success : function(data){
                    let html = "";
                    html += `<div class="col-12 col-md-4 mb-2">
                                <ul class="list-group shadow">
                                    <li class="list-group-item list-group-item-success d-flex justify-content-between">
                                        <span>
                                            <strong>`+data.kelas.nama_kelas+`</strong>
                                        </span>
                                        <span>
                                            <a href="<?= base_url()?>kelas" class="btn btn-sm btn-danger"><i class="fa fa-sign-out-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="">
                                            <i class="fa fa-users mr-2"></i>`+data.kelas.peserta+` Orang
                                        </div>
                                        <a href="#" class="btn btn-sm list-group-item-primary" id="btnDataPeserta"><i class="fa fa-users"></i></a>
                                    </li>
                                    <li class="list-group-item"><i class="fa fa-book mr-2"></i>Pertemuan `+data.kelas.pertemuan.length+`</li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="">
                                            <a href="#modalSertifikat" data-id="`+data.kelas.id_kelas+`" data-toggle="modal" class="btn btn-md list-group-item-primary sertifikat"><i class="fa fa-award"></i></a>
                                            <a href="#modalDetail" data-id="`+data.kelas.id_kelas+`" data-toggle="modal" class="btn btn-md list-group-item-success detail"><i class="fa fa-book"></i></a>
                                        </div>
                                        <span>
                                            <a target="_blank" href="<?= base_url()?>tarkibi2/rekap_nilai/`+data.kelas.link+`" class="btn btn-md btn-success"><i class="fa fa-download"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>
                                            <a href="#" data-id="`+data.kelas.id_kelas+`" data-toggle="modal" class="btn btn-md btn-secondary notifikasi"><i class="fa fa-comment"></i></a>
                                            <a href="#" data-id="`+data.kelas.id_kelas+`" data-toggle="modal" class="btn btn-md btn-secondary inputNilai">input nilai</a>
                                        </span>
                                        <span>
                                            <a href="<?= base_url()?>tarkibi2/tugas/`+data.kelas.link+`" class="btn btn-md list-group-item-danger">tugas</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>`;
                                            // <a href="#" data-id="`+data.kelas.id_kelas+`" data-toggle="modal" class="btn btn-md btn-outline-info faq">FAQ</a>
                    $("#dataKelas").html(html);


                    html = `<div class="col-12 mb-2">
                            <select name="pertemuan" id="rekapPertemuan" class="form-control form-control-md">
                                <option value="">Pilih Pertemuan</option>`;
                            
                    data.kelas.pertemuan.forEach(pertemuan => {
                        html += `<option value="`+pertemuan.materi+`">`+pertemuan.materi+`</option>`;
                    });

                    html += `
                        <option value="Review 1">Review Pekan 1</option>
                        <option value="Review 2">Review Pekan 2</option>
                        <option value="Review 3">Review Pekan 3</option>
                        <option value="Review 4">Review Pekan 4</option>
                    `;
                    
                    html += `</select></div>
                            <div class="col-12 mb-4 d-flex justify-content-center">
                                <a class="btn btn-md btn-outline-info text-light mr-2" id="btnAbsen">Presensi</a>
                                <a class="btn btn-md btn-outline-info text-light" id="btnLatihan">Latihan</a>
                            </div>`;

                    $("#dataPertemuan").html(html);
                    
                    html = "";
                    data.faq.forEach(faq => {
                        html += `<li class="list-group-item d-flex justify-content-between">
                                    <span>
                                        `+faq.soal+`
                                    </span>
                                    <span>
                                        <a href="#modalEditFaq" data-toggle="modal" data-id="`+faq.id+`" class="btn btn-md btn-success editFaq"><i class="fa fa-edit"></i></a>
                                    </span>
                                </li>`
                    });

                    $("#list-faq").html(html)
                    
                    html = "";
                    data.peserta.forEach(peserta => {
                        html += `<li class="list-group-item d-flex justify-content-between">
                                    <span>
                                        `+peserta.nama+`
                                    </span>
                                    <span>
                                        <a href="#modalDetailPeserta" data-toggle="modal" data-id="`+peserta.id_user+`" class="text-info detailPeserta"><i class="fa fa-info-circle"></i></a>
                                    </span>
                                </li>`
                    });

                    $("#list-peserta").html(html)

                }
            })
        }

        function sertifikat(id){
            $.ajax({
                method: "POST",
                url: "<?= base_url()?>kelas/get_sertifikat",
                dataType: "JSON",
                data: {id_kelas: id},
                success: function(data){
                    // console.log(data);
                    $("#modalSertifikatTitle").html(data.kelas.nama_kelas);
                    let html = "";
                    let sertifikat = "";
                    let button = "";

                    // data.peserta.forEach(peserta => {
                    //     if(peserta.sertifikat == "0"){
                    //         sertifikat = "onSertifikat";
                    //         button = "btn-outline-warning";
                    //     } else {
                    //         sertifikat = "offSertifikat";
                    //         button = "btn-warning";
                    //     }

                    //     html += `
                    //         <li class="list-group-item d-flex justify-content-between">
                    //             <span>
                    //                 `+peserta.nama+`<br><span class="btn btn-md btn-outline-dark">`+peserta.nilai+`</span>
                    //             </span>
                    //             <span>
                    //                 <a href="#" class="btn btn-md `+button+`" id="`+sertifikat+`" data-id="`+peserta.id_sertifikat+`"><i class="fa fa-award"></i></a>
                    //             </span>
                    //         </li>
                    //     `;
                    // });

                    data.peserta.forEach((element, i) => {
                        // console.log(element)
                        if(element.sertifikat == "0"){
                            sertifikat = "onSertifikat";
                            button = "btn-outline-warning";
                        } else {
                            sertifikat = "offSertifikat";
                            button = "btn-warning";
                        }
                        
                        if(data.status == "aktif") btnDelete = `<a href="javascript:void(0)" id="keluar_kelas" class="mr-1" data-id="`+element.id_sertifikat+`|`+element.nama+`|`+data.nama_kelas+`"><i class="fa fa-minus-circle text-danger"></i></a>`
                        else btnDelete = "";

                        if(element.nilai == "") nilai = `<small class="form-text text-danger">nilai belum diinputkan</small>`
                        else nilai = ``
                        
                        mumtaz = "";
                        jj = "";
                        jayyid = "";
                        maqbul = "";

                        if(element.nilai == "ممتاز"){ mumtaz = "selected" }else {mumtaz = ""}
                        if(element.nilai == "جيد جدا"){ jj = "selected" }else {jj = ""}
                        if(element.nilai == "جيد"){ jayyid = "selected" }else {jayyid = ""}
                        if(element.nilai == "مقبول"){ maqbul = "selected" }else {maqbul = ""}

                        html += `<li class="list-group-item">
                                    <span>
                                        `+btnDelete+`
                                        `+element.nama+`<br>
                                    </span>
                                    <div class="form-group mt-1">
                                        <select name="nilai" id="nilai`+element.id_sertifikat+`" class="form-control form-control-md mr-1">
                                            <option value="">Nilai</option>
                                            <option `+mumtaz+` value="ممتاز">ممتاز</option>
                                            <option `+jj+` value="جيد جدا">جيد جدا</option>
                                            <option `+jayyid+` value="جيد">جيد</option>
                                            <option `+maqbul+` value="مقبول">مقبول</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span id="msg-`+element.id_sertifikat+`">`+nilai+`</span>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary" id="btnSaveNilai" data-id="`+element.id_sertifikat+`">simpan</a>
                                    </div>
                                </li>`;
                    });

                    $("#list-sertifikat").html(html)
                }
            })
        }

        function reload_peserta(){
            $.ajax({
                type : "POST",
                url : "<?= base_url()?>kelas/ajax_detail",
                dataType : "JSON",
                data : {id_kelas: "<?= $link?>"},
                success : function(data){
                    // console.log(data)
                    let html = "";
                    let i = 1;
                    data.peserta.forEach(peserta => {
                        html += `<ul class="list-group">
                                    <li class="list-group-item">`+i+`. `+peserta.nama+`</li>
                                </ul>`;
                        i++;
                    });

                    $("#dataPeserta").html(html);
                }
            })
        }

        function detail(id){
            $.ajax({
                url : "<?=base_url()?>hifdzi1/get_detail_kelas",
                method : "POST",
                data : {id : id},
                async : true,
                dataType : 'json',
                success : function(data){
                    // console.log(data.pertemuan)
                    $("#modalDetailTitle").html(data.nama_kelas);
                    $("input[name='id_kelas']").val(data.id_kelas);
                    
                    pert = [];
                    absen = [];
                    if(data.pertemuan){
                        data.pertemuan.forEach((materi, i) => {
                            pert[i] = materi.materi;
                            if(materi.absen == 1)
                                absen[i] = materi.materi;
                        });
                    }

                    let html = "";
                    let check = "";
// review 1 - 4 
                    for (let i = 1; i < 21; i++) {
                        if(pert.includes("Pertemuan "+i)){
                            html += `<li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <label for="per`+i+`">Pertemuan `+i+`</label>
                                            <div class="">
                                                <a href="#" class="btn btn-md btn-primary mr-2" data-id="Pertemuan `+i+`|`+data.id_kelas+`" id="offPertemuan"><i class="fa fa-book"></i></a>`;
                            if(absen.includes("Pertemuan "+i)){
                                html += `<a href="#" class="btn btn-md btn-primary" data-id="Pertemuan `+i+`|`+data.id_kelas+`" id="offAbsen"><i class="fa fa-user-check"></i></a>`;
                            } else {
                                html += `<a href="#" class="btn btn-md btn-outline-info" data-id="Pertemuan `+i+`|`+data.id_kelas+`" id="onAbsen"><i class="fa fa-user-check"></i></a>`;
                            }
                            
                            html += `
                                            </div>
                                        </div>
                                    </li>`;
                        } else {
                            html += `<li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <label for="per`+i+`">Pertemuan `+i+`</label>
                                            <div class="">
                                                <a href="#" class="btn btn-md btn-outline-info mr-2" data-id="Pertemuan `+i+`|`+data.id_kelas+`" id="onPertemuan"><i class="fa fa-book"></i></a>
                                            </div>
                                        </div>
                                    </li>`;
                        }
                    }

                    $("#list-pertemuan").html(html);

                    html = "";
                    
                    ujian = [];
                    if(data.ujian){
                        data.ujian.forEach((materi, i) => {
                            ujian[i] = materi.materi;
                        });
                    }

                    for (let i = 1; i < 5; i++) {
                        if(ujian.includes("Ujian Pekan "+i)){
                            html += `<li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <label for="per`+i+`">Ujian Pekan `+i+`</label>
                                            <div class="">
                                                <a href="#" class="btn btn-md btn-primary mr-2" data-id="Ujian Pekan `+i+`|`+data.id_kelas+`" id="offPertemuan"><i class="fa fa-book"></i></a>
                                            </div>
                                        </div>
                                    </li>`;
                        } else {
                            html += `<li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <label for="per`+i+`">Ujian Pekan `+i+`</label>
                                            <div class="">
                                                <a href="#" class="btn btn-md btn-outline-info mr-2" data-id="Ujian Pekan `+i+`|`+data.id_kelas+`" id="onPertemuan"><i class="fa fa-book"></i></a>
                                            </div>
                                        </div>
                                    </li>`;
                        }
                    }
                    
                    if(ujian.includes("Ujian Akhir")){
                        html += `<li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <label for="per">Ujian Akhir</label>
                                        <div class="">
                                            <a href="#" class="btn btn-md btn-primary mr-2" data-id="Ujian Akhir|`+data.id_kelas+`" id="offPertemuan"><i class="fa fa-book"></i></a>
                                        </div>
                                    </div>
                                </li>`;
                    } else {
                        html += `<li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <label for="per">Ujian Akhir</label>
                                        <div class="">
                                            <a href="#" class="btn btn-md btn-outline-info mr-2" data-id="Ujian Akhir|`+data.id_kelas+`" id="onPertemuan"><i class="fa fa-book"></i></a>
                                        </div>
                                    </div>
                                </li>`;
                    }

                    $("#list-ujian").html(html);
                }
            })
        }

        function detail_peserta(id){
            $.ajax({
                url : "<?=base_url()?>tarkibi2/get_detail_peserta",
                method : "POST",
                data : {id_kelas: "<?= $kelas['id_kelas']?>", id : id},
                async : true,
                dataType : 'json',
                success : function(data){
                    // console.log(data)
                    $("#modalDetailPesertaTitle").html(data.peserta.nama);
                    $("input[name='id_kelas']").val(data.id_kelas);
                    
                    let html = "";
                    let check = "";
                    
                    absen = [];
                    data.absen.forEach((materi, i) => {
                        absen[i] = materi.pertemuan;
                    });

                    pert = [];
                    data.pertemuan.forEach((materi, i) => {
                        if(materi.absen == 1){
                            if(absen.includes(materi.materi))
                                symbol = `<i class="fa fa-check-circle text-success"></i>`
                            else 
                                symbol = `<i class="fa fa-times-circle text-danger"></i>`

                            html += `<li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <label for="per`+i+`">`+materi.materi+`</label>
                                            <span>`+symbol+`</span>
                                        </div>
                                    </li>`;
                        } else {
                            if(absen.includes(materi.materi))
                                symbol = `<i class="fa fa-check-circle text-success"></i>`
                            else 
                                symbol = `<i class="fa fa-times-circle text-danger"></i>`

                            html += `<li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <label for="per`+i+`">`+materi.materi+`</label>
                                            <span>`+symbol+`</span>
                                        </div>
                                    </li>`;
                        }
                    });
                    
                    $("#list-absen").html(html);

                    html = `<div class="alert alert-info"><i class="fa fa-info-circle text-info"></i> Kehadiran adalah `+data.absen.length+`/`+data.pertemuan.length+`</div>`;
                    $("#kehadiran").html(html)
                    
                    html = "";
                    data.nilai.forEach((nilai, i) => {
                        html += `<li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <label for="per`+i+`">`+nilai.pertemuan+`</label>
                                        <span>`+nilai.nilai+`</span>
                                    </div>
                                </li>`;
                    });
                    
                    $("#list-tugas-harian").html(html);

                    $("#nilai-review-1").html(data.review[0]);
                    $("#nilai-review-2").html(data.review[1]);
                    $("#nilai-review-3").html(data.review[2]);
                    $("#nilai-review-4").html(data.review[3]);
                }
                
            })
        }
        
        function faq(search, program){
            $.ajax({
                url: "<?= base_url()?>kelas/search_faq",
                type: "POST",
                dataType: "JSON",
                data: {search: search, program: program},
                success: function(data){
                    html = "";
                    if(data.faq.length != 0){
                        data.faq.forEach(faq => {
                            html += `<li class="list-group-item d-flex justify-content-between">
                                        <span>
                                            `+faq.soal+`
                                        </span>
                                        <span>
                                            <a href="#modalFaq" data-toggle="modal" data-id="`+faq.id+`" class="detailFaq"><i class="fa fa-question-circle text-info"></i></a>
                                        </span>
                                    </li>`
                        });
                    } else {
                        html += `<div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning"></i> faq tidak ada</div>`;
                    }

                    $("#list-faq").html(html)       
                }
            })
        }

        function btn_1(){
            $("#btn-form-1").addClass('active');
            $("#btn-form-2").removeClass('active');
            $("#btn-form-3").removeClass('active');
            
            $("#form-1").show();
            $("#form-2").hide();
            $("#form-3").hide();
        }

        function btn_2(){ 
            $("#btn-form-1").removeClass('active');
            $("#btn-form-2").addClass('active');
            $("#btn-form-3").removeClass('active');
            
            $("#form-1").hide();
            $("#form-2").show();
            $("#form-3").hide();
        }
        
        function btn_3(){
            $("#id_kelas_add").val("");
            $("#btn-form-1").removeClass('active');
            $("#btn-form-2").removeClass('active');
            $("#btn-form-3").addClass('active');
            
            $("#form-1").hide();
            $("#form-2").hide();
            $("#form-3").show();
        }
        
        function btn_21(){
            $("#btn-form-2-1").addClass('active');
            $("#btn-form-2-2").removeClass('active');
            $("#btn-form-2-3").removeClass('active');
            
            $("#form-2-1").show();
            $("#form-2-2").hide();
            $("#form-2-3").hide();
        }

        function btn_22(){ 
            $("#btn-form-2-1").removeClass('active');
            $("#btn-form-2-2").addClass('active');
            $("#btn-form-2-3").removeClass('active');
            
            $("#form-2-1").hide();
            $("#form-2-2").show();
            $("#form-2-3").hide();
        }
        
        function btn_23(){
            $("#id_kelas_add").val("");
            $("#btn-form-2-1").removeClass('active');
            $("#btn-form-2-2").removeClass('active');
            $("#btn-form-2-3").addClass('active');
            
            $("#form-2-1").hide();
            $("#form-2-2").hide();
            $("#form-2-3").show();
        }
        
        function delete_msg(){
            $('.msgHapusPeserta').html("");
            $('.msgEditKelas').html("");
            $('.msg-add-data').html("");
            $('.msgListPertemuan').html("");
            $(".msg-input-nilai").html("")
            $(".msgFaq").html("")
            $(".msgFaqEdit").html("")
        }
    // function 
</script>