<script setup>
</script>

<template>
  <div class="container">
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
  background: linear-gradient(to bottom, #6699CC, #336699);
  color: #FFFFFF;
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
  border-radius: 5px;
  font-size: 1.25rem;
  padding: 0.75rem 1.5rem;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
  
}
button a{
  text-decoration: none;
}

button:hover {
  background-color: #a6d2ff;
  color: #FFFFFF;
}
</style>







