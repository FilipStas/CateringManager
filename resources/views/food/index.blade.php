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
                            id="name"
                            class="form-control"
                            required
                        >
                    </div>

                    <button type="submit" class="nav-btn">
                        Pridať
                    </button>
                </form>
            </div>

            <div class="col">
                <h3>Aktuálna ponuka</h3>
                <ul class="row list-unstyled p-0 m-0">
                    @foreach($foods as $food)
                        <li class="col-12 col-md-4 p-2">
                            <div class="userbox d-block">
                                <p class="mb-1">Názov: {{ $food->name }}</p>
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
            </div>
        </div>
    </div>
</x-layout>
