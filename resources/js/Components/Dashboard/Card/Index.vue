<template>
    <div>
        <div class="card my-4">
            <div class="pointer">
                <img
                    :src="room.image"
                    height="160"
                    class="card-img-top"
                    alt="image-sk"
                />
                <div class="card-body pt-2 pb-4 px-2">
                    <div class="pointer">
                        <h5 class="card-title">{{ room.room_name }}</h5>
                        <p class="card-text">
                            {{ room.room_detail }}
                        </p>
                    </div>
                </div>
            </div>
            <div
                v-if="isLogin"
                class="footer-card d-flex justify-content-end pb-2 pr-2"
            >
                <Link
                    :href="`/admin/manage-room/${room.id}/edit`"
                    class="btn btn-sm btn-primary me-1"
                >
                    <i class="fas fa-edit"></i>
                    edit
                </Link>
                <button
                    @click.prevent="onDelete(room.id)"
                    class="btn btn-sm btn-danger"
                >
                    <i class="fa fa-trash"></i>
                    delete
                </button>
            </div>

            <!-- <Dialog :room="room" /> -->
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import Swal from "sweetalert2";
import { Inertia } from "@inertiajs/inertia";
import Dialog from "../../Dialog/Index.vue";

export default {
    props: {
        room: Object,
    },

    components: {
        Link,
        Dialog,
    },

    setup() {
        const onDelete = (id) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Inertia.delete(`manage-room/${id}`);

                    Swal.fire({
                        title: "Deleted!",
                        text: "Room deleted successfully.",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false,
                    });
                }
            });
        };

        const onDetail = (id) => {
            Inertia.get(`/admin/manage-room/${id}/show`);
        };

        const isLogin = computed(() => {
            return usePage().props.value.auth.user;
        });

        return {
            isLogin,
            onDelete,
            onDetail,
        };
    },
};
</script>

<style>
.pointer {
    cursor: pointer;
    padding: 0;
}
</style>
