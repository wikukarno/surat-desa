@extends('layouts.app')

@section('title')
    Profile {{ Auth::user()->name }}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title d-flex align-items-center">
                                <h3 class="card-title">Menu Profile</h3>
                                <a href="javascript:void(0)" class="btn btn-primary ml-auto" onclick="ubahProfile({{ Auth::user()->id }})">Ubah Profile</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card card-primary">
                                <div class="card-body">
                                        <form action="{{ route('staff.ubah-foto') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                            <div class="text-center thumbnail-image" onclick="updateImage()">
                                                @if (Auth::user()->foto_profile != null)
                                                
                                                <img src="{{ Storage::url(Auth::user()->foto_profile) }}" class="figure-img img-fluid rounded-circle" alt="foto profile" id="foto-profile" style="max-height: 100px; background-size: cover" />

                                                <input type="file" name="foto_profile" id="update-image-staff" style="display: none" onchange="form.submit()">

                                                @else

                                                <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset('assets/images/user.png') }}"
                                                alt="User profile picture">
                                                <input type="file" name="foto_profile" id="update-image-staff" style="display: none" onchange="form.submit()">

                                                @endif
                                            </div>
                                        </form>
                                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                                        <p class="text-center">{{ Auth::user()->roles }} Desa Sorek</p>
                                    <div class="table-profile">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>{{ Auth::user()->name ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{ Auth::user()->email ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor HP</td>
                                                    <td>{{ Auth::user()->no_telephone ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>{{ Auth::user()->alamat ?? '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('pages.staff.modal-ubah-profile')
@endsection

@push('addon-script')
    <script>

        function updateImage() {
            document.getElementById('update-image-staff').click();
        }

        function ubahProfile(id){
            $('#ubahProfileModal').modal('show');
            $.ajax({
                url: "{{ route('staff.get-akun') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data){
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#no_telephone').val(data.no_telephone);
                    $('#alamat').val(data.alamat);
                }
            });
        }

        $('#form-ubah-profile-staff').submit(function(e){
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                url: "{{ route('staff.update-akun') }}",
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    $('#ubahProfileModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil diubah',
                    }).then((result) => {
                        location.reload();
                    });
                },
            });
            return false;
        });
    </script>
@endpush

@push('addon-style')
    <style>
        .thumbnail-image{
            cursor: pointer;
        }
    </style>
@endpush