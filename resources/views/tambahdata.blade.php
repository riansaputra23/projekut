@extends('layouts.main')

@section('contents')


<div class="col-md-8">
    <form method="POST" action="/dashboard/gaji">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
            @error('nama')
                {{ $message }}
            @enderror

        </div>
        <div class="mb-3">
          <label for="umur" class="form-label">Umur</label>
          <input type="text" class="form-control" id="umur" name="umur">
        </div>
        <div class="mb-3">
            <label for="gaji" class="form-label">Gaji</label>
            <input type="text" class="form-control" id="gaji" name="gaji">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



@endsection