<main id="main" class="main">
    @livewire('layouts.page-title',['pageTitle'=> $pageTitle])
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Vertical Form -->
                        <form class="row g-3 mt-2" wire:submit.prevent='{{ $action ?? '' }}' enctype="{{ $enctype ?? '' }}">

                            {{ $slot }}

                        </form>
                        <!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>