@extends('layouts.app')

@section('title')
    Surat Keterangan Usaha
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Surat Keterangan Usaha</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tb_sku" class="table table-hover scroll-horizontal-vertical w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Nama Usaha</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Posisi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('pages.staff.sku.modal-tolak-sku')
    @include('pages.staff.sku.modal-lampiran-sku')
@endsection

@push('addon-script')
    <script>
        $('#tb_sku').DataTable({
            processing: true,
            serverSide: true,
            ordering: [[1, 'asc']],
            ajax: {
                url: "{{ route('sku-staff.index') }}",
            },
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'nama', name: 'nama' },
                { data: 'nama_usaha', name: 'nama_usaha' },
                { data: 'created_at', name: 'created_at' },
                { data: 'posisi', name: 'posisi' },
                { data: 'status', name: 'status',},
                { 
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false 
                },
            ],

        });

        function selesaiProses(id){
            Swal.fire({
                title: 'Surat Selesai Diproses!',
                text: "Surat Keterangan Usaha anda telah selesai diproses, silahkan ambil surat anda di kantor desa",
                icon: 'success',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oke'
            });
        }

        function tolakSKU(id){
            $('#tolakSkuModal').modal('show');
            $('#id-sku').val(id);
        }

        $('#form-tolak-sku').submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ url('pages/dashboard/staff/sku/tolak-sku') }}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#tolakSkuModal').modal('hide');
                    $('#tb_sku').DataTable().ajax.reload();
                    Swal.fire({
                        title: 'Surat Berhasil Ditolak!',
                        text: "Surat Keterangan Usaha telah ditolak",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oke'
                    })
                }
            });
        });

        function lampiranSku(id){
            $('#lampiranSkuModal').modal('show');

            $.ajax({
                type:'POST',
                url: "{{ url('pages/dashboard/staff/sku/get-lampiran') }}",
                data: {
                    id:id,
                    _token: '{{csrf_token()}}'
                },
                success: (data) => {
                    $('#ktp').attr('src', '{{ asset('storage') }}/'+data.foto_ktp);
                    $('#kk').attr('src', '{{ asset('storage') }}/'+data.foto_kk);
                    $('#skt_rt_rw').attr('src', '{{ asset('storage') }}/'+data.foto_surat_rt_rw);
                }
            });
        }
    </script>
@endpush