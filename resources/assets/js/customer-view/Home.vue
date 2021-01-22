<template>
  <div class="section">
    <div class="row">
      <div class="nav-top">
        <h2>NeoCyber!</h2>
        <div class="nav-link">
          <ul>
            <li href="#">Watches</li>
            <li href="#">Mobiles</li>
            <li href="#">Laptops</li>
            <li href="#">Tablets</li>
          </ul>
        </div>
        <div class="cart">
          <ul>
            <button class="btn">
              <router-link to="/login"><i class="fas fa-sign-in-alt"></i> Login</router-link>
            </button>
            <li href="#">Cart ({{ cart }})</li>
          </ul>
        </div>
      </div>

      <h1>Don’t worry,<br> we have it.</h1>
      <div class="video-container">
        <div class="color-overlay"></div>
        <!-- <video autoplay loop muted>
          <source src="../Titan-OnTrend-That-Summer-Feelin (1).mp4" type="video/mp4">
        </video> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cart: []
    }
  }
}
</script>

<style>

.row {
  width: 1500px;
  margin: 0 auto;
  color: white;
}

.section {
  position: relative;
  width: 100%;
  height: 100vh;
  overflow: hidden;
  background: cover;
}

h1 {
  position: absolute;
  width: 1500px;
  margin: 0 auto;
  /* text-align: center; */
  font-size: 4rem;
  font-family: 'Marcellus', serif;
  padding: 1.2rem;
  z-index: 2;
  text-transform: uppercase;
  color: #fff;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.nav-top {
  display: flex;
  height: 100px;
  width: 100%;
  /* justify-content: space-between; */

}

h2 {
  margin-top: 1.5rem;
  position: relative;
  /* text-align: center; */
  font-size: 3rem;
  padding: 1.2rem;
  z-index: 1;
  color: #fff
}

.nav-link {
  display: inline-block;
  position: relative;
  z-index: 1;
  flex: 5;
}

.nav-link li {
  margin-top: 3rem;
  margin-left: 2rem;
  list-style: none;
  text-transform: uppercase;
  display: inline-block;
  padding: 1rem;
}

.cart {
  display: inline-block;
  position: relative;
  z-index: 1;
}

.cart button {
  margin-top: 3rem;
  margin-left: 2rem;
  position: relative;
  z-index: 2;
  list-style: none;
  text-transform: uppercase;
  padding: 1rem;
  border: 1px solid #fff;
  border-radius: 3px;
}

.cart li {
  margin-top: 3rem;
  margin-left: 2rem;
  position: relative;
  z-index: 2;
  list-style: none;
  text-transform: uppercase;
  padding: 1rem;

  float: right;
}

.btn {
  position: relative;
  z-index: 1;
  padding: 1rem;
  margin-top: 1.8rem;
  background-color: transparent;
  color: #fff;
  border: 1px solid transparent;
  flex: 1;
}

.video-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
}

.color-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  background-color: rgb(2, 2, 2 );
  height: 100vh;
  opacity: 0.7;
}

router-link {
  color: #fff;
}

li,
button {
  cursor: pointer;
}

</style>
