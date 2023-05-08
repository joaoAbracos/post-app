<script setup>
import { RouterLink, RouterView } from "vue-router";
import HelloWorld from "./components/HelloWorld.vue";
</script>

<template>
  <div class="app">
    <header class="header">
      <div class="wrapper">
        <nav class="nav">
          <RouterLink to="/">Home</RouterLink>
          <RouterLink to="/posts">Posts</RouterLink>
        </nav>
      </div>
    </header>
    <div class="content">
      <RouterView />
    </div>
  </div>
</template>

<style>
.app {
  display: flex;
  flex-direction: column;
}

.header {
  background-color: #333;
  color: #fff;
  padding: 20px 0 20px 0;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1;
}

.wrapper {
  max-width: 1440px;
  width: 100%;
  margin: 0 auto;
}

.nav {
  display: flex;
  justify-content: center;
  align-items: center;
}

.nav a {
  color: #fff;
  text-decoration: none;
  font-weight: bold;
  font-size: 1.2rem;
  padding: 10px;
}

.content {
  margin-top: 80px;
  flex: 1;
}

</style>





