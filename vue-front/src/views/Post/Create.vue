<template>
  <div class="edit-posts">
    <div class="main-posts">
      <div class="main-title">
        <h2>{{ pageTitle }}</h2>
      </div>
      <div class="main-content">
        <div>
          <h4>Title</h4>
          <input type="text" v-model="model.post.title" />
          <p v-if="validationErrors.title" class="error">
            {{ validationErrors.title }}
          </p>
        </div>
        <div>
          <h4>Body</h4>
          <input type="text" v-model="model.post.body" />
          <p v-if="validationErrors.body" class="error">
            {{ validationErrors.body }}
          </p>
        </div>
        <div>
          <h4>Type</h4>
          <input type="text" v-model="model.post.type" />
          <p v-if="validationErrors.type" class="error">
            {{ validationErrors.type }}
          </p>
        </div>
      </div>
      <button type="button" @click="savePost">Add</button>
    </div>
    <div class="main-errors">
      <div class="errors" v-if="Object.keys(this.errorList).length > 0">
        <div v-for="(error, index) in this.errorList" :key="index">
          <div class="errors-div" v-for="(error, index) in error" :key="index">
            <li>{{ error }}</li>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.edit-posts {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 70vh;
  position: relative;
}
.main-posts {
  padding: 15px;
  box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.5);
  background-color: #fff;
  border-radius: 8px;
}
.main-title h2 {
  text-align: center;
}
.main-content h4 {
  margin: 5px 0;
}
.main-errors {
  display: flex;
}
.errors {
  margin: 15px;
  background-color: rgb(235, 99, 99);
  padding: 5px;
  position: absolute;
  left: 0;
  right: 0;
  margin-left: auto;
  margin-right: auto;
  width: 450px;
}
.errors-div li {
  color: #fff;
  padding: 5px;
  font-size: 16px;
}
.error {
  background-color: red;
  padding: 5px;
  margin: 0px;
  color: #fff;
  font-size: 12px;
  text-align: center;
}
/* Make inputs responsive */
.edit-posts input[type="text"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

/* Make button responsive */
.edit-posts button[type="button"] {
  background-color: #4caf50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
  margin-top: 10px;
}
.edit-posts button[type="button"]:hover {
  background-color: #0d771d;
}
/* Style error messages */
.edit-posts ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

/* Responsive styles for small screens */
@media screen and (max-width: 600px) {
  .edit-posts input[type="text"],
  .edit-posts button[type="button"] {
    width: 100%;
  }
}
@media (max-width: 600px) {
  .errors {
    width: 358px;
  }
}
@media (max-width: 300px) {
  .errors {
    width: 200px;
  }
}
</style>
<script>
import axios from "axios";
export default {
  name: "postCreate",
  data() {
    return {
      errorList: "",
      model: {
        post: {
          title: "",
          body: "",
          type: "",
        },
      },
      validationErrors: {
        title: "",
        body: "",
        type: "",
      },
    };
  },
  computed: {
    pageTitle() {
      const id = this.$route.params.postId;
      return id ? "Edit Post" : "Create Post";
    },
    isFormValid() {
      return Object.values(this.validationErrors).every((error) => !error);
    },
  },
  created() {
    const id = this.$route.params.postId;
    if (id) {
      this.loadPost(id);
    }
  },
  methods: {
    loadPost(id) {
      var mythis = this;
      axios
        .get("http://localhost:8000/api/v1/posts/" + id)
        .then((res) => {
          const { title, body, type } = res.data.data;
          this.model.post = {
            title: title,
            body: body,
            type: type,
          };
          this.errorList = "";
        })
        .catch((errors) => {
          mythis.errorList = errors.response.data.errors;
        });
    },
    verification(){
      this.validationErrors = {
        title: "",
        body: "",
        type: "",
      };

      // Perform field validation
      if (!this.model.post.title) {
        this.validationErrors.title = "Title is required";
      }
      if (!this.model.post.body) {
        this.validationErrors.body = "Body is required";
      }
      if (!this.model.post.type) {
        this.validationErrors.type = "Type is required";
      }
      return this.isFormValid
    },
    savePost() {
      
      if (this.verification()) {
        const id = this.$route.params.postId;

        const createPost = axios.post;
        const updatePost = axios.patch;

        const apiUrl = "http://localhost:8000/api/v1/posts";
        const url = id ? `${apiUrl}/${id}` : apiUrl;
        const request = id ? updatePost : createPost;

        request(url, this.model.post)
          .then((res) => {
            this.model.post = {
              title: "",
              body: "",
              type: "",
            };
            this.errorList = "";
            this.$router.push("/posts");
          })
          .catch((errors) => {
            this.errorList = errors.response.data.errors;
          });
      }
    },
  },
};
</script>
  