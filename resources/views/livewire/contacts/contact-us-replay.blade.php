@push('title')
Contacts Replay
@endpush

<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->
    <x-form pageTitle='Contacts message' pageUrl='Contacts'>
        <x-form-input-field.general col="col-6" lable="To" name="to" type="email" wireModel='email' disabled='disabled'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Name" name="name" type="name" wireModel='name' disabled='disabled'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Subject" name="subject" type="text" wireModel='subject' disabled='disabled'>
        </x-form-input-field.general>
        <x-form-input-field.text-area col="col-6" lable="Message" name="message"  wireModel='message' disabled='disabled'>
        </x-form-input-field.text-area>
    </x-form>

    <x-form pageTitle='Contacts Replay' pageUrl='Contacts / Replay'>
        <x-form-input-field.general col="col-6" lable="Subject" name="repliedSubject" type="text" wireModel='repliedSubject' >
        </x-form-input-field.general>
        <x-form-input-field.text-area col="col-6" lable="Message" name="repliedMessage" wireModel='repliedMessage' >
        </x-form-input-field.text-area>

        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

</div>