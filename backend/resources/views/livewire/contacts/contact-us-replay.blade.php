@push('title')
Contacts Replay
@endpush

<div>
    <!-- ======= Header ======= -->
    <div wire:ignore>
        @livewire('layouts.header')
    </div>
    <hr>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    @livewire('layouts.sidebar')
    <!-- End Sidebar-->
    <x-form pageTitle='Contacts reply' pageUrl='Contacts / Replay' action='reply'>
        <x-form-input-field.general col="col-6" lable="To" name="to" type="email" wireModel='email' disabled='disabled'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Name" name="name" type="name" wireModel='name' disabled='disabled'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Subject" name="subject" type="text" wireModel='subject' disabled='disabled'>
        </x-form-input-field.general>
        <x-form-input-field.text-area col="col-6" lable="Message" name="message"  wireModel='message' disabled='disabled'>
        </x-form-input-field.text-area>

        <h4>Reply Message</h4>
        <x-form-input-field.general col="col-6" lable="Subject" name="repliedSubject" type="text" wireModel='repliedSubject' >
        </x-form-input-field.general>
        <x-form-input-field.text-area col="col-6" lable="Message" name="repliedMessage" wireModel='repliedMessage' >
        </x-form-input-field.text-area>

        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>