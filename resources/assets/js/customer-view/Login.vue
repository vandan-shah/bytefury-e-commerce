<template>
    <div class="login">
        <div class="video-container">
            <div class="color-overlay"></div>
            <!-- <video autoplay loop muted>
                <source src="../Titan-OnTrend-That-Summer-Feelin (1).mp4" type="video/mp4">
            </video> -->
        </div>
        <div class="form">
            <i class="fas fa-users hero"></i>
            <form>
                <!-- <div class="field-group"> -->
                    <div class="field-group">
                        <i class="fas fa-user"></i><input type="email" id="email" placeholder="Username" />
                    </div>
                    <div class="field-group">
                        <i class="fas fa-lock"></i><input type="password" id="password" placeholder="Password" />
                    </div>
                <!-- </div> -->
                <button type="submit">GET STARTED</button>
                <ul>
                    <li class="create"><strong>CREATE ACCOUNT</strong></li>
                    <li class="forgot">Forgot Password?</li>
                </ul>
            </form>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>

.login {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
    background: cover;
}

.video-container {
    color: black;
    position: absolute;
    filter: blur(10px);
}

.form {
    color: #fff;
    position: relative;
    top: 45%;
    left: 50%;
    margin: 0 auto;
    text-align: center;
    transform: translate(-50%, -50%);
}

.hero {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.field-group {
    background: rgba(255, 255, 255, 0.15);
    margin-bottom: 2rem;
    padding: 2px 10px 2px 0px;
    border-radius: 35px;
    width: 400px;
    margin: 30px auto;
}

input {
    padding: 10px 0px 10px 15px;
    font-weight: 400;
    color: #ddd;
    letter-spacing: 1px;
    border: none;
    background: transparent;
    outline: none;
    text-rendering: auto;
    /* text-indent: 0px; */
    text-align: start;
    margin-left: 0px;
    width: 310px;
}

button {
    background: #fc636b;
    border: none;
    color: #fff;
    padding: 11px 15px;
    width: 400px;
    margin-top: 10px;
    letter-spacing: 2px;
    border-radius: 35px;
}

ul {
    margin-top: 25px;
    align-items: center;
    width: 400px;
    margin-left: auto;
    margin-right: auto;
}

ul li {
    list-style: none;
    text-decoration: none;
    display: inline;
}

.create {
    float: left;
}

.forgot {
    float: right;
}

</style>