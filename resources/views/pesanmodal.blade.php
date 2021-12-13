@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="text-align: center">Menu Gartenhutte</h2>
        <div class="row justify-content-center">
            @foreach ($menus as $menu)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $menu->photo }}" class="card-img-top" alt="" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->nama }}</h5>
                            <p class="card-text">{{ $menu->deskripsi }}</p>
                            <p class="card-text">
                                <strong> Harga Rp.{{ number_format($menu->harga) }}</strong>
                            </p>
                            <button style="float: right; margin:5px 5px 0px 0px;" class="btn btn-primary" data-toggle="modal"
                                data-target="#myModal">Tambah</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pesanan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-md-6">
                        <h4> {{ $menu->nama }}</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($menu->harga) }}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td>{{ $menu->deskripsi }}</td>
                                </tr>

                                <tr>
                                    <td>Jumlah </td>
                                    <td>:</td>
                                    <td>
                                        <form method="post" action="{{ url('order') }}/{{ $menu->id }}">
                                            @csrf
                                            <input type="number" min="1" name="jumlah_pesanan" class="form-control"
                                                required>
                                            <button type="submit" class="btn btn-success mt-3">Pesan</button>
                                    </td>
                                </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    {{-- <button type="submit" class="btn btn-primary">Pesan</button> --}}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection