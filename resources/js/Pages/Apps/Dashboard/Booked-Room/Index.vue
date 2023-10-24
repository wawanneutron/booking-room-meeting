<template>
    <Head>
        <title>Booked Room List - Booking Room Meeting</title>
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
                                    >Booked Room List</span
                                >
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="handleSearch">
                                    <div class="input-group mb-3">
                                        <!-- <Link
                                            href="/apps/products/create"
                                            class="btn btn-primary input-group-text"
                                        >
                                            <i
                                                class="fa fa-plus-circle me-2"
                                            ></i>
                                            NEW</Link
                                        > -->
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
                                            SEARCH
                                        </button>
                                    </div>
                                </form>
                                <table
                                    class="table table-striped table-bordered table-hover"
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col">Booking ID</th>
                                            <th scope="col">Room Name</th>
                                            <th scope="col">Booked Name</th>
                                            <th scope="col">Booked At</th>
                                            <th
                                                scope="col"
                                                class="text-center"
                                                style="width: 20%"
                                            >
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ISOL-0928827</td>
                                            <td>Ruang Meeting LT1 A</td>
                                            <td>Yogi</td>
                                            <td>16 Okt 2023 - 18 Okt 2023</td>
                                            <td class="text-center">
                                                <Link
                                                    href="#"
                                                    class="btn btn-success btn-sm me-2"
                                                    ><i
                                                        class="fa fa-pencil-alt me-1"
                                                    ></i>
                                                    EDIT</Link
                                                >
                                                <Link
                                                    href="#"
                                                    class="btn btn-primary btn-sm me-2"
                                                    ><i
                                                        class="fa fa-eye me-1"
                                                    ></i>
                                                    DETAIL</Link
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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

//import Heade and Link from Inertia
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    //layout
    layout: LayoutDashboard,

    //register components
    components: {
        Head,
        Link,
    },
};
</script>

<style></style>
