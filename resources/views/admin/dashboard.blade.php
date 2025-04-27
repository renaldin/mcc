@extends('Layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Small boxes (Stat box) -->
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h1>Poin tangki sesuai standart</h1>
                </div>
                <a href="#" class="small-box-footer">Informasi lengkap <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h1>Poin tangki tidak sesuai standart</h1>
                </div>
                <a href="#" class="small-box-footer">Informasi lengkap<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection