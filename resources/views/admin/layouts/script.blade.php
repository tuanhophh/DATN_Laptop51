s
<!-- jQuery -->
<script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ 'http://localhost:8000/tuanhophh/app' . '/public/adminlte/' }}plugins/jquery-ui/jquery-ui.min.js">
</script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('ckeditor') }}/ckeditor.js"></script>
<!-- ChartJS -->
<script src="{{ asset('adminlte') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('adminlte') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('adminlte') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('adminlte') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminlte') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminlte') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('adminlte') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminlte') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('adminlte') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('adminlte')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminlte')}}/dist/js/pages/dashboard.js"></script> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

{{-- Tổng doanh thu --}}
<script>
    var datacot = {
        labels: [`Số tiền nhập (${$('#sotiennhap').val()})`, `Số tiền lãi (${$('#sotienlai').val()})`],
        datasets: [{
            label: 'Tổng doanh thu',
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
            ],
            data: [$('#sotiennhap').val(), $('#sotienlai').val()],
        }]
    };

    var config = {
        type: 'pie',
        data: datacot,
        options: {}
    };
    var doanhthuchart = new Chart(
        document.getElementById('doanhthuchart'),
        config
    );
</script>
<script>
    var datasuachua = {
        labels: [`Số tiền nhập (${$('#sotiennhapsuachua').val()})`,
            `Số tiền lãi (${$('#sotienlaisuachua').val()})`
        ],
        datasets: [{
            label: 'Tổng doanh thu',
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
            ],
            data: [$('#sotiennhapsuachua').val(), $('#sotienlaisuachua').val()],
        }]
    }
    var configsuachua = {
        type: 'pie',
        data: datasuachua,
        options: {}
    };
    var doanhthusuachua = new Chart(
        document.getElementById('doanhthusuachua'),
        configsuachua
    );
</script>
<script>
    var databan = {
        labels: [`Số tiền nhập (${$('#sotiennhapban').val()})`,
            `Số tiền lãi (${$('#sotienlaiban').val()})`
        ],
        datasets: [{
            label: 'Tổng doanh thu',
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
            ],
            data: [$('#sotiennhapban').val(), $('#sotienlaiban').val()],
        }]
    }
    var configban = {
        type: 'pie',
        data: databan,
        options: {}
    };
    var doanhthuban = new Chart(
        document.getElementById('doanhthuban'),
        configban
    );
</script>
<script>
    $(function() {
        $('#search_date').click(() => {
            var timestart = $('#datetimestart').val()
            var timeend = $('#datetimeend').val()
            //ajax widget
            $.ajax({
                url: 'http://127.0.0.1:8000/api/laydulieutheongay?timestart=' + timestart +
                    '&timeend=' + timeend + '',
                type: 'POST',
                dataType: 'json',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            }).done(function(ketqua) {
                $('#total_category').text(ketqua.total_category)
                $('#total_huy').text(ketqua.total_huy)
                $('#total_product').text(ketqua.total_product)
                $('#total_order').text(ketqua.total_bill)
                $('#total_user').text(ketqua.total_user)
              
                if (ketqua.datasanphamban.length != 0) {
                    $("#listtopdata").empty()
                    ketqua.datasanphamban.forEach(function callback(value, index) {
                        $("#listtopdata").append(
                            ` <li class="list-group-item d-flex justify-content-between align-items-center">
                                    ${value[index]['name']}<span class="badge badge-primary badge-pill">${value[index]['quaty']}</span></li>`
                        );
                    })
                } else {
                    $("#listtopdata").empty()
                }
                if (ketqua.datanhanvien.length != 0) {
                    $("#listtopdatanhanvien").empty()
                    ketqua.datanhanvien.forEach(function callback(value, index) {
                        $("#listtopdatanhanvien").append(
                            ` <li class="list-group-item d-flex justify-content-between align-items-center">
                                    ${value[index]['name']}<span class="badge badge-primary badge-pill">${value[index]['quaty']}</span></li>`
                        );
                    })
                } else {
                    $("#listtopdatanhanvien").empty()
                }
            });
            //ajax chartjs doanh thu
            $.ajax({
                url: 'http://127.0.0.1:8000/api/bieudo',
                type: 'POST',
                dataType: 'json',
                data: {
                    timestart: timestart,
                    timeend: timeend
                },
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            }).done(function(ketqua) {
                $('#tongdoanhthu').text(ketqua.doanhthutong)

                datacot.datasets[0].data = [ketqua.sotiennhap, ketqua.sotienlai]
                datacot.labels = [`Số tiền nhập (${ketqua.sotiennhap})`,
                    `Số tiền lãi (${ketqua.sotienlai})`
                ]
                doanhthuchart.update()
            });
            //ajax sửa chữa
            $.ajax({
                url: 'http://127.0.0.1:8000/api/bieudosuachua',
                type: 'POST',
                dataType: 'json',
                data: {
                    timestart: timestart,
                    timeend: timeend
                },
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            }).done(function(ketqua) {
                $('#tongdoanhthusuachua').text(ketqua.doanhthutong)

                datasuachua.datasets[0].data = [ketqua.sotiennhap, ketqua.sotienlai]
                datasuachua.labels = [`Số tiền nhập (${ketqua.sotiennhap})`,
                    `Số tiền lãi (${ketqua.sotienlai})`
                ]
                doanhthusuachua.update()
            });
            //ajax bán
            $.ajax({
                url: 'http://127.0.0.1:8000/api/bieudoban',
                type: 'POST',
                dataType: 'json',
                data: {
                    timestart: timestart,
                    timeend: timeend
                },
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            }).done(function(ketqua) {
                $('#doanhthutongban').text(ketqua.doanhthutong)

                databan.datasets[0].data = [ketqua.sotiennhap, ketqua.sotienlai]
                databan.labels = [`Số tiền nhập (${ketqua.sotiennhap})`,
                    `Số tiền lãi (${ketqua.sotienlai})`
                ]
                doanhthuban.update()
            });
        })
    })
</script>
<script>
$(".js-select2").select2({
    'placeholder': 'Chọn vai trò'
});
</script>
