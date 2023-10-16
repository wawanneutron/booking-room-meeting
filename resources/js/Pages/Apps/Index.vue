<template>
    <div class="container">
        <Navbar />
        <div class="row">
            <!-- <div
                class="col-12 col-md-4 col-lg-3 d-flex justify-content-center"
                v-for="i in 6"
                :key="i"
            >
                <Card />
            </div> -->
            <Datepicker v-model="form.selected_date" range lang="id" />
            {{ form.selected_date }}
        </div>
    </div>
</template>

<script>
import Card from "../../Components/Card.vue";
import Navbar from "../../Components/Navbar.vue";
import "vue-datepicker-ui/lib/vuedatepickerui.css";
import VueDatepickerUi from "vue-datepicker-ui";
import { reactive } from "vue";

export default {
    components: {
        Card,
        Navbar,
        Datepicker: VueDatepickerUi,
    },

    setup() {
        const form = reactive({
            selected_date: [],
        });

        return {
            form,
        };
    },
};
</script>
