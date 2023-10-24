<template>
    <Head>
        <title>Manage Room - Booking Room Meeting</title>
    </Head>
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
                        <div
                            class="card border-0 rounded-3 shadow border-top-purple"
                        >
                            <div class="card-header">
                                <span class="font-weight-bold"
                                    >Room Meeting</span
                                >
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="onSearch()">
                                    <div class="input-group mb-3">
                                        <Link
                                            href="/admin/manage-room/create"
                                            class="btn btn-primary input-group-text"
                                        >
                                            <i
                                                class="fa fa-plus-circle me-2"
                                            ></i>
                                            New</Link
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="search"
                                            placeholder="search by room name..."
                                        />

                                        <button
                                            class="btn btn-primary input-group-text"
                                            type="submit"
                                        >
                                            <i class="fa fa-search me-2"></i>
                                            Search
                                        </button>
                                    </div>
                                </form>

                                <!-- card manage room -->
                                <div class="row">
                                    <div
                                        v-for="(item, index) of rooms.data"
                                        :key="index"
                                        class="col col-12 col-md-6 col-lg-4"
                                    >
                                        <Link
                                            :href="`/admin/manage-room/${item.id}`"
                                            class="text-decoration-none text-dark"
                                        >
                                            <CardRoom :room="item" />
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import { ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import LayoutDashboard from "../../../../Layouts/Dashboard.vue";
import Card from "../../../../Components/Dashboard/Card/Index.vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    //layout
    layout: LayoutDashboard,

    //register components
    components: {
        Head,
        Link,
        CardRoom: Card,
    },

    props: {
        rooms: Object,
    },

    setup() {
        const search = ref(
            "" || new URL(document.location).searchParams.get("q")
        );

        const onSearch = () => {
            Inertia.get("manage-room", {
                q: search.value,
            });
        };

        return {
            search,
            onSearch,
        };
    },
};
</script>

<style></style>
