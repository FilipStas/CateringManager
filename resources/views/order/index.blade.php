<x-layout>
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Objednávky</h4>

            <a class="nav-btn" href="{{ route('orders.create') }}">
                + Vytvoriť objednávku
            </a>
        </div>

        @if($days->isEmpty())
            <p class="text-muted">Zatiaľ nemáš žiadne objednávky.</p>
        @else
            @foreach($days as $day)
                <div class="card mb-3">
                    <div class="card-header  ">
                        <strong>{{ $day['date_label'] }}</strong>
                        <span class="text-muted ms-2">
                            ({{ $day['count'] }} objednávok)
                        </span>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($day['orders'] as $order)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span> Názov Objednávky: {{ $order->name }}</span>
                                    <strong>Čas doručenia: {{ $order->event_time }}</strong>
                                    <span>
                                        ({{ $order->people_count }} osôb)
                                    </span>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="{{ route('orders.items.edit', $order->id) }}"
                                       class="nav-btn ">
                                        Položky
                                    </a>
                                    <a href="{{ route('orders.edit', $order->id) }}"
                                       class="nav-btn ">
                                        Edit
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        @endif
    </div>
</x-layout>
