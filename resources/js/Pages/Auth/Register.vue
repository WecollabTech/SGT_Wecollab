<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Header from "@/Vistas/Header.vue";
import Footer from "@/Vistas/Footer.vue";

const form = useForm({
    name: "",
    apellido: "",
    email: "",
    phone: "",
    password: "",
    password_confirmation: "",
    terms: false,
    status: "",
    direccion: "",
    fotoperfil: "", // Ahora es una cadena en lugar de un archivo
    telefono: "",
});

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.fotoperfil = URL.createObjectURL(file); // Solo para vista previa
        // Si necesitas guardar la URL en la base de datos, aquí debes subir el archivo a Firebase o tu backend
    }
};

const submit = () => {
    form.post(route("register"), {
        onFinish: () => {
            console.log(form.errors); // Muestra errores en consola
            form.reset("password", "password_confirmation");
        },
    });
};
</script>

<template>
    <Header :isLoginPage="true" :canLogin="true" :canRegister="true" />
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Nombre -->
                <div>
                    <InputLabel for="name" value="Nombre" />
                    <TextInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <!-- Apellido -->
                <div>
                    <InputLabel for="apellido" value="Apellido" />
                    <TextInput
                        id="apellido"
                        v-model="form.apellido"
                        type="text"
                        class="mt-1 block w-full"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors.apellido" />
                </div>

                <!-- Estado -->
                <div>
                    <InputLabel for="status" value="Estado" />
                    <select
                        id="status"
                        v-model="form.status"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        required
                    >
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.status" />
                </div>

                <!-- Correo Electrónico -->
                <div>
                    <InputLabel for="email" value="Correo Electrónico" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full"
                        required
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div>
                    <InputLabel for="direccion" value="Dirección" />
                    <TextInput
                        id="direccion"
                        v-model="form.direccion"
                        type="text"
                        class="mt-1 block w-full"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors.direccion" />
                </div>

                <!-- Teléfono -->
                <div>
                    <InputLabel for="telefono" value="Teléfono" />
                    <TextInput
                        id="telefono"
                        v-model="form.telefono"
                        type="text"
                        class="mt-1 block w-full"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors.telefono" />
                </div>

                <!-- Contraseña -->
                <div>
                    <InputLabel for="password" value="Contraseña" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <!-- Confirmar Contraseña -->
                <div>
                    <InputLabel
                        for="password_confirmation"
                        value="Confirmar Contraseña"
                    />
                    <TextInput
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        required
                        autocomplete="new-password"
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>

                <div>
                    <InputLabel for="fotoperfil" value="Subir Foto de Perfil" />
                    <input
                        id="fotoperfil"
                        type="file"
                        class="mt-1 block w-full"
                        @change="handleFileUpload"
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.fotoperfil"
                    />
                </div>

                <!-- Términos y Política de Privacidad -->
                <div
                    v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
                    class="col-span-2"
                >
                    <InputLabel for="terms">
                        <div class="flex items-center">
                            <Checkbox
                                id="terms"
                                v-model:checked="form.terms"
                                name="terms"
                                required
                            />
                            <div class="ms-2">
                                Acepto los
                                <a
                                    target="_blank"
                                    :href="route('terms.show')"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Términos de Servicio
                                </a>
                                y la
                                <a
                                    target="_blank"
                                    :href="route('policy.show')"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Política de Privacidad
                                </a>
                            </div>
                        </div>
                        <InputError class="mt-2" :message="form.errors.terms" />
                    </InputLabel>
                </div>
            </div>

            <!-- Enlace a login y botón de registro -->
            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    ¿Ya estás registrado?
                </Link>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Registrar
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
    <Footer style="margin-top: 20px" />
</template>
