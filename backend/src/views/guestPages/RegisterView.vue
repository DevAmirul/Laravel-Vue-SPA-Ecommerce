<script setup>
import Form from '../../components/guestInputForm/Form.vue';
import Email from '../../components/guestInputForm/Email.vue';
import Name from '../../components/guestInputForm/Name.vue';
import Password from '../../components/guestInputForm/Password.vue';
import FbGoogle from '../../components/guestInputForm/Fb&Google.vue';
</script>
<template>
    <Form message="Register a new membership">
        <template v-slot:input>
            <Name></Name>
            <Email></Email>
            <Password></Password>
            <Password></Password>
        </template>
        <template v-slot:submit>
            <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </template>
        <FbGoogle></FbGoogle>
        <template v-slot:footer>
            <a href="login.html" class="text-center">I already have a membership</a>
        </template>
        <!-- /.social-auth-links -->
    </Form>
</template>
<style></style>