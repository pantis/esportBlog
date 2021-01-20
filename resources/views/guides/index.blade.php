@extends('layouts.app')

@section('content')
    <div class="container ramcek">
        @if ($guides->count())
            @foreach($guides as $guide)
                <div class="container mb-2">
                    <div class="media pt-3 pb-3">
                        <img class="d-flex align-self-center mr-3 ml-3" src="{{ asset('/img/'.$guide->thumbnail) }}"
                             alt="Generic placeholder image"
                             style="width: 15%; height: 15%">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $guide->title }}</h5>
                            <p>{{ $guide->text }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="container">
                <p>Nie su tu zatial ziadne prirucky!</p>
            </div>
        @endif
    </div>
@endsection
