<template>
    <div id="rating">
        <h3>Rate</h3>
        <star-rating :star-size="20" :show-rating="false" @rating-selected="setRating" :read-only="isRated()"></star-rating>
    </div>
</template>

<script>
   export default {
      props: ["photo"],
      methods: {
        isRated: function() {
          return this.rating > 0;
        },
        setRating: function(rating) {
          axios.post("/rate/store", {photo: this.photo, rate: rating})
            .then(response => this.rating = rating)
            .catch(response => console.log(response.data));
        }
      },
      data: function () {
          return {
            rating: 0,
          }
      }
    };
</script>