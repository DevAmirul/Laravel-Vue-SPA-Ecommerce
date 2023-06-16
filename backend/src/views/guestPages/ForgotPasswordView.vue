<script setup>
import Form from '../../components/guestInputForm/Form.vue';
import Email from '../../components/guestInputForm/Email.vue';
</script>
<template>
  <Form message="You forgot your password? Here you can easily retrieve a new password.">
    <template v-slot:input>
      <Email></Email>
    </template>
    <template v-slot:submit>
      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block">Request new password</button>
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