@extends('layouts.app')

@section('title')
Data Laporan
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Laporan</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tb_laporan" class="table table-hover scroll-horizontal-vertical w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Jenis Surat</th>
                                        <th>Tanggal Diajukan</th>
                                        <th>Tanggal Disetujui</th>
                                        <th>Nomor HP</th>
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
@endsection

@push('addon-script')
<script>
    $('#tb_laporan').DataTable({
            processing: true,
            serverSide: true,
            ordering: [[1, 'asc']],
            ajax: {
                url: "{{ route('lurah.data-penduduk.index') }}",
            },
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'foto_profile', name: 'foto_profile' },
                { data: 'email', name: 'email' },
                { data: 'name', name: 'name' },
                { data: 'no_telephone', name: 'no_telephone' },
                { data: 'alamat', name: 'alamat' },
            ],

        });
</script>
@endpush