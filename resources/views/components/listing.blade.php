<hr class="mt-8 mx-auto border-black" style="max-width:768px;">
<h1 class="text-3xl mt-8 mb-2 px-5 text-center font-bold">All Brackets</h1>
<div class="mx-auto flex" style="max-width:768px;">
    <div class="flex-grow mr-1">
        @foreach(\App\Bracket::where("gender", 'boys')->get() as $b)
            <a class="text-2xl  bg-blue-400 text-white font-bold p-1 mb-3 text-center border-blue-600 border-2 block" href="/bracket/{{ $b->slug}}">
                {{ strtoupper($b->fullTitle) }}
            </a>
        @endforeach
    </div>

    <div class="flex-grow ml-1">
        @foreach(\App\Bracket::where("gender", 'girls')->get() as $b)
            <a class="text-2xl  bg-pink-400 text-white font-bold p-1 mb-3 text-center border-pink-500 border-2 block" href="/bracket/{{ $b->slug}}">
                {{ strtoupper($b->fullTitle) }}
            </a>
        @endforeach
    </div>
</div>