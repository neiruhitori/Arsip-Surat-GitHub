@extends('layouts.app')

@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')

@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Kategori Surat</b></h1>
                    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat. <br>
                        Klik tombol "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
            <div class="col-md-7 mt-2 mb-3 float-sm-right">
                <form action="/kategori" method="GET">
                    <div class="input-group">
                        <div class="" data-mdb-input-init>
                            <input type="search" name="search" id="search" class="form-control"
                                placeholder="Search Nama Kategori" />
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
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- @if ($kategori->count() > 0) --}}
                            @forelse ($kategori as $p)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->keterangan }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('kategori.edit', $p->id) }}" type="button"
                                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('kategori.destroy', $p->id) }}" method="POST"
                                                type="button" class="btn btn-danger p-0"
                                                onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0"><i class="fas fa-trash"></i></button>
                                            </form>
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
                <div class="mb-3 float-sm-left col-2">
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary float-sm-right"><i class="fas fa-plus"></i>Tambah Kategori Baru</a>
                </div>
            </div>

        <!-- /.content -->
    </div>
@endsection
