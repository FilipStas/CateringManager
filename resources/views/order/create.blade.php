<x-layout>
    <div class="container align-items-center mt-3 w-50 ">
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Názov objednávky</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="contact_name" class="form-label">Kontaktná osoba</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name" value="{{ old('contact_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email (voliteľný)</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefón</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Miesto konania (voliteľné)</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
            </div>
            <div class="mb-3">
                <label for="people_count" class="form-label">Počet hostí</label>
                <input type="number" class="form-control" id="people_count" name="people_count" value="{{ old('people_count') }}" min="1" required>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="event_date" class="form-label">Dátum</label>
                    <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date') }}" required>
                </div>
                <div class="col">
                    <label for="event_time" class="form-label">Čas</label>
                    <input type="time" class="form-control" id="event_time" name="event_time" value="{{ old('event_time') }}" required>
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="pickup" name="pickup" value="1" {{ old('pickup') ? 'checked' : '' }}>
                <label class="form-check-label" for="pickup">Vyzdvihnutie</label>
            </div>
            <button type="submit" class="nav-btn">Uložiť objednávku</button>
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
    </div>
</x-layout>
