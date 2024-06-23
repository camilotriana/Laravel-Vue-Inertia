<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const form = useForm({
    name: null,
    email: null,
    password: null,
});

function submit() {
    form.post(route("user.store"), {
        onSuccess: () => {
            Swal.fire({
                title: "Usuario creado exitosamente",
                icon: "success",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#198754",
            });
        },
    });
}
</script>

<template>
    <AppLayout title="Add Users">
        <template #header>
            <div class="flex flex-wrap justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Add Users
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
                    <form @submit.prevent="submit()">
                        <div class="flex flex-wrap">
                            <div class="w-full p-2">
                                <InputLabel for="name" value="Nombre" />
                                <TextInput
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autofocus
                                    placeholder="Ingrese su nombre"
                                />
                                <InputError
                                    class="mt-1"
                                    :message="form.errors.name"
                                />
                            </div>
                            <div class="w-full p-2">
                                <InputLabel for="email" value="Correo" />
                                <TextInput
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    placeholder="Ingrese su correo"
                                />
                                <InputError
                                    class="mt-1"
                                    :message="form.errors.email"
                                />
                            </div>
                            <div class="w-full p-2">
                                <InputLabel for="password" value="Contraseña" />
                                <TextInput
                                    id="password"
                                    v-model="form.password"
                                    type="password"
                                    class="mt-1 block w-full"
                                    placeholder="Ingrese su contraseña"
                                />
                                <InputError
                                    class="mt-1"
                                    :message="form.errors.password"
                                />
                            </div>
                            <div
                                class="w-full flex flex-wrap justify-center p-2"
                            >
                                <button
                                    type="submit"
                                    class="flex items-center bg-slate-700 hover:bg-slate-900 rounded py-2 px-4 text-white"
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
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
