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
                                <h1 class="card-title"><b>Arsip Surat >> Unggah</b></h1>
                            </div>
                            <div class="card-body">
                                    <label>Nomor Surat :</label>
                                    @error('nomorsurat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input id="nomorsurat" name="nomorsurat" class="form-control" />
                                    {{-- <br>
                                    <div class="nomor_surat">
                                        @error('thn')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="number" id="thn" name="thn" placeholder="Tahun" class="form-control col-md-3" min="1900" max="{{ date('Y') }}" required>
                                        @error('kode')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" class="form-control col-md-3" id="kode" name="kode" placeholder="Kode Surat"/>
                                        @error('number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="number" class="form-control col-md-3" id="number" name="number"
                                            placeholder="Nomor" />
                                    </div> --}}
                                <div class="form-group">
                                    <label for="inputName">Kategori :</label>
                                    @error('kategoris_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <select id="kategoris_id" name="kategoris_id" class="form-control">
                                        <option selected disabled>Pilih Kategori</option>
                                        @foreach ($kategori as $sw)
                                            <option value="{{ $sw->id }}">{{ $sw->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Judul :</label>
                                    @error('judul')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input id="judul" name="judul" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal :</label>
                                    @error('waktupengarsipan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input type="datetime-local" name="waktupengarsipan"
                                            class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                        <div class="input-group-append" data-target="#reservationdatetime"
                                            data-toggle="datetimepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>File Surat (PDF) :</label>
                                    @error('filesurat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="file" name="filesurat" class="form-control">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('kategori') }}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Tambah Kategori Baru" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection
