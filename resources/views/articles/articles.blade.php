@extends('layouts.app')

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Modal -->
    <div class="modal" id="editModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label>Nazov</label>
                            <input type="text" class="form-control" id="titleEdit" name="title" size="50"
                                   pattern="(?=.*[A-Z]).{1,}"
                                   maxlength="50" value="" required>
                            @error('title')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Text</label>
                            <input type="text" class="form-control" id="textEdit" name="text" pattern="(?=.*[A-Z]).{1,}"
                                   value=""
                                   required>
                            @error('text')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container ramcek">
        <div class="container">
            <form action="{{ route('articles') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label>Nazov</label>
                    <input type="text" class="form-control" id="title" name="title" size="50" pattern="(?=.*[A-Z]).{1,}"
                           maxlength="50" value="" required>
                    @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <input type="text" class="form-control" id="text" name="text" pattern="(?=.*[A-Z]).{1,}" value=""
                           required>
                    @error('text')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Thumbnail</label>
                    <input type="file" class="form-control-file" id="thumbnail" name="thumbnail"
                           accept=".jpg, .jpeg, .png">
                    @error('thumbnail')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Vytvorit">
                </div>
            </form>
        </div>
        @if ($articles->count())
            @foreach($articles as $article)
                @if ($article->ownedBy(auth()->user()))
                    <div class="container mb-2">
                        <div class="media pt-3 pb-3">
                            <img class="d-flex align-self-center mr-3 ml-3"
                                 src="{{ asset('/storage/img/'.$article->thumbnail) }}"
                                 alt="Generic placeholder image"
                                 style="width: 15%; height: 15%">
                            <div class="media-body">
                                <h5 id="{{ 'ajaxH'.$article->id }}" class="mt-0">{{ $article->title }}</h5>

                                <p id="{{ 'ajaxP'.$article->id }}">{{ $article->text }}</p>
                            </div>
                            <div>
                                <a href="javascript:void(0)" onclick="edit({{ $article->id }})"
                                   class="btn btn-primary float-right"
                                   style="margin-right: 15px">
                                    Upravit
                                </a>
                            </div>
                            <form action="{{ route('articles.destroy', $article) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-right"
                                        style="margin-right: 15px">
                                    Odstranit
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <div class="container">
                <p>Nie su tu zatial ziadne clanky!</p>
            </div>
        @endif
    </div>

    <script>
        function edit(id) {
            $.get('articles/' + id, function (article) {
                $("#editModal").modal('toggle');
                $("#id").val(article.id);
                $("#titleEdit").val(article.title);
                $("#textEdit").val(article.text);
            });
        }

        $("#editForm").submit(function (e) {
           e.preventDefault();
           var id = $("#id").val();
           var title = $("#titleEdit").val();
           var text = $("#textEdit").val();
           var _token = $("input[name=_token]").val();

           $.ajax({
               url:"{{ route('articles.update') }}",
               type:"PUT",
               data:{
                   id:id,
                   title:title,
                   text:text,
                   _token:_token
               },
               success:function (response){
                   var titleH = '#ajaxH' + response.id.toString();
                   var textP = '#ajaxP' + response.id.toString();
                   $(titleH).html(response.title);
                   $(textP).html(response.text);
                   $('#editModal').modal('toggle');
                   $('#editForm')[0].reset();
               }
           });
        });
    </script>

@endsection
