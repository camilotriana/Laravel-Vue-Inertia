<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    userV: Object,
});
</script>

<template>
    <AppLayout title="Show User">
        <template #header>
            <div class="flex flex-wrap justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    User
                </h2>
                <Link
                    :href="route('user.index')"
                    class="flex items-center bg-slate-700 text-white hover:bg-slate-900 rounded py-2 px-4"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="size-4 mr-1"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M6 4.75A.75.75 0 0 1 6.75 4h10.5a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 4.75ZM6 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 10Zm0 5.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H6.75a.75.75 0 0 1-.75-.75ZM1.99 4.75a1 1 0 0 1 1-1H3a1 1 0 0 1 1 1v.01a1 1 0 0 1-1 1h-.01a1 1 0 0 1-1-1v-.01ZM1.99 15.25a1 1 0 0 1 1-1H3a1 1 0 0 1 1 1v.01a1 1 0 0 1-1 1h-.01a1 1 0 0 1-1-1v-.01ZM1.99 10a1 1 0 0 1 1-1H3a1 1 0 0 1 1 1v.01a1 1 0 0 1-1 1h-.01a1 1 0 0 1-1-1V10Z"
                            clip-rule="evenodd"
                        />
                    </svg>

                    User List
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="w-full md:w-1/2 mx-auto bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
                >
                    <div class="flex flex-wrap">
                        <div class="w-full sm:w-1/2 p-2">
                            <InputLabel value="Nombre" />
                            <InputLabel :value="userV.name" />
                        </div>
                        <div class="w-full sm:w-1/2 p-2">
                            <InputLabel value="Correo" />
                            <InputLabel :value="userV.email" />
                        </div>
                        <div class="w-full sm:w-1/2 p-2">
                            <InputLabel value="Fecha de creación" />
                            <InputLabel :value="userV.created_at" />
                        </div>
                        <div class="w-full sm:w-1/2 p-2">
                            <InputLabel value="Fecha de actualización" />
                            <InputLabel :value="userV.updated_at" />
                        </div>
                        <div class="w-full flex flex-wrap justify-center p-2 mt-5">
                            <Link
                                :href="route('user.edit', userV.id)"
                                class="flex items-center bg-slate-700 hover:bg-slate-900 rounded py-2 px-4 text-white"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    class="size-4 mr-1"
                                >
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z"
                                    />
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z"
                                    />
                                </svg>

                                Edit User
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
