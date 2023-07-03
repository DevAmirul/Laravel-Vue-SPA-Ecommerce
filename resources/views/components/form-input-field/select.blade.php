
<div x-data="fetchSubCategories" class="{{ $col }}">
    <select  id="select" class="form-select" aria-label="Default select example" name="{{ $name }}">
        <template x-for="color in getSections()">
            <option x-text="color">ok</option>
        </template>
    </select>
</div>