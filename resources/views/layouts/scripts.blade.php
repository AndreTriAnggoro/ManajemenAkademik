<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="../assets/js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="../assets/js/setting-demo.js"></script>
<script src="../assets/js/demo.js"></script>
{{-- chart --}}
<script>
    Circles.create({
        id: 'circles-1',
        radius: 45,
        value: 60,
        maxValue: 100,
        width: 7,
        text: 5,
        colors: ['#f1f1f1', '#FF9E27'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-2',
        radius: 45,
        value: 70,
        maxValue: 100,
        width: 7,
        text: 36,
        colors: ['#f1f1f1', '#2BB930'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-3',
        radius: 45,
        value: 40,
        maxValue: 100,
        width: 7,
        text: 12,
        colors: ['#f1f1f1', '#F25961'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

    var mytotalIncomeChart = new Chart(totalIncomeChart, {
        type: 'bar',
        data: {
            labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
            datasets: [{
                label: "Total Income",
                backgroundColor: '#ff9e27',
                borderColor: 'rgb(23, 125, 255)',
                data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: false //this will remove only the label
                    },
                    gridLines: {
                        drawBorder: false,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false
                    }
                }]
            },
        }
    });

    $('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: '#ffa534',
        fillColor: 'rgba(255, 165, 52, .14)'
    });
</script>
{{-- datatable --}}
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});

        $('#siswaTable').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d +
                            '</option>')
                    });
                });
            }
        });
        $('#kelasTable').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d +
                            '</option>')
                    });
                });
            }
        });
        $('#guruTable').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d +
                            '</option>')
                    });
                });
            }
        });
        $('#mataPelajaranTable').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d +
                            '</option>')
                    });
                });
            }
        });
        $('#guruKelasMapelTable').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d +
                            '</option>')
                    });
                });
            }
        });
        $('#guru2Table').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d +
                            '</option>')
                    });
                });
            }
        });
        $('#kelas2Table').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d +
                            '</option>')
                    });
                });
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action =
            '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>
{{-- siswa js --}}
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                    'content') // Mengambil CSRF token dari meta tag
            }
        });
        // Fungsi untuk menambahkan siswa
        $('#addSiswaForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('siswa.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    // Ambil instance DataTable
                    var table = $('#siswaTable').DataTable();

                    // Tambahkan data baru ke DataTable
                    table.row.add([
                        response.siswa.nama,
                        response.siswa.nisn,
                        response.siswa.kelas.nama_kelas,
                        response.siswa.jenis_kelamin === 'L' ? 'Laki-laki' :
                        'Perempuan',
                        response.siswa.tanggal_lahir,
                        response.siswa.tempat_lahir,
                        response.siswa.alamat,
                        `<button class="btn btn-link btn-primary btn-lg editBtn" data-id="${response.siswa.id}" data-toggle="tooltip" data-original-title="Edit">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-link btn-danger deleteBtn" data-id="${response.siswa.id}" data-toggle="tooltip" data-original-title="Hapus">
                            <i class="fa fa-times"></i>
                        </button>`
                    ]).draw(false); // draw(false) agar tidak refresh tabel penuh

                    $('#tambahSiswaModal').modal('hide'); // Tutup modal setelah sukses
                    setTimeout(function() {
                        alert(response.success); // Tampilkan alert sukses
                    }, 300);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Debug error
                    alert('Terjadi kesalahan saat menambahkan siswa.');
                }
            });
        });

        // Fungsi untuk edit siswa
        $('#siswaTable').on('click', '.editBtn', function() {
            var siswaId = $(this).data('id');

            $.get('/siswa/' + siswaId + '/edit', function(data) {
                $('#editNama').val(data.nama);
                $('#editKelas').val(data.kelas_id);
                $('#editNISN').val(data.nisn);
                $('#editJenisKelamin').val(data.jenis_kelamin);
                $('#editTanggalLahir').val(data.tanggal_lahir);
                $('#editTempatLahir').val(data.tempat_lahir);
                $('#editAlamat').val(data.alamat);
                $('#editSiswaForm').attr('action', '/siswa/' + siswaId);
                $('#editSiswaModal').modal('show');
            });
        });



        // Fungsi untuk update siswa
        $('#editSiswaForm').on('submit', function(e) {
            e.preventDefault();

            var siswaId = $(this).attr('action').split('/').pop(); // Ambil ID siswa dari form action

            $.ajax({
                url: '/siswa/' + siswaId,
                method: 'PUT',
                data: $(this).serialize(),
                success: function(response) {

                    let siswa = response.siswa; // Data siswa yang diperbarui
                    let row = $(`#siswaTable tr[data-id="${siswa.id}"]`);

                    // Perbarui data di tabel
                    row.find('td:nth-child(1)').text(siswa.nama);
                    row.find('td:nth-child(2)').text(siswa.nisn);
                    row.find('td:nth-child(3)').text(siswa.kelas.nama_kelas ||
                        'Tidak ada kelas');
                    row.find('td:nth-child(4)').text(siswa.jenis_kelamin === 'L' ?
                        'Laki-laki' : 'Perempuan');
                    row.find('td:nth-child(5)').text(siswa.tanggal_lahir);
                    row.find('td:nth-child(6)').text(siswa.tempat_lahir);
                    row.find('td:nth-child(7)').text(siswa.alamat);

                    // Tutup modal
                    $('#editSiswaModal').modal('hide');

                    setTimeout(function() {
                        alert(response
                            .success);
                    }, 300);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat memperbarui data siswa.');
                }
            });
        });

        // Fungsi untuk hapus siswa
        $('#siswaTable').on('click', '.deleteBtn', function() {
            var siswaId = $(this).data('id'); // Ambil ID siswa dari tombol
            var table = $('#siswaTable').DataTable(); // Ambil instance DataTable
            var row = $(this).closest('tr'); // Baris yang ingin dihapus

            if (confirm('Apakah Anda yakin ingin menghapus siswa ini?')) {
                $.ajax({
                    url: '/siswa/' + siswaId,
                    method: 'DELETE',
                    success: function(response) {
                        alert(response.success); // Tampilkan alert sukses
                        table.row(row).remove().draw(false); // Hapus baris dari DataTable
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Debug error
                        alert('Terjadi kesalahan saat menghapus siswa.');
                    }
                });
            }
        });

    });
</script>
{{-- kelas js --}}
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                    'content') // Mengambil CSRF token dari meta tag
            }
        });
        // Fungsi untuk menambahkan siswa
        $('#addKelasForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('kelas.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    // Ambil instance DataTable
                    var table = $('#kelasTable').DataTable();

                    // Tambahkan data baru ke DataTable
                    table.row.add([
                        response.kelas.nama_kelas,
                        response.kelas.tingkat,
                        response.kelas.deskripsi,
                        `<button class="btn btn-link btn-primary btn-lg editBtnKelas" data-id="${response.kelas.id}" data-toggle="tooltip" data-original-title="Edit">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-link btn-danger deleteBtnKelas" data-id="${response.kelas.id}" data-toggle="tooltip" data-original-title="Hapus">
                            <i class="fa fa-times"></i>
                        </button>`
                    ]).draw(false); // draw(false) agar tidak refresh tabel penuh

                    $('#tambahKelasModal').modal('hide'); // Tutup modal setelah sukses
                    setTimeout(function() {
                        alert(response.success); // Tampilkan alert sukses
                    }, 300);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Debug error
                    alert('Terjadi kesalahan saat menambahkan siswa.');
                }
            });
        });

        // Fungsi untuk edit siswa
        $('#kelasTable').on('click', '.editBtnKelas', function() {
            var kelasId = $(this).data('id');

            $.get('/kelas/' + kelasId + '/edit', function(data) {
                $('#editNamaKelas').val(data.nama_kelas);
                $('#editTingkat').val(data.tingkat);
                $('#editDeskripsi').val(data.deskripsi);
                $('#editKelasForm').attr('action', '/kelas/' + kelasId);
                $('#editKelasModal').modal('show');
            });
        });

        // Fungsi untuk update siswa
        $('#editKelasForm').on('submit', function(e) {
            e.preventDefault();

            var kelasId = $(this).attr('action').split('/').pop(); // Ambil ID siswa dari form action

            $.ajax({
                url: '/kelas/' + kelasId,
                method: 'PUT',
                data: $(this).serialize(),
                success: function(response) {

                    let kelas = response.kelas; // Data kelas yang diperbarui
                    let row = $(`#kelasTable tr[data-id="${kelas.id}"]`);

                    // Perbarui data di tabel
                    row.find('td:nth-child(1)').text(kelas.nama_kelas);
                    row.find('td:nth-child(2)').text(kelas.tingkat);
                    row.find('td:nth-child(3)').text(kelas.deskripsi);

                    // Tutup modal
                    $('#editKelasModal').modal('hide');

                    setTimeout(function() {
                        alert(response
                            .success);
                    }, 300);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat memperbarui data siswa.');
                }
            });
        });

        // Fungsi untuk hapus siswa
        $('#kelasTable').on('click', '.deleteBtnKelas', function() {
            var kelasId = $(this).data('id'); // Ambil ID siswa dari tombol
            var table = $('#kelasTable').DataTable(); // Ambil instance DataTable
            var row = $(this).closest('tr'); // Baris yang ingin dihapus

            if (confirm('Apakah Anda yakin ingin menghapus kelas ini?')) {
                $.ajax({
                    url: '/kelas/' + kelasId,
                    method: 'DELETE',
                    success: function(response) {
                        alert(response.success); // Tampilkan alert sukses
                        table.row(row).remove().draw(false); // Hapus baris dari DataTable
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Debug error
                        alert('Terjadi kesalahan saat menghapus siswa.');
                    }
                });
            }
        });

    });
</script>
{{-- guru js --}}
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                    'content') // Mengambil CSRF token dari meta tag
            }
        });
        // Fungsi untuk menambahkan siswa
        $('#addGuruForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('guru.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    // Ambil instance DataTable
                    var table = $('#guruTable').DataTable();

                    // Tambahkan data baru ke DataTable
                    table.row.add([
                        response.guru.nama,
                        response.guru.nip,
                        response.guru.email,
                        response.guru.no_hp,
                        response.guru.alamat,
                        `<button class="btn btn-link btn-primary btn-lg editBtnGuru" data-id="${response.guru.id}" data-toggle="tooltip" data-original-title="Edit">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-link btn-danger deleteBtnGuru" data-id="${response.guru.id}" data-toggle="tooltip" data-original-title="Hapus">
                            <i class="fa fa-times"></i>
                        </button>`
                    ]).draw(false); // draw(false) agar tidak refresh tabel penuh

                    $('#tambahGuruModal').modal('hide'); // Tutup modal setelah sukses
                    setTimeout(function() {
                        alert(response.success); // Tampilkan alert sukses
                    }, 300);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Debug error
                    alert('Terjadi kesalahan saat menambahkan siswa.');
                }
            });
        });

        // Fungsi untuk edit siswa
        $('#guruTable').on('click', '.editBtnGuru', function() {
            var guruId = $(this).data('id');

            $.get('/guru/' + guruId + '/edit', function(data) {
                $('#editNama').val(data.nama);
                $('#editNip').val(data.nip);
                $('#editEmail').val(data.email);
                $('#editNoHp').val(data.no_hp);
                $('#editAlamat').val(data.alamat);
                $('#editGuruForm').attr('action', '/guru/' + guruId);
                $('#editGuruModal').modal('show');
            });
        });

        // Fungsi untuk update siswa
        $('#editGuruForm').on('submit', function(e) {
            e.preventDefault();

            var guruId = $(this).attr('action').split('/').pop(); // Ambil ID siswa dari form action

            $.ajax({
                url: '/guru/' + guruId,
                method: 'PUT',
                data: $(this).serialize(),
                success: function(response) {

                    let guru = response.guru;
                    let row = $(`#guruTable tr[data-id="${guru.id}"]`);

                    // Perbarui data di tabel
                    row.find('td:nth-child(1)').text(guru.nama);
                    row.find('td:nth-child(2)').text(guru.nip);
                    row.find('td:nth-child(3)').text(guru.email);
                    row.find('td:nth-child(4)').text(guru.no_hp);
                    row.find('td:nth-child(5)').text(guru.alamat);

                    // Tutup modal
                    $('#editGuruModal').modal('hide');

                    setTimeout(function() {
                        alert(response
                            .success);
                    }, 300);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat memperbarui data guru.');
                }
            });
        });

        // Fungsi untuk hapus guru
        $('#guruTable').on('click', '.deleteBtnGuru', function() {
            var guruId = $(this).data('id'); // Ambil ID siswa dari tombol
            var table = $('#guruTable').DataTable(); // Ambil instance DataTable
            var row = $(this).closest('tr'); // Baris yang ingin dihapus

            if (confirm('Apakah Anda yakin ingin menghapus guru ini?')) {
                $.ajax({
                    url: '/guru/' + guruId,
                    method: 'DELETE',
                    success: function(response) {
                        alert(response.success); // Tampilkan alert sukses
                        table.row(row).remove().draw(false); // Hapus baris dari DataTable
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Debug error
                        alert('Terjadi kesalahan saat menghapus guru.');
                    }
                });
            }
        });

    });
</script>

{{-- mata pelajaran js --}}
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                    'content') // Mengambil CSRF token dari meta tag
            }
        });
        // Fungsi untuk menambahkan siswa
        $('#addMataPelajaranForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('pelajaran.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    // Ambil instance DataTable
                    var table = $('#mataPelajaranTable').DataTable();

                    // Tambahkan data baru ke DataTable
                    table.row.add([
                        response.mataPelajaran.nama,
                        response.mataPelajaran.deskripsi,
                        `<button class="btn btn-link btn-danger deleteBtnMataPelajaran" data-id="${response.mataPelajaran.id}" data-toggle="tooltip" data-original-title="Hapus">
                            <i class="fa fa-times"></i>
                        </button>`
                    ]).draw(false); // draw(false) agar tidak refresh tabel penuh

                    $('#tambahMataPelajaranModal').modal('hide'); // Tutup modal setelah sukses
                    setTimeout(function() {
                        alert(response.success); // Tampilkan alert sukses
                    }, 300);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Debug error
                    alert('Terjadi kesalahan saat menambahkan mata pelajaran.');
                }
            });
        });

        // Fungsi untuk hapus guru
        $('#mataPelajaranTable').on('click', '.deleteBtnMataPelajaran', function() {
            var mataPelajaranId = $(this).data('id'); // Ambil ID siswa dari tombol
            var table = $('#mataPelajaranTable').DataTable(); // Ambil instance DataTable
            var row = $(this).closest('tr'); // Baris yang ingin dihapus

            if (confirm('Apakah Anda yakin ingin menghapus mata pelajaran ini?')) {
                $.ajax({
                    url: '/pelajaran/' + mataPelajaranId,
                    method: 'DELETE',
                    success: function(response) {
                        alert(response.success); // Tampilkan alert sukses
                        table.row(row).remove().draw(false); // Hapus baris dari DataTable
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Debug error
                        alert('Terjadi kesalahan saat menghapus mata pelajaran.');
                    }
                });
            }
        });

    });
</script>

<script>
    $(document).on('click', '.editBtnGuruKelasMapel', function() {
    // Get data attributes from the clicked button
    var id = $(this).data('id');
    var guruId = $(this).data('guru');
    var kelasId = $(this).data('kelas');
    var mapelId = $(this).data('mapel');
    
    // Set the form action for the edit form
    var actionUrl = '{{ route('guru_kelas_mapel.update', ':id') }}'.replace(':id', id);
    $('#editGuruKelasMapelForm').attr('action', actionUrl);

    // Set the values of the select fields
    $('#editGuru_id').val(guruId);
    $('#editKelas_id').val(kelasId);
    $('#editMataPelajaran_id').val(mapelId);
});

</script>
<script>
    $('#deleteGuruKelasMapelModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Tombol yang diklik
        var id = button.data('id') // Ambil data-id dari tombol
        var action = $('#deleteGuruKelasMapelForm').attr('action');
        var newAction = action.replace(':id', id); // Ganti :id dengan ID yang sesuai
        $('#deleteGuruKelasMapelForm').attr('action', newAction); // Perbarui action form dengan ID yang benar
    });
</script>
