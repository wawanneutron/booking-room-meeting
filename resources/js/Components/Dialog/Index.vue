<template>
    <div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="modalRoom"
            tabindex="-1"
            aria-labelledby="modalRoomLabel"
            aria-hidden="true"
        >
            <div
                class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
            >
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalRoomLabel">
                            {{ room.room_name }}
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <img
                            :src="room.image"
                            width="360"
                            class="mb-4"
                            alt=""
                        />
                        <p>
                            {{ room.room_detail }}
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        room: Object,
    },
};
</script>
