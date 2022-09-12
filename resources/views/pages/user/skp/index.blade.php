@extends('layouts.app')

@section('title')
    Surat Keterangan Pemakaman
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title d-flex align-items-center">
                                <h3 class="card-title">Data Surat Keterangan Pemakaman</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <figure class="figure">
                                <img src="{{ asset('assets/images/maintenance.svg') }}" class="img-fluid w-100 h-100" alt="">
                                <figcaption class="figure-caption text-center">
                                    <h5 class="text-white">Mohon maaf, fitur ini sedang dalam pembuatan.</h5>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection