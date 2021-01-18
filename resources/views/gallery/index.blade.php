@extends('layouts.app')

@section('content')
    <div class="container ramcek">
        <div class="row">
            <div class="col-md-3 galleryimg">
                <img src="{{asset('/img/g2vsdwg.jpg')}}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-3 galleryimg">
                <img src="{{asset('/img/g2vsdwg.jpg')}}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-3 galleryimg">
                <img src="{{asset('/img/g2vsdwg.jpg')}}" class="img-fluid" alt="Responsive image">
            </div>
        </div>
    </div>
@endsection

{{--<div class="container ramcek">--}}
{{--    @if ($gallery->count())--}}
{{--        @foreach($gallery as $galleryimg)--}}
{{--            @if ($galleryimg->id % 3 === 0)--}}
{{--                <div class="row">--}}
{{--                    @endif--}}
{{--                    <div class="col-md-3 galleryimg">--}}
{{--                        <img src="{{ asset('/img/'.$galleryimg->galleryimg) }}" class="img-fluid"--}}
{{--                             alt="Responsive image">--}}
{{--                        @if ($galleryimg->id % 3 === 0)--}}
{{--                    </div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--            @else--}}
{{--                <div class="container">--}}
{{--                    <p>Nie su tu zatial ziadne obrazky!</p>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--</div>--}}
