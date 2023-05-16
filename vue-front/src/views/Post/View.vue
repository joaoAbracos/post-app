<template>
  <div class="main-div">
    <div class="main-add-post">
      <RouterLink to="/posts/create"> Add Post </RouterLink>
    </div>
    <div class="posts-div" v-if="this.posts.length > 0">
      <div class="post" v-for="(post, index) in posts" :key="index">
        <div class="post-header">
          <h2 class="post-title">{{ post.title }}</h2>
          <div class="post-footer">
            <RouterLink :to="'/posts/create/' + post.id">
              <font-awesome-icon :icon="['fas', 'edit']" />
            </RouterLink>
            <button type="button" @click="deletePost(post.id)">
              <font-awesome-icon :icon="['fas', 'trash-alt']" />
            </button>
          </div>
          
        </div>
        <p class="post-body">{{ post.body }}</p>
        <p class="post-type">{{ post.type }}</p>
        <div class="comments-toggle" v-if="post.comments.length > 0">
          <button
            type="button"
            @click="showComments[index] = !showComments[index]"
            v-bind:class="{
              'comment-toggle': true,
            }"
          >
            <font-awesome-icon
              v-if="showComments[index]"
              :icon="['fas', 'arrow-up']"
            />
            <font-awesome-icon v-else :icon="['fas', 'arrow-down']" />
          </button>
        </div>

        <div class="main-comments" v-if="showComments[index]">
          <div
            v-for="(comment, index2) in post.comments"
            :key="index2"
            class="comment"
          >
            <div class="comment-container">
              <p>{{ comment.comment }}</p>
              <span class="comment-date">{{ comment.created_at }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <div class="spinner"></div>
    </div>
  </div>
</template>
<style>
.spinner {
  margin: 50px auto;
  width: 40px;
  height: 40px;
  position: relative;
  text-align: center;
  animation: rotate 2s infinite linear;
}

.spinner:before {
  content: '';
  display: block;
  margin: 0 auto;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  border: 4px solid #ccc;
  border-color: #ccc transparent #ccc transparent;
  animation: spin 1.5s infinite ease-in-out;
}

@keyframes rotate {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  
  50% {
    transform: rotate(180deg);
    border-color: #888 transparent #888 transparent;
  }
  
  100% {
    transform: rotate(360deg);
  }
}
.main-div {
  width: 100%;
}
@media (min-width: 1440px) {
  .main-div {
    max-width: 1440px;
    margin: 0 auto;
  }
}
.main-add-post {
  display: flex;
  align-items: center;
  justify-content: flex-end;
}
.main-add-post a {
  font-weight: 600;
  background-color: #3beb55;
  border-radius: 50px;
  padding: 15px;
  margin: 10px;
  text-decoration: none;
}
.main-add-post a:hover {
  transform: scale(1.1);
}
.posts-div {
  overflow-y: auto;
  height: 782px;
}
.post {
  background-color: #fff;
  border-radius: 4px;
  position: relative;
  padding: 30px;
  margin: 15px 15px;
  color: #444;
  cursor: pointer;
  box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.5);
}

.post-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
  flex-wrap: wrap;
}

.post-title {
  margin: 0;
  text-transform: uppercase;
}

.post-type {
  margin: 0;
  border-radius: 3px;
  color: #fff;
  padding: 5px 10px;
  background-color: rgb(236, 150, 38);
  width: fit-content;
}

.post-body {
  text-align: left;
  margin-bottom: 10px;
}

.post-footer {
  display: flex;
  justify-content: flex-end;
  flex-wrap: wrap;
}

.post-footer button {
  border-radius: 20px;
  padding: 8px 16px;
  margin-left: 8px;
  color: black;
  text-transform: uppercase;
}

.post-footer a {
    padding: 8px 16px;
    margin-left: 8px;
    font-size: larger;
    color: black;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}
.post-footer a:hover{
  color: #3beb55;
  transform: scale(1.1);
}
.post-footer button[type="button"]:hover {
  color: red;
}
.comments-toggle {
  display: flex;
  align-items: baseline;
  justify-content: center;
}
.comment-toggle {
  margin-bottom: 10px;
}
.arrow-down::before {
  content: "\f107";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  font-size: 14px;
  margin-right: 5px;
  transform: rotate(0deg);
  transition: transform 0.2s ease-in-out;
}

.arrow-down.show-comments::before {
  transform: rotate(180deg);
}
.comment-section {
  border: 1px solid #ccc;
  padding: 10px;
}
.main-comments{
  box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.5);
}
.comment {
  margin: 8px 0;
  padding: 5px;
  border-radius: 3px;
}
.comment p {
  margin: 5px;
}
.comment-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.comment-date {
  width: 220px;
  text-align: right;
}
.comment-title {
  margin: 0;
}

.comment-body {
  text-align: right;
  margin: 0;
}
</style>
<script>
import axios from "axios";
export default {
  name: "Posts",
  data() {
    return {
      posts: [],
      showComments: [],
    };
  },
  created() {
    this.getPosts();
  },
  methods: {
    getPosts() {
      axios
        .get("http://localhost:8000/api/v1/posts")
        .then((res) => {
          this.posts = res.data.data;
          console.log(this.posts);
        })
        .catch((errors) => {
          console.log(errors);
        });
    },
    deletePost(id) {
      axios
        .delete("http://localhost:8000/api/v1/posts/" + id)
        .then((res) => {
          alert(res.data.data);
          this.getPosts();
        })
        .catch((errors) => {
          alert(errors);
        });
    },
  },
};
</script>
