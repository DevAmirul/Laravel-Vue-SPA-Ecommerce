<script setup>
import Form from '../../components/guestInputForm/Form.vue';
import Email from '../../components/guestInputForm/Email.vue';
import Password from '../../components/guestInputForm/Password.vue';
import FbGoogle from '../../components/guestInputForm/Fb&Google.vue';
</script>
<template>
    <Form message="Sign in to start your session">
        <template v-slot:input>
            <Email></Email>
            <Password></Password>
        </template>
        <template v-slot:submit>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </template>
        <FbGoogle></FbGoogle>
        <template v-slot:footer>
            <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p>
        </template>
        <!-- /.social-auth-links -->
    </Form>
</template>
<style></style>
