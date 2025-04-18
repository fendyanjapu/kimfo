@extends('layouts.template')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <div class="herocontent">
        <div class="row justify-content-center">
            <div class="col-md-8 shadow-xl bg-white rounded">
                <h3>Presensi Masuk</h3>
                <form class="px-5 py-5" action="{{ route('presensi.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row mt-3">
                        <div class="col-sm-8">
                            <div id="my_camera"></div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="dinas_luar" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Dinas Luar
                                </label>
                              </div>
                              <br>
                            <input type=button value="Take Picture" onClick="take_snapshot()">

                            <input type="hidden" name="image" class="image-tag">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-md-8">

                            <div id="results">Your captured image will appear here...</div>

                        </div>
                    </div>

                    <div class="col-sm-offset-4 mt-4 text-center">
                        <button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i>
                            Simpan</button>
                        <a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script language="JavaScript">

        Webcam.set({

            width: 240,
			height: 320,

            image_format: 'jpeg',

            jpeg_quality: 90

        });



        Webcam.attach('#my_camera');



        function take_snapshot() {

            Webcam.snap(function (data_uri) {

                $(".image-tag").val(data_uri);

                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                document.getElementById('garmbar').value = data_uri;

            });

        }

    </script>

@endsection