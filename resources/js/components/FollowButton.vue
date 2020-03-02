<template>
  <div>
    <button @click="followUser" class="btn btn-primary ml-4">Follow</button>
  </div>
</template>

<script>
export default {
  props: ['userId'],
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    followUser() {
      axios.post("/follow/" + this.userId)
            .then(response => {
                console.log(response.data);
            });
    }
  }
};
</script>
