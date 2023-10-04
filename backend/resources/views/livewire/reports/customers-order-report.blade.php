@push('title')
Customers Order Report
@endpush
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
    <x-table pageTitle='Customers Order Report' tableName="Customers Order Report Table"
        :$columnNamesArr :showBtn='false' :tableData='$usersReports'
        :$tableDataColumnNames>

        <form class="mt-2 d-flex gap-2">
            <div class="col-2">
                <select wire:model='orderStatus' class="form-select" aria-label="Default select example">
                    <option value="" disabled selected>Select Status</option>
                    <option value="approved">Approved</option>
                    <option value="delivered">Delivered</option>
                    <option value="pending">Pending</option>
                    <option value="canceled">Canceled</option>
                    <option value="returned">Returned</option>
                </select>
            </div>
            <div class="col-2">
                <select wire:model='groupBy' class="form-select" aria-label="Default select example">
                    <option value="" disabled selected>Group By</option>
                    <option value="Today">Days</option>
                    <option value="This Month">Month</option>
                    <option value="This Year">Years</option>
                </select>
            </div>
            <div class="col-3"><input wire:model='startDate' class="form-control" id="start_date" type="text" name="start_date"
                    placeholder="Pick start Date" aria-label="Start Date" autocomplete="off">
            </div>
            <div class="col-3"><input wire:model='expireDate' class="form-control" id="start_date" type="text" name="start_date"
                    placeholder="Pick start Date" aria-label="Start Date" autocomplete="off">
            </div>
        </form>

    </x-table>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>
@push('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#start_date", {
        dateFormat: "Y-m-d H:i:s",
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        });
        flatpickr("#expire_date", {
        dateFormat: "Y-m-d H:i:s",
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        });
</script>
@endpush