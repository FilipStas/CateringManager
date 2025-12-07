<x-layout>

    Zobrazujem polozky jedal
    <ul>
    @foreach($polozky as $polozka)
        <li>
            <x-polozka>
                <h3>{{$polozka['nazov']}}</h3>
            </x-polozka>
        </li>
    @endforeach
    </ul>
</x-layout>
