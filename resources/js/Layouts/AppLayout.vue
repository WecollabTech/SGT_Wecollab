<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/ApplicationMark.vue";
import Banner from "@/Components/Banner.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import Sidebar from "@/Componentes/Sidebar.vue";
import Buscador from "@/Componentes/Buscador.vue";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const handleResize = () => {
    if (window.innerWidth >= 500) {
        showingNavigationDropdown.value = false; // Oculta el menú en pantallas grandes
    }
};

onMounted(() => {
    window.addEventListener("resize", handleResize);
    handleResize(); // Ejecutar al cargar para verificar el tamaño inicial
});

onUnmounted(() => {
    window.removeEventListener("resize", handleResize);
});

const switchToTeam = (team) => {
    router.put(
        route("current-team.update"),
        {
            team_id: team.id,
        },
        {
            preserveState: false,
        }
    );
};

const logout = () => {
    router.post(route("logout"));
};
</script>

<template>
    <div>
        <Head :title="title" />
        <Banner />

        <div class="min-h-screen bg-gray-100 flex">
            <!-- Sidebar -->
            <Sidebar
                :class="{
                    'hidden md:block': !isSidebarOpen,
                    block: isSidebarOpen,
                }"
            />

            <!-- Contenido principal -->
            <div class="flex-1 md:ml-64">
                <nav
                    class="bg-white border-b"
                    style="background-color: #6c63ff"
                >
                    <!-- Primary Navigation Menu -->
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16 p-8">
                            <div class="flex">
                                <div class="shrink-0 flex items-center">
                                    <Link :href="route('dashboard')">
                                        <img
                                            src="/img/logo.png"
                                            alt="Atrápalo"
                                            class="block md:hidden h-8 w-auto mr-2"
                                        />
                                    </Link>
                                </div>

                                <!-- <div
                                    class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"
                                >
                                    <NavLink
                                        :href="route('dashboard')"
                                        :active="route().current('dashboard')"
                                    >
                                        Inicio
                                    </NavLink>
                                </div> -->
                            </div>

                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                                <!-- Teams Dropdown -->
                                <Dropdown
                                    v-if="$page.props.jetstream.hasTeamFeatures"
                                    align="right"
                                    width="60"
                                    class="z-50"
                                >
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150"
                                            >
                                                {{
                                                    $page.props.auth.user
                                                        .current_team.name
                                                }}
                                                <svg
                                                    class="ms-2 -me-0.5 size-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <div
                                                class="block px-4 py-2 text-xs text-gray-400"
                                            >
                                                Gestionar equipo
                                            </div>

                                            <!-- Team Settings -->
                                            <DropdownLink
                                                :href="
                                                    route(
                                                        'teams.show',
                                                        $page.props.auth.user
                                                            .current_team
                                                    )
                                                "
                                            >
                                                Team Settings
                                            </DropdownLink>

                                            <DropdownLink
                                                v-if="
                                                    $page.props.jetstream
                                                        .canCreateTeams
                                                "
                                                :href="route('teams.create')"
                                            >
                                                Create New Team
                                            </DropdownLink>

                                            <!-- Team Switcher -->
                                            <template
                                                v-if="
                                                    $page.props.auth.user
                                                        .all_teams.length > 1
                                                "
                                            >
                                                <div
                                                    class="border-t border-gray-200"
                                                />
                                                <div
                                                    class="block px-4 py-2 text-xs text-gray-400"
                                                >
                                                    Switch Teams
                                                </div>
                                                <template
                                                    v-for="team in $page.props
                                                        .auth.user.all_teams"
                                                    :key="team.id"
                                                >
                                                    <form
                                                        @submit.prevent="
                                                            switchToTeam(team)
                                                        "
                                                    >
                                                        <DropdownLink
                                                            as="button"
                                                        >
                                                            <div
                                                                class="flex items-center"
                                                            >
                                                                <svg
                                                                    v-if="
                                                                        team.id ==
                                                                        $page
                                                                            .props
                                                                            .auth
                                                                            .user
                                                                            .current_team_id
                                                                    "
                                                                    class="me-2 size-5 text-green-400"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none"
                                                                    viewBox="0 0 24 24"
                                                                    stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                >
                                                                    <path
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                                    />
                                                                </svg>
                                                                <div>
                                                                    {{
                                                                        team.name
                                                                    }}
                                                                </div>
                                                            </div>
                                                        </DropdownLink>
                                                    </form>
                                                </template>
                                            </template>
                                        </div>
                                    </template>
                                </Dropdown>

                                <!-- Texto "HOLA BIENVENIDO" -->
                                <div
                                    class="flex items-center justify-start ml-4"
                                >
                                    <h1
                                        class="text-white font-bold"
                                        style="
                                            font-family: 'Helvetica Neue',
                                                Helvetica, Arial, sans-serif;
                                            font-size: 15px;
                                        "
                                    >
                                        Hola Bienvenido
                                    </h1>
                                </div>

                                <!-- Settings Dropdown -->
                                <div class="ms-3 relative">
                                    <Dropdown
                                        align="right"
                                        width="48"
                                        class="z-[9999] relative"
                                    >
                                        <template #trigger>
                                            <button
                                                v-if="
                                                    $page.props.jetstream
                                                        .managesProfilePhotos
                                                "
                                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition"
                                            >
                                                <img
                                                    class="size-8 rounded-full object-cover"
                                                    :src="
                                                        $page.props.auth.user
                                                            .profile_photo_url
                                                    "
                                                    :alt="
                                                        $page.props.auth.user
                                                            .name
                                                    "
                                                />
                                            </button>
                                            <span
                                                v-else
                                                class="inline-flex rounded-md"
                                            >
                                                <button
                                                    type="button"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150"
                                                >
                                                    {{
                                                        $page.props.auth.user
                                                            .name
                                                    }}
                                                    <svg
                                                        class="ms-2 -me-0.5 size-4"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                                                        />
                                                    </svg>
                                                </button>
                                            </span>
                                        </template>

                                        <template #content>
                                            <!-- Account Management -->
                                            <div
                                                class="block px-4 py-2 text-xs text-gray-400"
                                            >
                                                Administrar cuenta
                                            </div>
                                            <DropdownLink
                                                :href="route('profile.show')"
                                            >
                                                <div
                                                    class="flex items-center gap-x-2"
                                                >
                                                    <i
                                                        class="fas fa-user text-lg"
                                                    ></i>
                                                    <span
                                                        class="font-sans font-bold text-[15px]"
                                                        >Perfil</span
                                                    >
                                                </div>
                                            </DropdownLink>
                                            <DropdownLink
                                                v-if="
                                                    $page.props.jetstream
                                                        .hasApiFeatures
                                                "
                                                :href="
                                                    route('api-tokens.index')
                                                "
                                            >
                                                API Tokens
                                            </DropdownLink>
                                            <div
                                                class="border-t border-gray-200"
                                            />
                                            <form @submit.prevent="logout">
                                                <DropdownLink as="button">
                                                    <div
                                                        class="flex items-center gap-x-2"
                                                    >
                                                        <i
                                                            class="fas fa-right-from-bracket text-lg"
                                                        ></i>
                                                        <span
                                                            class="font-sans font-bold text-[15px]"
                                                            >Cerrar Sesión</span
                                                        >
                                                    </div>
                                                </DropdownLink>
                                            </form>
                                        </template>
                                    </Dropdown>
                                </div>
                            </div>

                            <!-- Hamburger -->
                            <div class="-me-2 flex items-center sm:hidden">
                                <button
                                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                    @click="
                                        showingNavigationDropdown =
                                            !showingNavigationDropdown
                                    "
                                >
                                    <svg
                                        class="size-6"
                                        stroke="currentColor"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            :class="{
                                                hidden: showingNavigationDropdown,
                                                'inline-flex':
                                                    !showingNavigationDropdown,
                                            }"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"
                                        />
                                        <path
                                            :class="{
                                                hidden: !showingNavigationDropdown,
                                                'inline-flex':
                                                    showingNavigationDropdown,
                                            }"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Responsive Navigation Menu -->
                    <div
                        :class="{
                            block: showingNavigationDropdown,
                            hidden: !showingNavigationDropdown,
                        }"
                        class="lg:hidden fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-[100]"
                        @click="showingNavigationDropdown = false"
                    >
                        <div
                            class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-70"
                            @click.stop
                        >
                            <Sidebar
                                :isOpen="showingNavigationDropdown"
                                :isMobile="true"
                            />
                        </div>
                    </div>
                </nav>

                <!-- Page Heading -->
                <header
                    v-if="$slots.header"
                    class="shadow bg-blue-500 border-none -mt-1 z-50 relative"
                >
                    <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                        <h2
                            class="font-semibold text-xl text-white leading-tight"
                        >
                            <slot name="header" />
                        </h2>
                    </div>
                </header>

                <!-- Page Content -->
                <main
                    class="fixed top-16 left-0 md:left-64 right-0 bottom-0 overflow-y-auto p-4 z-40 bg-white"
                >
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
