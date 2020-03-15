<div class="container">

@if (Auth::check() && Auth::user()->user_type == 'admin')
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Зураг нэмэх
  </button>
@endif
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">

    <form id="form" action="{{ route('album.image') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Шинэ зураг нэмэх</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $albums->id }}" class="form-control">
                </div>

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
                {{--<div class="form-group">
                    <button class="btn btn-success" type="submit">Хадгалах</button>
                </div>--}}

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Цуцлах</button>
          <button type="submit" class="btn btn-success">Хадгалах</button>
        </div>
      </div>
    </form>
    </div>
  </div>

    <!-- Modal end -->
