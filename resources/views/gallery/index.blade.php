@extends('layouts.app')

@section('content')
    <div class="container ramcek">
        <div class="row">
            @if ($gallery->count())
                <?php
                $i = 1;
                ?>
                @foreach($gallery as $galleryimg)
                    <div class="col-md-3 galleryimg">
                        <img src="{{ asset('/img/'.$galleryimg->galleryimg) }}" class="img-fluid"
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
        @if ($i % 3 > 0)
            @for ($j = 0; $j < $i % 3; $j++)
                <div class="col-md-3 galleryimg">
                </div>
            @endfor
    </div>
    @endif
    @else
        <div class="container">
            <p>Nie su tu zatial ziadne obrazky!</p>
        </div>
        @endif
        </div>
@endsection
