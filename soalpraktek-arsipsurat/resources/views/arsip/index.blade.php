@extends('layouts.app')

@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')

@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Arsip Surat</b></h1>
                    <p>Berikut adalah surat-surat yang telah terbit dan diarsipkan <br>
                        Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="col-md-7 mt-2 mb-3 float-sm-right">
                <form action="/arsip" method="GET">
                    <div class="input-group">
                        <div class="" data-mdb-input-init>
                            <input type="search" name="search" id="form1" class="form-control"
                                placeholder="Search Judul Surat" />
                        </div>
                        <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-7 mt-2 float-sm-right">
                @if (Session::has('success'))
                    <div class="btn btn-success swalDefaultSuccess" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="btn btn-danger swalDefaultSuccess" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Waktu Pengarsipan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- @if ($arsip->count() > 0) --}}
                            @forelse ($arsip as $p)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $p->nomorsurat }}</td>
                                    <td>{{ optional($p->kategoris)->name }}</td>
                                    <td>{{ $p->judul }}</td>
                                    <td>{{ $p->waktupengarsipan }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <form action="{{ route('arsip.destroy', $p->id) }}" method="POST"
                                                type="button" class="btn btn-danger p-0"
                                                onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0"><i class="fas fa-trash"></i></button>
                                            </form>
                                            <a href="{{ route('arsip.download', $p->id) }}" type="button"
                                                class="btn btn-warning"><i class="fas fa-cloud-download-alt"></i></a>
                                            <a href="{{ route('arsip.show', $p->id) }}" type="button"
                                                class="btn btn-secondary"><i class="far fa-arrow-alt-circle-right"></i></a>
                                        </div>

                                    </td>
                                </tr>

                            @empty
                                <div class="alert alert-danger">
                                    Data Kategori Repositori belum Tersedia.
                                </div>
                            @endforelse
                        {{-- @endif --}}
                    </tbody>
                </table>
            </div>
            <div class="content-header">
                <div class="mb-3 float-sm-left">
                    <a href="{{ route('arsip.create') }}" class="btn btn-primary float-sm-left col-12"><i
                            class="fas fa-plus"></i>Arsipkan
                        Surat</a>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
