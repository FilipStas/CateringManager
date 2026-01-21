<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar col-auto">
                <h5>Pridať jedlo</h5>
                <form method="POST" action="{{ route('foods.store') }}">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Názov jedla</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="food_type" class="form-label">Typ jedla</label>
                        <select name="food_type" id="food_type" class="form-control" required>
                            @foreach($foodTypes as $type)
                                <option value="{{ $type->value }}" {{ old('food_type') == $type->value ? 'selected' : '' }}>
                                    {{ $type->label() }}
                                </option>
                            @endforeach
                        </select>
                        @error('food_type')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="unit" class="form-label">Jednotka</label>
                        <select name="unit" id="unit" class="form-control" required>
                            @foreach($units as $unit)
                                <option value="{{ $unit->value }}" {{ old('unit') == $unit->value ? 'selected' : '' }}>
                                    {{ $unit->label() }}
                                </option>
                            @endforeach
                        </select>
                        @error('unit')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="nav-btn">
                        Pridať
                    </button>
                </form>
            </div>

            <div class="col">
                <h3>Aktuálna ponuka</h3>
                @foreach($foods->groupBy(fn($food) => $food->food_type) as $type => $foodsGroup)
                    <h5>{{ $foodsGroup->first()->food_type->label() }}</h5>
                    <ul class="row list-unstyled p-0 m-0 mb-3">
                        @foreach($foodsGroup as $food)
                            <li class="col-12 col-md-4 p-2">
                                <div class="userbox d-block">
                                    <p class="mb-1">
                                        Názov: {{ $food->name }} <br>
                                        Jednotka: {{ $food->unit->label() }}
                                    </p>
                                    <form method="POST" action="{{ route('foods.destroy', $food->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn">
                                            Odstrániť
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
