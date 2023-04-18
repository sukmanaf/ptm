<script type="text/javascript">
    var BULAN = [
        "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"
    ];
    $(document).ready(function() {
        combo('provinsi', 'ms_provinsi~nama_provinsi~kode')
        tampil_data_dashboard('sektor_usaha', 2023, '')
        tampil_data_dashboard('jenjang_pendidikan', 2023, '')
        tampil_data_dashboard('agraria', 2023, '')
        tampil_data_dashboard('kelompok_usaha', 2023, '')
        for (let i = 1; i < 10; i++) {
            chart_pie(i)
        }


    })

    function chart_pie(no) {
        var ctx = document.getElementById('pie' + no).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Redistribusi Tanah', 'Tanah Belum Terdaftar', 'Legalisasi Aset', 'Sertipikasi'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 10],
                    backgroundColor: [
                        'red',
                        'gray',
                        'orange',
                        'blue'
                    ],
                    borderColor: [
                        '#f56954',
                        '#00a65a',
                        '#f39c12',
                        '#00c0ef'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

    function chart_sektor_usaha(id, data) {
        var datalabel = []
        var datajumlah = []
        for (let i = 0; i < data.length; i++) {
            datalabel.push(data[i].name)
            datajumlah.push(data[i].jumlah)
        }
        var ctx = document.getElementById(id).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: datalabel,
                datasets: [{
                    label: 'jumlah',
                    data: datajumlah,
                    backgroundColor: 'orange',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            // beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

    function tampil_data_dashboard(id = '', tahun = '', wilayah = '') {
        var url = ''
        var tadata = ''
        url = "<?php echo base_url(); ?>dashboard/tampil_data_dashboard/" + id + "/" + tahun + "/" + wilayah;
        $.ajax({
            url: url,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async: false,
            success: function(data) {
                chart_sektor_usaha(id, data)

            },
            failure: function(errMsg) {
                alert(errMsg);
            }
        });
    }

    function to_kab(idElmt = '', a = '', set = '') {
        b = a.value;

        var tahun = $("#tahun").val()
        if (b === undefined) {
            b = a
        }
        if (idElmt == 'kab_kota') {
            $("#kecamatan").empty()
            $("#desa").empty()
            combo(idElmt, 'ms_kab_kota~nama_kab_kota~kode', 'kode_provinsi', b, set)
        } else if (idElmt == 'kecamatan') {
            $("#kecamatan").empty()
            $("#desa").empty()
            combo(idElmt, 'ms_kecamatan~nama_kecamatan~kode', 'kode_kab_kota', b, set)
        } else if (idElmt == 'desa') {
            $("#desa").empty()
            combo(idElmt, 'ms_desa_kelurahan~nama_desa_kelurahan~kode', 'kode_kecamatan', b, set)
        }

        tampil_data_dashboard('sektor_usaha', tahun, b)
        tampil_data_dashboard('jenjang_pendidikan', tahun, b)
        tampil_data_dashboard('agraria', tahun, b)
        tampil_data_dashboard('kelompok_usaha', tahun, b)
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