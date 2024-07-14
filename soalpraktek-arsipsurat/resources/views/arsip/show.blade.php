<head>
    <style>
        .nomor_surat {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .nomor_surat label {
            width: 100px;
            /* Sesuaikan dengan kebutuhan */
            margin-right: 10px;
        }

        .nomor_surat input {
            flex: 2;
        }

        .nomor_surat button {
            margin-left: 110px;
            /* Sesuaikan dengan lebar label */
        }
    </style>
</head>
@extends('layouts.app')

@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')

@section('contents')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <form method="post" enctype="multipart/form-data" id="profile_setup_frm" action="{{ route('arsip.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h1 class="card-title"><b>Arsip Surat >> Lihat</b></h1>
                            </div>
                            <div class="card-body">
                                <label>Nomor Surat : {{ $arsip->nomorsurat }}</label><br>
                                <label for="inputName">Kategori : {{ $arsip->kategoris->name }}</label><br>
                                <label for="inputDescription">Judul : {{ $arsip->judul }}</label><br>
                                <label>Tanggal : {{ $arsip->waktupengarsipan }}</label><br>
                                <label>File Surat (PDF) :</label><br>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <iframe src="{{ asset('storage/' . $arsip->filesurat) }}" type="application/pdf" width="100%"
                    height="500px"></iframe>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('arsip') }}" class="btn btn-secondary">Cancel</a>
                        <a href="{{ route('arsip.unduh', $arsip->id) }}" class="btn btn-danger">Unduh</a>
                        <a href="{{ route('arsip.edit', $arsip->id) }}" class="btn btn-warning">Edit/Ganti File</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection
