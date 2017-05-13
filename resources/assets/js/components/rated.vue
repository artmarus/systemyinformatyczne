<template>
    <div id="rated">
        Rated <star-rating :inline="true" :star-size="20" :read-only="true" :show-rating="false" :rating="rated" :increment="0.01"></star-rating> by our users.
    </div>
</template>

<script>
   export default {
      props: ["rated"],
      methods: {
      },
      data: function () {
          return {
            rating: 0
          }
      }
    };
</script>