<template>
    <div>
        <ul class="list-group">
            <li v-for="post in posts"> {{post}}</li>

        </ul>
        <hr>
        <button class="btn btn-warning" @click="load">Update List</button>
    </div>
</template>


<script>
    export default {
        data() {
          return {
              posts: [],
        };
        },
        mounted() {
            this.posts = this.$store.getters.getPosts;
        },
        methods: {
          load() {
              this.$store.dispatch('callApi');
          }
        },
    }
</script>