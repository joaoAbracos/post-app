<script setup>
</script>

<template>
  <div class="container" >
    <main>
      <h1>Where is a will there is a way!</h1>
      <button><RouterLink to="/posts">Get Started</RouterLink></button>
    </main>
  </div>
</template>

<style>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  background: url(@/assets/image.jpg);;
  color: #FFFFFF;
  margin: 0 100px 0 100px;
  border-radius: 10px;
}

main {
  text-align: center;
  
}

h1 {
  font-size: 3rem;
  margin-bottom: 1rem;
}


button {
  background-color: #FFFFFF;
  color: #336699;
  border: none;
  border-radius: 20px;
  font-size: 1.25rem;
  padding: 0.75rem 1.5rem;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
  font-weight: 600;
  
}
button a{
  text-decoration: none;
}

button:hover {
  transform: scale(1.1);
}
</style>







