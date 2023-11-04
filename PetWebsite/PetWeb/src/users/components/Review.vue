<script setup>
import StarRating from "vue-star-rating";
import axiosClient from "../../admin/axiosClient";
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";
const route = useRoute();
const reviews = ref([]);
onMounted(() => {
    setTimeout(() => {
        axiosClient.get(`/review/${route.params.id}`).then((res) => {
            
            reviews.value = res.data.reviews;
        });
    }, 1500);
});
</script>
<template>
    <div class="p-10">
        <div class="ml-2" >
            <h1 class="text-xl font-bold">Reviews</h1>
        </div>
        <TransitionGroup name="bounce" tag="div" class="instruments">
            <div
            class="card w-96 bg-base-100 shadow-xl mt-8"
            v-for="review in reviews"
            :key="review[0]"
        >
            <div class="card-body">
                <StarRating
                    :star-size="20"
                    :read-only="true"
                    :show-rating="false"
                    :rating="review.star"
                ></StarRating>
                <p>{{ review.review }}</p>
                <div class="card-actions justify-end"></div>
            </div>
        </div>
        </TransitionGroup>
      
    </div>
</template>

<style scoped>
.bounce-enter-active {
  animation: bounce-in 0.5s;
}
.bounce-leave-active {
  animation: bounce-in 0.5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.25);
  }
  100% {
    transform: scale(1);
  }
}
</style>
