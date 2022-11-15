@extends('base')
@section('title','Edit Pengguna Utama')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-1">
                    <div class="bg-gradient-primary d-flex justify-content-center align-items-center shadow-primary border-radius-lg pt-3 pb-2">
                        <h3 class="text-white text-capitalize ps-3">Edit Pengguna Utama</h3>
                    </div>
                    @if($errors -> any())
                        {!! implode('',$errors -> all('
                        <div class="alert alert-danger text-white">
                            :message
                        </div>')) !!}
                    @endif
                </div>
                <div class="card-body p-3 px-3">
                    <form action="{{route('admin.people.updatePenggunaUtama', $people->uuid)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row my-5">
                            <div class="col-2 align-middle">
                                <div class="d-flex justify-content-center">
                                    <img style="margin:auto; object-fit:cover; width: 150px !important; height: 150px !important;" id="img" src="{{ asset('storage/'.$people->foto_profil) }}" alt="your image" class="rounded-circle">
                                </div>
                                <br><input type="file" name="foto_profil" id="upload" onchange='readURL(this.value)'/>
                            </div>
                            <div class="col-5">
                                <div class="row g-3 justify-content-center">
                                    {{-- baris --}}
                                    <div class="col-4">
                                        <label for="inputPassword6" class="col-form-label">Status</label>
                                    </div>
                                    <div class="col-7">
                                        <select name="status" class="form-select">
                                            <option value="Pengguna Utama">Pengguna Utama</option>
                                        </select>
                                    </div>
                                    {{-- end baris --}}
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Nama</label>
                                    </div>
                                    <div class="col-7">
                                        <input value="{{$people->nama}}" type="text" name="nama" class="form-control px-1 border">
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-7">
                                        <select autocomplete="off" name="jenis_kelamin" class="form-select">
                                            <option value="1" {{$people->jenis_kelamin == 1 ? ' selected ' : ''}}>Laki-Laki</option>
                                            <option value="0" {{$people->jenis_kelamin == 0 ? ' selected ' : ''}}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Tanggal Lahir</label>
                                    </div>
                                    <div class="col-7">
                                        <input value="{{$people->tanggal_lahir}}" type="date" name="tanggal_lahir" class="form-control border">
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Tahun Lahir</label>
                                    </div>
                                    <div class="col-7">
                                        <input value="{{$people->tahun_lahir}}" type="text" name="tahun_lahir" class="form-control px-1 border">
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Tanggal Wafat</label>
                                    </div>
                                    <div class="col-7">
                                        <input value="{{$people->tanggal_wafat}}" type="date" name="tanggal_wafat" class="form-control border">
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Tahun Wafat</label>
                                    </div>
                                    <div class="col-7">
                                        <input value="{{$people->tahun_wafat}}" type="text" name="tahun_wafat" class="form-control px-1 border">
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Tanggal Pernikahan</label>
                                    </div>
                                    <div class="col-7">
                                        <input value="{{$people->tanggal_pernikahan}}" type="date" name="tanggal_pernikahan" class="form-control border">
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="row g-3 justify-content-center">
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Pekerjaan</label>
                                    </div>
                                    <div class="col-7">
                                        <input value="{{$people->pekerjaan}}" type="text" name="pekerjaan" class="form-control px-1 border">
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Telepon</label>
                                    </div>
                                    <div class="col-7">
                                        <input value="{{$people->telepon}}" type="text" name="telepon" class="form-control px-1 border">
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Username</label>
                                    </div>
                                    <div class="col-7">
                                        <input autocomplete="off" value="{{$user->username}}" type="text" name="username" class="form-control px-1 border">
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Password</label>
                                    </div>
                                    <div class="col-7 g-3 align-items-center">
                                        <div class="form-group">
                                            <div class="input-group border" id="show_hide_password">
                                                <input value="" class="form-control px-1 border" type="password">
                                                <div class="input-group-addon pt-2">
                                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Nama Ayah</label>
                                    </div>
                                    <div class="col-7">
                                        <input value="{{$people->nama_ayah}}" type="text" name="nama_ayah" class="form-control px-1 border">
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Nama Ibu</label>
                                    </div>
                                    <div class="col-7">
                                        <input value="{{$people->nama_ibu}}" type="text" name="nama_ibu" class="form-control px-1 border">
                                    </div>
                                    <div class="col-4">
                                        <label for="input" class="col-form-label">Alamat</label>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-floating border">
                                            <textarea class="form-control px-1" name="alamat" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px !important; padding-top: 5px !important;">{{$people->alamat}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <div class="d-flex align-items-center my-2 me-4">
                                        <input type="checkbox" {{$user->status_aktivasi == 1 ? ' checked ' : ''}} id="aktivasi" name="status_aktivasi" value="1" class="form-check border me-2">
                                        <label for="aktivasi" class="col-form-label me-1">Aktivasi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-lg bg-gradient-dark mt-2 me-4">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });
        $(function(){
            $('#upload').change(function(){
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                    $('#img').attr('src', e.target.result);
                    }
                reader.readAsDataURL(input.files[0]);
                }
                else
                {
                $('#img').attr('src', '/assets/no_preview.png');
                }
            });
        });
    </script>
@endpush
