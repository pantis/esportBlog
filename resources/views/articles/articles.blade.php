@extends('layouts.app')

@section('content')
    <div class="container ramcek">
        <div class="container">
            <form action="{{ route('articles') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="formGroupExampleInput">Nazov</label>
                    <input type="text" class="form-control" id="title" name="title" size="50" pattern="(?=.*[A-Z]).{1,}"
                           maxlength="50" value="">
                    @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Text</label>
                    <input type="text" class="form-control" id="text" name="text" pattern="(?=.*[A-Z]).{1,}" value="">
                    @error('text')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Thumbnail</label>
                    <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" value=""
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
                                <h5 class="mt-0" style="color: #D37E1F">{{ $article->title }}</h5>
                                <p style="color: black">{{ $article->text }}</p>
                            </div>
                            <form action="{{ route('articles.destroy', $article) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-right" style="margin-right: 15px">
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
@endsection
