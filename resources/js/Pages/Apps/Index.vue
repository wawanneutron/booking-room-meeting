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
        </div>
    </div>
</template>

<script>
import Card from "../../Components/Card.vue";
import Navbar from "../../Components/Navbar.vue";
export default {
    components: {
        Card,
        Navbar,
    },
};
</script>
