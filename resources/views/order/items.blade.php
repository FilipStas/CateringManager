<x-layout>
    <div class="container mt-3">
        <div class="row">
            <div class="col-8">
                <h5>Objednávka : {{$order->name}} Počet osob: {{$order->people_count}} </h5>
                <hr>
                <h5>Pridať položku</h5>

                <form method="POST" action="{{ route('orders.items.store', $order->id) }}" class="mt-3">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Názov položky</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="orderItemName"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Množstvo</label>
                            <input
                                type="number"
                                class="form-control"
                                name="quantity"
                                id="orderItemQuantity"
                                min="1"
                                value="{{ old('quantity', 1) }}"
                                required
                            >
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label">Jednotka</label>
                            <select name="unit" id="orderItemUnit" class="form-select" required>
                                @foreach($units as $unit)
                                    <option value="{{ $unit->value }}" {{ old('unit') === $unit->value ? 'selected' : '' }}>
                                        {{ $unit->value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="nav-btn">Pridať</button>
                    <a href="{{ route('orders.index') }}" class="nav-btn">
                        Naspäť na objednávky
                    </a>
                    <a class="nav-btn" href="{{route('orders.edit', $order->id)}}">
                        Editovať objednávku
                    </a>
                </form>

                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <hr>
                <h5>Položky objednávky</h5>

                @if($order->items->isEmpty())
                    <p class="text-muted mt-2">Zatiaľ bez položiek.</p>
                @else
                    <ul class="list-group mt-3">
                        @foreach($order->items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $item->name }}</span>
                                <span>{{ $item->quantity }} {{ $item->unit->value }}</span>

                                <form method="POST" action="{{ route('orders.items.destroy', [$order->id, $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">odstrániť</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="col-4">
                <div class="card sticky-top" >
                    <div class="card-body">
                        <h5 class="card-title">Jedlá podľa kategórie</h5>
                        @foreach($foodType as $type)
                            @if(isset($foodsByType[$type->value]))
                                <div class="mb-3">
                                    <h6 class="mb-2">{{ $type->value }}</h6>
                                    <div class="list-group">
                                        @foreach($foodsByType[$type->value] as $food)
                                            <button
                                                type="button"
                                                class="list-group-item list-group-item-action"
                                                data-food-name="{{ $food->name }}"
                                                data-food-unit="{{ $food->unit->value }}"
                                            >
                                                {{ $food->name }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
