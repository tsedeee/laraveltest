@extends('layouts.app')

@section('content')

    @include('images.addImageAlbum')

    @if(Session::has('Message'))
        <div class="alert alert-success">{{ Session::get('Message') }}</div>
    @endif
    <h1>{{ $albums->name }}({{ $albums->images->count() }} - зураг байна.)</h1>
    <div class="row">
        @foreach ($albums->images as $album)
            <div class="col-sm-4">
                <div class="item">

                    <img src="{{ asset('storage/'.$album->name) }}" class="img-thumbnail" style="width:300px">

                    {{-- <form action="{{ route('album.destroy', [$album->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Зургийг устгах</button>
                    </form> --}}

                    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
    Устгах
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Зургийг устгах</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Та энэхүү зургийг устгахыг хүсч байна уу?
        </div>
        <div class="modal-footer">
            <form action="{{ route('album.destroy', [$album->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Зургийг устгах</button>
            </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Болих</button>
        </div>
      </div>
    </div>
  </div>

                </div>
            </div>
        @endforeach
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

{{--<script type="text/javascript">

    $(document).ready(function(){
        $("#form").on('submit', (function(e){
            e.preventDefault();
            $.ajax({
                url: "/album/create",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    $('.show').html(response);
                    $("#form")[0].reset();
                    $("#errMsg").empty();
                },
                error: function(data){
                    //console.log(data.responseJSON);
                    var error = data.responseJSON;
                    $("#errMsg").empty();
                    $.each(error.errors, function(key, value){
                        $("#errMsg").append('<p class="text-center text-danger">' + value + '</p>')
                    });
                }
            })
        }))
    })
</script> --}}
