<script type="text/javascript">
    function to_kab(a, idtabkab) {
        b = a.value;
        if (b === undefined) {
            b = a
        }
        var tab = $('#table-front' + idtabkab).DataTable();
        tab.destroy()
        loadDtKab(b, idtabkab)
    }

    function to_change(a, kat = 'pertama') {
        b = a.value;
        if (b === undefined) {
            b = a
        }
        var tahun = $("#tahun").val()
        var tk = $("#tk").val()
        var dt = '';
        if (kat != '') {
            $("#tahap").empty()
            if (tk == 'pertama') {
                dt = "<option value='penlok'>Penetapan Lokasi dan target KK</option>" +
                    "<option value='penyuluhan'>Penyuluhan</option>" +
                    "<option value='pemetaan'>Pemetaan Sosial</option>" +
                    "<option value='pemberdayaan'>Penetapan Model Pemberdayaan</option>" +
                    "<option value='penyusunan'>Penyusunan Data Penerima Akses </option>"
            } else if (tk == 'kedua') {
                dt = "<option value=''>Penguatan Kelembagaan</option>" +
                    "<option value=''>Pendampingan Kewirausahaan</option>" +
                    "<option value=''>Pembentukan Kerjasama</option>" +
                    "<option value=''>Penyusunan SK Pembentukan Kelompok Masyarakat</option>"
            } else if (tk == 'ketiga') {
                dt = "<option value=''>Pengembangan Rencana Usaha</option>" +
                    "<option value=''>Fasilitasi Akses Pemasaran</option>" +
                    "<option value=''>Fasilitasi Infrastruktur Pendukung</option>" +
                    "<option value=''>Diseminasi Model Akses Reforma Agrari</option>"
            }
        }
        $("#tahap").append(dt)

        var tab = $('#table-frontpertama').DataTable();
        tab.destroy()
        loadDt('pertama', tahun)
    }
    $(document).ready(function() {
        loadDt('pertama', 2023);
    });

    function loadDt(idtab, tahun) {

        $('#table-frontpertama').css('display', 'none')
        $('#table-frontpertama_wrapper').css('display', 'none')
        $('#table-frontkedua_wrapper').css('display', 'none')
        $('#table-frontketiga_wrapper').css('display', 'none')
        $('#table-frontkedua').css('display', 'none')
        $('#table-frontketiga').css('display', 'none')
        $('#table-front' + idtab).css('display', 'block')


        $('#table-front' + idtab).DataTable({
            ajax: {
                url: '<?php echo base_url(); ?>prestasi_kinerja/get_all/' + idtab + "/" + tahun,
                data: function(d) {
                    d.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                dataSrc: ''
            }
        })
    }

    function loadDtKab(kdprov, idtabkab) {

        $('#table-front' + idtabkab).DataTable({
            ajax: {
                url: '<?php echo base_url(); ?>prestasi_kinerja/get_kab/' + kdprov + "/" + idtabkab,
                data: function(d) {
                    d.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                dataSrc: ''
            }
        })
    }

    function dels(id) {
        $.get("<?= base_url('prestasi_kinerja/delete/') ?>" + id, function(response) {
            response = JSON.parse(response)
            if (response.sts == 'success') {
                toastr.success("Data Sudah Terhapus!");
                $('#table-front').DataTable().ajax.reload();
            } else {
                toastr.error("Data Gagal Dihapus!");
            }
        });
    }
</script>