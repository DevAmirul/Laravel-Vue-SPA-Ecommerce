
<template>
    <!-- Contact Start -->
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white">
                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">
                            Create your Account
                        </h3>
                    </div>
                    <div class="panel-body p-3">
                        <form action="login_script.php" method="POST">
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input type="text" placeholder="Full Name" required />
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-envelope p-2"></span>
                                    <input type="text" placeholder="Username or Email" required />
                                </div>
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input type="password" placeholder="Enter your Password" required />
                                    <button disabled class="btn bg-white text-muted">
                                        <span class="far fa-eye-slash"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input type="password" placeholder="Confirm your Password" required />
                                    <button disabled class="btn bg-white text-muted">
                                        <span class="far fa-eye-slash"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-inline">
                                <input type="checkbox" name="remember" id="remember" />
                                <label for="remember" class="text-muted">I agree to the Terms of User</label>
                            </div>
                            <div class="btn btn-primary btn-block mt-3">
                                Sign Up
                            </div>
                            <div class="text-center pt-4 text-muted">
                                Have an account? <a href="#">Sign in</a>
                            </div>
                        </form>
                    </div>
                    <div class="mx-3 my-2 py-2 bordert">
                        <div class="text-center py-3">
                            <a href="https://wwww.facebook.com" target="_blank" class="px-2">
                                <img src="https://www.dpreview.com/files/p/articles/4698742202/facebook.jpeg" alt="" />
                            </a>
                            <a href="https://www.google.com" target="_blank" class="px-2">
                                <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png" alt="" />
                            </a>
                            <a href="https://www.github.com" target="_blank" class="px-2">
                                <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</template>
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    height: 100vh;
}

.container {
    margin: 50px auto;
}

.panel-heading {
    text-align: center;
    margin-bottom: 10px;
}

#forgot {
    min-width: 100px;
    margin-left: auto;
    text-decoration: none;
}

a:hover {
    text-decoration: none;
}

.form-inline label {
    padding-left: 10px;
    margin: 0;
    cursor: pointer;
}

.btn.btn-primary {
    margin-top: 20px;
    border-radius: 15px;
}

.panel {
    min-height: 380px;
    box-shadow: 10px 10px 20px rgb(218, 218, 218) !important;
    border-radius: 12px;
    box-shadow: 11px 12px 54px -10px rgba(0,0,0,0.84);

}

.input-field {
    border-radius: 5px;
    padding: 5px;
    display: flex;
    align-items: center;
    cursor: pointer;
    border: 1px solid #ddd;
    color: #4343ff;
}

input[type="text"],
input[type="password"] {
    border: none;
    outline: none;
    box-shadow: none;
    width: 100%;
}

.fa-eye-slash.btn {
    border: none;
    outline: none;
    box-shadow: none;
}

img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
    position: relative;
}

a[target="_blank"] {
    position: relative;
    transition: all 0.1s ease-in-out;
}

.bordert {
    border-top: 1px solid #aaa;
    position: relative;
}

.bordert:after {
    content: "Or, sign up with";
    position: absolute;
    top: -13px;
    left: 33%;
    background-color: #fff;
    padding: 0px 8px;
}

@media (max-width: 360px) {
    #forgot {
        margin-left: 0;
        padding-top: 10px;
    }

    body {
        height: 100%;
    }

    .container {
        margin: 30px 0;
    }

    .bordert:after {
        left: 25%;
    }
}
</style>
