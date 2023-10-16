<template>
    <Head>
        <title>Dashboard - Booking Room Meeting</title>
    </Head>

    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <h1>Hello World</h1>
            </div>
        </div>
    </main>
</template>

<script>
//import layout
import LayoutDashboard from "../../../Layouts/Dashboard.vue";

//import Heade and useForm from Inertia
import { Head } from "@inertiajs/inertia-vue3";

export default {
    //layout
    layout: LayoutDashboard,

    //register component
    components: {
        Head,
    },
};
</script>
