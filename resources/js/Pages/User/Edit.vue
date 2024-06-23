<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const props = defineProps({
    userE: Object,
});

const form = useForm({
    name: props.userE.name,
    email: props.userE.email,
});

function submit() {
    form.put(route("user.update", props.userE.id), {
        onSuccess: () => {
            Swal.fire({
                title: "Usuario actualizado correctamente",
                icon: "success",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#198754",
            });
        },
    });
}
</script>

<template>
    <AppLayout title="Edit User">
        <template #header>
            <div class="flex flex-wrap justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Edit User {{userE.id}}
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
                                            fill-rule="evenodd"
                                            d="M4.25 2A2.25 2.25 0 0 0 2 4.25v11.5A2.25 2.25 0 0 0 4.25 18h11.5A2.25 2.25 0 0 0 18 15.75V4.25A2.25 2.25 0 0 0 15.75 2H4.25ZM6 13.25V3.5h8v9.75a.75.75 0 0 1-1.064.681L10 12.576l-2.936 1.355A.75.75 0 0 1 6 13.25Z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>

                                    Save User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
