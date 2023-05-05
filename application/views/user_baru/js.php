<script>
    var id = "<?php echo $id; ?>";

    function cek_npk() {

        var npk = $("#npk").val()
        var field = $("#role").val()

        // $("#but-npk").css('display', 'block !important')
        // $("#kode_provinsi").prop("disabled", false)
        // $("#kode_kab_kota").prop("disabled", false)

        $("#fullname").prop("readonly", false)
        $("#telepon").prop("readonly", false)
        if (field == 7) {
            if (npk != '') {
                var dt = tampil_data('wa_surveyor', 'npk', npk);

                if (dt.length > 0) {
                    combo('kode_provinsi', 'ms_provinsi~nama_provinsi~kode', 'kode', dt[0].kode_provinsi, dt[0].kode_provinsi)
                    combo("kode_kab_kota", 'ms_kab_kota~nama_kab_kota~kode', 'kode', dt[0].kode_kab_kota, dt[0].kode_kab_kota)
                    $("#fullname").val(dt[0].fullname)
                    $("#telepon").val(dt[0].phone)
                }


            }
            // $("#kode_provinsi").prop("disabled", true)
            // $("#kode_kab_kota").prop("disabled", true)
            $("#fullname").prop("readonly", true)
            $("#telepon").prop("readonly", true)
            $(".butnpk").css('display', 'block !important')


        }
    }

    $(document).ready(function() {
        $("#but-npk").css('display', 'block !important')
        combo('kode_provinsi', 'ms_provinsi~nama_provinsi~kode')
        combo('role', 'ms_role~role_name~id')
        if (id != '') {
            var dt = tampil_data('v_user_baru', 'id', id);
            combo('role', 'ms_role~role_name~id', '1', '1', dt[0].role_user)
            combo('kode_provinsi', 'ms_provinsi~nama_provinsi~kode', '1', '1', dt[0].kode_provinsi)
            combo("kode_kab_kota", 'ms_kab_kota~nama_kab_kota~kode', 'kode_provinsi', dt[0].kode_provinsi, dt[0].kode_kab_kota)
            $("#npk").val(dt[0].npk)
            $("#fullname").val(dt[0].fullname)
            $("#telepon").val(dt[0].phone)
            $("#email").val(dt[0].email)
            $("#username").val(dt[0].username)
            $("#tanggal_valid").val(dt[0].tanggal_valid)
            $("#password").val('')
        }

        $('.select2').select2()
        $('#titleId').html('<?= $title ?>')



        $("#postForm").submit(function(event) {
            event.preventDefault(); //prevent default action 
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = new FormData(this); //Encode form elements for submission
            var npk = $("#npk").val()
            var dt = tampil_data('ms_user', 'npk', npk);

            var post_url = '<?php echo base_url("user_baru/create") ?>'; //get form action url
            if (id != '') {
                post_url = '<?php echo base_url("user_baru/update") ?>'; //get form action url
                if (dt.length > 0 && dt[0].npk != npk) {
                    toastr.error('NPK / NIP / NIK Sudah Terdaftar !!')
                    return
                }
            } else {
                if (dt.length > 0) {
                    toastr.error('NPK / NIP / NIK Sudah Terdaftar !!')
                    return
                }
            }


            $.ajax({
                url: post_url,
                type: 'POST',
                data: form_data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
            }).done(function(response) {
                response = JSON.parse(response)
                if (response.sts == 'success') {
                    toastr.success(response.message);
                    $('.clear').val("")
                    // $('#table-front').DataTable().ajax.reload();
                    window.location.replace('<?= base_url("user_baru") ?>');
                } else {
                    toastr.error(response.message);
                }
            });


        });


    })

    function tampil_data(table, colum, id) {
        var url = ''
        var tadata = ''
        urls = "<?php echo base_url(); ?>user_baru/tampildata/" + table + "/" + colum + "/" + id;
        $.ajax({
            url: urls,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async: false,
            success: function(data) {
                tadata = data;
            },
            failure: function(errMsg) {
                alert(errMsg);
            }
        });
        return tadata;
    }

    function to_kab(idElmt, a, set = '') {
        b = a.value;
        if (b === undefined) {
            b = a
        }
        combo(idElmt, 'ms_kab_kota~nama_kab_kota~kode', 'kode_provinsi', b, set)
    }

    function combo(divname, table = '', colum = '1', id = '1', set = '') {
        url3 = "<?php echo base_url(); ?>user_baru/tampildata/" + table + "/" + colum + "/" + id + "/combobox";

        $.get(url3).done(function(data3) {
            jdata3 = JSON.parse(data3);
            //*
            $('#' + divname).empty();
            $('#' + divname).append(new Option("--Pilih--", ""));


            $.each(jdata3, function(i, el) {
                $('#' + divname).append(new Option(el.nama, el.kode));

            });
            $('#' + divname).val(set);

        }).fail(function() {
            alert("error");
        }).always(function() {
            // alert("finished");
        });
    }
</script>