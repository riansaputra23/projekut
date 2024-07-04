@extends('layouts.main')

@section('contents')

<div class="card shadow mb-4" style="margin: 10px;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Gaji karyawan</h6>
    </div>
        <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Gaji</th>
                        <th scope="col" style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gaji as $gajis)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gajis->nama }}</td>
                        <td>{{ $gajis->umur}}</td>
                        <td>{{ $gajis->gaji}}</td>
                        <td>
                            <a href="/dashboard/gaji/{{ $gajis->id }}/edit"class="badge bg-warning p-2 m-1"><i class="bi bi-pencil-square m-1"></i></a>
                    
                            <form action="/dashboard/gaji/{{ $gajis->id }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="badge bg-danger border-0 p-2" onclick="return confirm('Apakah Benar Dihapus?')"><i class="bi bi-trash-fill m-1"></i></button>
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/dashboard/gaji/create"><button type="button" class="btn btn-primary">Tambah Data</button></a>
        </div>
        </div>
    </div>


@endsection