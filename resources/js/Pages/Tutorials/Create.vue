<template>
    <div>
        <h1>Crear Tutorial</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="title">Título</label>
                <input type="text" v-model="form.title" required />
            </div>
            <div>
                <label for="content">Contenido</label>
                <textarea v-model="form.content" required></textarea>
            </div>
            <button type="submit">Crear</button>
        </form>
    </div>
</template>

<script>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    setup() {
        const form = useForm({
            title: "",
            content: "",
        });

        const submit = () => {
            form.post(route("tutoriales.store"));
        };

        return { form, submit };
    },
};
</script>
