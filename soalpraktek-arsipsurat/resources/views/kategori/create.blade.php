@extends('layouts.app')

@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')

@section('contents')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <form method="post" enctype="multipart/form-data" id="profile_setup_frm" action="{{ route('kategori.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h1 class="card-title"><b>Kategori Surat >> Tambah</b></h1>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Nama Kategori</label>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="text" id="inputName" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Keterangan</label>
                                    @error('keterangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea id="inputDescription" name="keterangan" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('kategori') }}" class="btn btn-secondary">Batal</a>
                        <input type="submit" value="Simpan" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection
