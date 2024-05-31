@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                      </button>

                      

                    
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penerbit</th>
                                <th>Pengembang</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Rilis</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($games as $game)
                            <tr>
                                <td>{{ $game->judul}}</td>
                                <td>{{ $game->penerbit}}</td>
                                <td>{{ $game->pengembang}}</td>
                                <td>{{ $game->deskripsi}}</td>
                                <td>{{ $game->tanggal_rilis}}</td>
                                <td>
                                    <form onsubmit="return confirm('Are you sure ?');" action="/home/{{ $game->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger float-right">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Data Tidak Ada</td>
                        @endforelse
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Judul</th>
                                <th>Penerbit</th>
                                <th>Pengembang</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Rilis</th>
                                <th>Opsi</th>                            </tr>
                        </tfoot>
                    </table>
                

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambahkan Game</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/home/store" method="POST">
                @csrf
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" id="judul" name="judul" aria-describedby="judulhelp" placeholder="Enter judul">
                  <small id="judulhelp" class="form-text text-muted">Masukkan judul game yang sesuai</small>
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" aria-describedby="penerbithelp" placeholder="Enter penerbit">
                    <small id="penerbithelp" class="form-text text-muted">Masukkan penerbit yang sesuai</small>
                  </div>
                <div class="form-group">
                    <label for="pengembang">Pengembang</label>
                    <input type="text" class="form-control" id="pengembang" name="pengembang" aria-describedby="pengembanghelp" placeholder="Enter pengembang">
                    <small id="pengembanghelp" class="form-text text-muted">Masukkan pengembang yang sesuai</small>
                  </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                  </div>
                <div class="form-group">
                    <label for="tanggal_rilis">Tanggal Rilis</label>
                    <input type="text" class="form-control" id="tanggal_rilis" name="tanggal_rilis" aria-describedby="tanggalhelp" placeholder="Enter tanggal rilis">
                    <small id="tanggalhelp" class="form-text text-muted">Masukkan yang sesuai</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
              </form>
        </div>
      </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
<script>
    let table = new DataTable('#example');
</script>
<script>$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })
</script>
@endsection
