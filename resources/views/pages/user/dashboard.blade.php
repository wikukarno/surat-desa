@extends('layouts.app')

@section('title')
    Dashboard {{ Auth::user()->name }}
@endsection

@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-store"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Surat Keterangan Usaha</span>
                <span class="info-box-number">
                  {{ $skuUser }}
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-procedures"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Surat Keterangan Pemakaman</span>
                <span class="info-box-number">
                  {{-- {{ $skpUser }} --}}
                  0
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Surat Keterangan Tidak Mampu</span>
                <span class="info-box-number">
                  {{-- {{ $sktmUser }} --}}
                  0
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>

    </section>
@endsection