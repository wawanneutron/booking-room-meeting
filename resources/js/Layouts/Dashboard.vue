<template>
    <div class="c-app">
        <div
            class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show"
            id="sidebar"
        >
            <!-- <div
                class="c-sidebar-brand d-lg-down-none"
                style="background: #894b9d"
            >
                <img
                  src="/images/cash-machine.png"
                  class="bg-light rounded shadow-sm p-1"
                  width="35"
              />
                <span class="ml-2 font-weight-bold">Booking Room</span>
            </div> -->

            <!-- sidebar -->
            <Sidebar />
            <!-- end sidebar -->
        </div>
        <div class="c-wrapper c-fixed-components">
            <!-- header -->
            <Header />
            <!-- end header -->

            <div class="c-body">
                <!-- content -->
                <slot />
                <!-- end content -->

                <footer class="c-footer">
                    <div>
                        <p class="footer-coppyright">
                            <strong>Booking Room</strong> - PT Infra Solusi
                            Indonesia (i-Solution) © {{ yearNow }} All Rights
                            Reserved
                        </p>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
import Header from "../Components/Dashboard/Header.vue";
import Sidebar from "../Components/Dashboard/Sidebar.vue";
import { computed } from "vue";

export default {
    //register components
    components: {
        Header,
        Sidebar,
    },

    setup() {
        const yearNow = computed(() => {
            return new Date().getFullYear();
        });

        return {
            yearNow,
        };
    },
};
</script>

<style lang="css" scoped>
.footer-coppyright {
    margin-bottom: 0;
    font-size: 14px;
}
</style>
