<template>
    <Head>
        <title>Detail Room - Booking Room</title>
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
                                <span class="font-weight-bold">
                                    Detail Room</span
                                >
                            </div>
                            <div class="card-body">
                                <h1 class="text-center h-12">
                                    {{ room.room_name }}
                                </h1>
                                <img
                                    class="rounded-3 img-fluid"
                                    :src="room.image"
                                    :title="room.room_name"
                                    alt="room img"
                                />
                                <p>{{ room.room_detail }}</p>

                                <div class="row">
                                    <div
                                        class="col-12 d-flex justify-content-between"
                                    >
                                        <div
                                            @click="onBack()"
                                            class="btn btn-secondary shadow-sm rounded-sm"
                                            type="reset"
                                        >
                                            <i
                                                class="fas fa-undo-alt fa-sm"
                                            ></i>
                                            Back
                                        </div>
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
import LayoutDashboard from "../../../../Layouts/Dashboard.vue";

export default {
    layout: LayoutDashboard,

    props: {
        room: Object,
    },

    methods: {
        onBack() {
            window.history.back();
        },
    },
};
</script>
