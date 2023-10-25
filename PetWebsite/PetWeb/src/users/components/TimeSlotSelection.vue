<template>
    <div class="time-slot-selection">
        <h2>Select a Time Slot:</h2>
        <ul>
            <li v-for="timeSlot in timeSlots" :key="timeSlot">
                <button @click="selectTimeSlot(timeSlot)">{{ timeSlot }}</button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        timeSlots: Array,
    },
    methods: {
        selectTimeSlot(timeSlot) {
            this.$emit('selectTimeSlot', timeSlot);
        },
    },
};
</script>
