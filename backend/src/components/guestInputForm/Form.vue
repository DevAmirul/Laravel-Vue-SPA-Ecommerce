<script setup>
const props = defineProps({
    message: String,
})
</script>
<template>
    <div class="card-body">
        <p class="login-box-msg">{{ props.message }}</p>
        <form action="../../index3.html" method="post">
            <slot name="input"></slot>
            <slot name="submit"></slot>

        </form>
        <slot></slot>
        <slot name="footer"></slot>
    </div>
</template>
<style></style>
