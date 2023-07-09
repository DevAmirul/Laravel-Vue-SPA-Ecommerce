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
    <x-form pageTitle='Contacts Replay' pageUrl='Contacts / Replay'>
        <x-form-input-field.general col="col-6" lable="To" name="to" type="email" wireModel='email'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Name" name="name" type="name" wireModel='name'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Subject" name="subject" type="text" wireModel='subject'>
        </x-form-input-field.general>
        <x-form-input-field.text-area col="col-6" lable="Message" name="message"  wireModel='message'>
        </x-form-input-field.text-area>

        <x-form-input-field.submit color='success' buttonName="Send Message"></x-form-input-field.submit>
    </x-form>

    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

</div>