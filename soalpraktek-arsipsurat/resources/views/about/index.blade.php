@extends('layouts.app')

@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')

@section('contents')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('AdminLTE-3.2.0/dist/img/2131740037.jpg') }}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">Nailul Maqsudi</h3>

                                <p class="text-muted text-center">Teknologi Informasi</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>NIM :</b> <p class="float-right">2131740037</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Kelas :</b> <p class="float-right">3A</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Absen :</b> <p class="float-right">15</p>
                                    </li>
                                </ul>

                                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
