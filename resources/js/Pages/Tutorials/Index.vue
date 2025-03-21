<template>
    <div>
        <h1>Tutoriales</h1>
        <div>
            <ul>
                <li v-for="tutorial in tutoriales" :key="tutorial.id">
                    <a :href="route('tutoriales.edit', tutorial.id)">{{
                        tutorial.title
                    }}</a>
                </li>
            </ul>
        </div>
        <div>
            <Link href="/tutoriales/create">Crear Tutorial</Link>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        tutoriales: Array,
    },
};
</script>
