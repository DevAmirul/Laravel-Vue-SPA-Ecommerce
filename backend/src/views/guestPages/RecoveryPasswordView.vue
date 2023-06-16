<script setup>
import Form from '../../components/guestInputForm/Form.vue';
import Password from '../../components/guestInputForm/Password.vue';
</script>
<template>
    <Form message="You are only one step a way from your new password, recover your password now.">
        <template v-slot:input>
            <Password></Password>
            <Password></Password>
        </template>
        <template v-slot:submit>
            <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Change password</button>
            </div>
            <!-- /.col -->
          </div>
        </template>

        <template v-slot:footer>
            <p class="mt-3 mb-1">
                <a href="login.html">Login</a>
            </p>
        </template>
        <!-- /.social-auth-links -->
    </Form>
</template>
<style></style>