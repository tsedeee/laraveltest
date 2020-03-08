@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="show"></div>
            <div class="card">

                <form id="form" action="{{ route('album.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label> Зургийн цомгийн нэр</label>
                        <input type="text" name="album" class="form-control">
                    </div>

                {{--<div class="card-header">Album</div>--}}
                <div class="card-body">
                    <div class="input-group control-group initial-add-more">
                        <input type="file" name="image[]" class="form-control" id="image">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-add-more" type="button">Нэмэх</button>
                        </div>
                    </div>

                    <div class="copy" style="display: none;">
                        <div class="input-group control-group add-more">
                            <input type="file" name="image[]" class="form-control" id="image">
                            <div class="input-group-btn">
                                <button class="btn btn-danger remove" type="button">Устгах</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Хадгалах</button>
                    </div>
                </form>
                     {{-- <form action="{{route('album.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="text" name="album" class="form-control" placeholder="Зургийн цомгийн нэрийг оруулна уу?">
                        <br>

                        <input type="file" name="image[]" class="form-control">
                        <input type="file" name="image[]" class="form-control">
                        <input type="file" name="image[]" class="form-control">
                        <button type="submit" class="btn btn-primary">Хадгалах</button>
                    </form>
                    <br>
                    <br>
                    @foreach ($images as $image)
                        <img src="{{ asset('storage/'.$image->name) }}" class="img-thumbnail">
                    @endforeach  --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function(e){
        $(".btn-add-more").click(function(){
            //alert("Ok");
            var html = $(".copy").html();
            $(".initial-add-more").after(html);
        })

        $("body").on("click", ".remove", function(){
            $(this).parents(".control-group").remove();
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#form").on('submit', (function(e){
            e.preventDefault();
            $.ajax({
                url: "/album",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    $('.show').html(response);
                    $("#form")[0].reset();
                },
                error: function(res){
                    alert("Алдаа гарлаа, зургийг серверт байршуулж чадсангүй.");
                }
            })
        }))
    })
</script>
