<template>
    <Head>
        <title>Edit Room - Booking Room</title>
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
                                <span class="font-weight-bold"> EDIT ROOM</span>
                            </div>
                            <div class="card-body">
                                <!-- form -->
                                <form @submit.prevent="onUpdate()">
                                    <div class="mb-3">
                                        <div
                                            class="d-flex justify-content-center"
                                        >
                                            <img
                                                :src="room.image"
                                                alt="room image"
                                                width="360"
                                                height="200"
                                                class="rounded-3 mb-3"
                                            />
                                        </div>
                                        <input
                                            class="form-control"
                                            @input="
                                                form.image =
                                                    $event.target.files[0]
                                            "
                                            @change="onChange"
                                            :class="{
                                                'is-invalid': errors.image,
                                            }"
                                            type="file"
                                        />
                                    </div>
                                    <div
                                        v-if="errors.image"
                                        class="alert alert-danger"
                                    >
                                        {{ errors.image }}
                                    </div>

                                    <div class="mb-3">
                                        <label class="fw-bold">Room Name</label>
                                        <input
                                            class="form-control"
                                            v-model="form.room_name"
                                            :class="{
                                                'is-invalid': errors.room_name,
                                            }"
                                            type="text"
                                            placeholder="Room name"
                                        />
                                    </div>
                                    <div
                                        v-if="errors.title"
                                        class="alert alert-danger"
                                    >
                                        {{ errors.room_name }}
                                    </div>

                                    <div class="mb-3">
                                        <label class="fw-bold"
                                            >Room Detail</label
                                        >
                                        <textarea
                                            class="form-control"
                                            v-model="form.room_detail"
                                            :class="{
                                                'is-invalid':
                                                    errors.room_detail,
                                            }"
                                            type="text"
                                            rows="4"
                                            placeholder="Room detail"
                                        ></textarea>
                                    </div>
                                    <div
                                        v-if="errors.room_detail"
                                        class="alert alert-danger"
                                    >
                                        {{ errors.room_detail }}
                                    </div>

                                    <div class="row">
                                        <div
                                            class="col-12 d-flex justify-content-between"
                                        >
                                            <Link
                                                @click="onBack()"
                                                class="btn btn-secondary shadow-sm rounded-sm"
                                                type="reset"
                                            >
                                                <i
                                                    class="fas fa-undo-alt fa-sm"
                                                ></i>
                                                Back
                                            </Link>
                                            <div>
                                                <button
                                                    class="btn btn-danger shadow-sm rounded-sm"
                                                    type="reset"
                                                >
                                                    <i
                                                        class="fas fa-broom fa-sm"
                                                    ></i>
                                                    Reset
                                                </button>
                                                <button
                                                    class="btn btn-primary shadow-sm rounded-sm ms-3"
                                                    type="submit"
                                                >
                                                    <i class="fas fa-save"></i>
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
//import layout
import LayoutDashboard from "../../../../Layouts/Dashboard.vue";
import Swal from "sweetalert2";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { reactive } from "vue";

export default {
    //layout
    layout: LayoutDashboard,

    //register components
    components: {
        Head,
        Link,
    },

    props: {
        errors: Object,
        room: Object,
    },

    setup(props) {
        const form = reactive({
            image: props.room.image,
            room_name: props.room.room_name,
            room_detail: props.room.room_detail,
        });

        const onUpdate = () => {
            Inertia.post(
                `/admin/manage-room/${props.room.id}`,
                {
                    _method: "PUT",
                    image: form.image,
                    room_name: form.room_name,
                    room_detail: form.room_detail,
                },
                {
                    onSuccess: () => {
                        Swal.fire({
                            title: "Success!",
                            text: "Room updated successfully.",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    },
                }
            );
        };

        return {
            form,
            onUpdate,
        };
    },

    methods: {
        onChange() {
            console.log(this.form.image);
        },

        onBack() {
            window.history.back();
        },
    },
};
</script>
