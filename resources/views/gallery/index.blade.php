@extends('layouts.app')

@section('content')
    <div class="container ramcek">
        <div class="row">
            @if ($gallery->count())
                <?php
                $i = 1;
                ?>
                @foreach($gallery as $galleryimg)
                    <div class="col-md-3 galleryramcek">
                        <img src="{{ asset('/img/'.$galleryimg->galleryimg) }}" class="img-fluid galleryimg"
                             alt="Responsive image">
                        @if($i % 3 === 0)
                    </div></div>
        <div class="row">
            @else
        </div>
        @endif
        <?php
        $i++;
        ?>
        @endforeach
    </div>
        @else
            <div class="container">
                <p>Nie su tu zatial ziadne obrazky!</p>
            </div>
        @endif
    </div>
@endsection
