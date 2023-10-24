<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb rounded-2">
                <li class="breadcrumb-item">
                    <Link href="/" class="text-dark text-bold">Home</Link>
                </li>
                <li
                    class="breadcrumb-item active text-black-50"
                    aria-current="page"
                >
                    Detail Room
                </li>
            </ol>
        </nav>

        <div class="card rounded-3 p-4 mt-4">
            <h2 class="text-center h-12">{{ room.room_name }}</h2>
            <div class="d-flex justify-content-center mt-4 mb-3">
                <img
                    :src="room.image"
                    :title="room.room_name"
                    class="rounded-3 img-fluid"
                    alt="room img"
                />
            </div>
            <p>{{ room.room_detail }}</p>
        </div>

        <div class="row mt-4">
            <VueDatePicker
                v-model="form.selected_date"
                locale="id"
                range
            ></VueDatePicker>
        </div>
    </div>
</template>

<script>
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import { reactive } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        VueDatePicker,
        Link,
    },

    props: {
        room: Object,
    },

    setup() {
        const startDate = new Date();
        const endDate = new Date(new Date().setDate(startDate.getDate() + 7));

        const form = reactive({
            selected_date: [startDate, endDate],
        });

        return {
            form,
        };
    },
};
</script>

<style>
.breadcrumb {
    background-color: #ebedef;
    color: #fff !important;
    padding: 20px;
}

.breadcrumb .breadcrumb-item {
    font-size: 20px;
}
</style>
