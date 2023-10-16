<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <Link class="navbar-brand text-dark" href="/"
                    >Booking Room</Link
                >
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <Link
                    v-if="!isLogin"
                    class="btn btn-primary"
                    href="/admin/login"
                >
                    Login
                </Link>
                <ul v-if="isLogin" class="c-header-nav ml-auto mr-4">
                    <li class="c-header-nav-item dropdown">
                        <a
                            class="c-header-nav-link"
                            data-toggle="dropdown"
                            href="#"
                            role="button"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <div class="c-avatar">
                                <img
                                    class="c-avatar-img"
                                    :src="`https://ui-avatars.com/api/?name=${$page.props.auth.user.name}&amp;background=4e73df&amp;color=ffffff&amp;size=100`"
                                />
                            </div>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-right pt-0 mb-0 pb-0"
                        >
                            <Link
                                href="/admin/dashboard"
                                as="button"
                                class="dropdown-item"
                                role="button"
                            >
                                <i class="fas fa-home"></i>
                                Dashboard
                            </Link>

                            <Link
                                href="/admin/logout"
                                method="POST"
                                as="button"
                                class="dropdown-item"
                                role="button"
                            >
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </Link>
                        </div>
                    </li>
                </ul>

                <!-- <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                aria-current="page"
                                href="#"
                                >Home</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true"
                                >Disabled</a
                            >
                        </li>
                    </ul>
                </div> -->
            </div>
        </nav>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { usePage } from "@inertiajs/inertia-vue3";
import { onMounted, computed } from "vue";

export default {
    components: {
        Link,
    },

    methods: {
        onLogin() {
            window.open("/admin/login");
        },
    },

    setup() {
        const isLogin = computed(() => {
            return usePage().props.value.auth.user;
        });

        onMounted(() => {
            console.log(isLogin.value);
        });

        return {
            isLogin,
        };
    },
};
</script>
