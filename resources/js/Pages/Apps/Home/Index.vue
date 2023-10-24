<template>
    <div class="container">
        <Navbar />

        <div class="row">
            <div
                v-for="(item, index) of rooms"
                :key="index"
                class="col col-12 col-md-6 col-lg-4"
            >
                <Link
                    :href="`/booking-room/${item.id}`"
                    class="text-decoration-none text-dark"
                >
                    <Card :room="item" />
                </Link>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from "../../../Components/Navbar.vue";
import Card from "../../../Components/Dashboard/Card/Index.vue";

import { reactive } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Navbar,
        Card,
        Link,
    },

    props: {
        rooms: Object,
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
