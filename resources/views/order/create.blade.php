<x-layout>
    <div class="m-0 p-4">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Názov Objednávky</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="contact_name" class="form-label">Kontaktná osoba</label>
                        <input type="text" class="form-control" id="contact_name" name="contact_name" value="{{ old('contact_name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefón</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Miesto konania</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="event_date" class="form-label">Dátum</label>
                            <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date') }}">
                        </div>

                        <div class="col">
                            <label for="event_time" class="form-label">Čas</label>
                            <input type="time" class="form-control" id="event_time" name="event_time" value="{{ old('event_time') }}">
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="pickup" name="pickup" value="1" {{ old('pickup') ? 'checked' : '' }}>
                        <label class="form-check-label" for="pickup">Vyzdvihnutie</label>
                    </div>

                    <button type="submit" class="nav-btn">Uložiť objednávku</button>
                </form>

                @if($errors->any())
                    <div class="errors">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-layout>
