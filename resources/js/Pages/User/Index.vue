<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const props = defineProps({
    listUser: Object,
});

const form = useForm({});

function userDelete(id) {
    Swal.fire({
        text: "¿Esta seguro que desea eliminar el usuario?",
        icon: "warning",
        confirmButtonText: "Eliminar",
        confirmButtonColor: "#dc3545",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route("user.destroy", id), {
                onSuccess: () => {
                    Swal.fire({
                        title: "Usuario eliminado correctamente",
                        icon: "success",
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#198754",
                    });
                },
            });
        }
    });
}
</script>

<template>
    <AppLayout title="Users">
        <template #header>
            <div class="flex flex-wrap justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Users
                </h2>
                <Link
                    :href="route('user.create')"
                    class="flex items-center bg-slate-700 text-white hover:bg-slate-900 rounded py-2 px-4"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="size-4 mr-1"
                    >
                        <path
                            d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z"
                        />
                    </svg>

                    Add User
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="relative overflow-x-auto">
                        <table class="table-auto w-full text-left">
                            <thead
                                class="text-xs text-white uppercase bg-slate-800"
                            >
                                <tr>
                                    <th class="py-3 px-3 rounded-s-lg">ID</th>
                                    <th class="py-3 px-3">Nombre</th>
                                    <th class="py-3 px-3">Correo</th>
                                    <th class="py-3 px-3 rounded-e-lg">
                                        Opciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr
                                    v-for="value in listUser"
                                    :key="value.id"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                >
                                    <td class="py-3 px-3">{{ value.id }}</td>
                                    <td class="py-3 px-3">{{ value.name }}</td>
                                    <td class="py-3 px-3">{{ value.email }}</td>
                                    <td class="py-3 px-3">
                                        <div class="flex flex-wrap">
                                            <Link
                                                :href="
                                                    route('user.show', value.id)
                                                "
                                                class="m-1 text-yellow-400 hover:text-yellow-600"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="size-5"
                                                >
                                                    <path
                                                        d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"
                                                    />
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </Link>
                                            <Link
                                                :href="
                                                    route('user.edit', value.id)
                                                "
                                                class="m-1 text-blue-700 hover:text-blue-900"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="size-5"
                                                >
                                                    <path
                                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z"
                                                    />
                                                    <path
                                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z"
                                                    />
                                                </svg>
                                            </Link>
                                            <a
                                                @click="userDelete(value.id)"
                                                role="button"
                                                class="m-1 text-red-700 hover:text-red-900"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="size-5"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
