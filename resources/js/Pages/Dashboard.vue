<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import DashboardInfo from "@/Components/DashboardInfo.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            Dashboard
            <!-- El título heredará los estilos del <h2> en AppLayout -->
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="mt-6 bg-white border border-gray-200 shadow-xl rounded-lg p-6 z-10"
                >
                    <Welcome />
                    <!-- Agregar el nuevo componente DashboardInfo -->
                    <DashboardInfo />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
