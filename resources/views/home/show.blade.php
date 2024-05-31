@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">

                <!-- Data Tabel -->
                    <form action="/home/{{ $show->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $show->judul }}" >
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $show->penerbit }}" >
                        </div>
                        <div class="form-group">
                            <label for="pengembang">Pengembang</label>
                            <input type="text" class="form-control" id="pengembang" value="{{ $show->pengembang }}" >
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" >{{ $show->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_rilis">Tanggal Rilis</label>
                            <input type="text" class="form-control" id="tanggal_rilis" value="{{ $show->tanggal_rilis }}" >
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id='submit' class="btn btn-primary" >Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection