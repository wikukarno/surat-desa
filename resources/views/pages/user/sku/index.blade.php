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
                            <div class="header-title d-flex align-items-center">
                                <h3 class="card-title">Data Surat Keterangan Usaha</h3>
                                <a href="javascript:void(0)" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#skuModal"> <i class="fas fa-plus"></i>&nbsp; Tambah Surat</a>
                            </div>
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
    @include('pages.user.sku.modal-tambah-sku')
@endsection

@push('addon-script')
    <script>
        $('#tb_sku').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'nama', name: 'nama' },
                { data: 'nama_usaha', name: 'nama_usaha' },
                { data: 'created_at', name: 'created_at' },
                { data: 'posisi', name: 'posisi' },
                { 
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false 
                },
            ],

        });
    </script>
@endpush