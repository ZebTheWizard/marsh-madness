@extends('layouts.main')
@section('content')
@component('components.logo')@endcomponent
    <div class="mx-auto" style="max-width:768px;">
        <h1 class="text-3xl font-bold text-black show-print text-center">{{ strtoupper($bracket->fullTitle) }}</h1>
        <hr class="mx-auto border-black mt-4 mb-8" style="max-width:768px;">
        <div class="px-2 flex flex-wrap flex-row" style="background-color: rgba(29, 28, 47, 0.5)">
            <div class="conf w-full">
                @foreach ($rounds as $r => $round)
                    <div class="round show-print mt-3">
                        <div class="round-bg" style="background-color: red"></div>
                        @foreach($round as $i => $item)
                            <div class="team {{$item->type}} flex item-center justify-between border border-black" 
                                 @@click='setbitem(@json($item))'
                                 style="@if(($i + 1) % 2 == 0 && $r == 0) margin-bottom: 1rem; @elseif($r > 0) margin-top: -4px; @endif"
                                 >
                                <div class="p-3" id="{{$item->id}}">{{$item->team->name ?? $item->type}}</div>
                                @if($item->score >= 0)
                                    <div class="border-l border-black px-3">
                                        <div class="flex items-center justify-center text-black">{{ $item->score }}</div>
                                    </div>
                                    {{-- <div class="bg-black p-3 text-white hide-print" >{{ $item->score }}</div> --}}
                                @endif
                            </div>
                        @endforeach 
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @if(Auth::check() && Auth::user()->is_admin)
        @component('components.bracketItemForm')@endcomponent
    @endif

    @component('components.listing')@endcomponent
    
@endsection