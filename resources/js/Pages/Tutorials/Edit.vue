<template>
    <div>
        <h1>Editar Tutorial</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="title">Título</label>
                <input type="text" v-model="form.title" required />
            </div>
            <div>
                <label for="content">Contenido</label>
                <textarea v-model="form.content" required></textarea>
            </div>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</template>

<script>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    props: {
        tutorial: Object,
    },
    setup(props) {
        const form = useForm({
            title: props.tutorial.title,
            content: props.tutorial.content,
        });

        const submit = () => {
            form.put(route("tutoriales.update", props.tutorial.id));
        };

        return { form, submit };
    },
};
</script>
