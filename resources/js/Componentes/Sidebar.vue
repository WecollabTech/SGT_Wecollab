<template>
    <aside
        :class="{
            'bg-white text-black': isMobile,
            'bg-[#140b5c] text-white': !isMobile,
        }"
        class="w-64 min-h-screen flex-shrink-0 shadow-lg fixed inset-y-0 left-0 overflow-y-auto transition-transform duration-300 transform"
    >
        <div class="p-6">
            <a
                :href="route('dashboard')"
                :active="route().current('dashboard')"
            >
                <div
                    class="logo-container flex items-center"
                    style="margin-top: -1px"
                >
                    <img
                        src="/img/logo.png"
                        alt="Atrápalo"
                        class="logo h-8 w-auto mr-2"
                    />
                    <div class="text-2xl font-semibold">SISTEMAGT</div>
                </div>
            </a>

            <hr class="border-write-500 opacity-50 my-2" />

            <ul class="mt-6 space-y-2">
                <!-- Dashboard -->
                <li>
                    <NavLink
                        :href="route('dashboard')"
                        :active="route().current('dashboard')"
                        class="menu-item"
                        :class="{
                            'text-black': isMobile,
                            'text-white': !isMobile,
                        }"
                    >
                        <i class="fas fa-tachometer-alt text-lg"></i>
                        <span>Dashboard</span>
                    </NavLink>
                </li>

                <!-- Profile -->
                <!-- <li>
                    <NavLink
                        :href="route('profile.show')"
                        :active="route().current('profile.show')"
                        class="menu-item"
                        :class="{
                            'text-black': isMobile,
                            'text-white': !isMobile,
                        }"
                    >
                        <i class="fas fa-user text-lg"></i>
                        <span>Profile</span>
                    </NavLink>
                </li> -->

                <hr class="border-write-500 opacity-50 my-4" />

                <!-- Tutoriales -->
                <li>
                    <div
                        class="menu-header"
                        @click="toggleSubmenu('tutorial')"
                        :class="{
                            'text-black': isMobile,
                            'text-white': !isMobile,
                        }"
                    >
                        <div class="flex items-center gap-3">
                            <i class="fas fa-columns"></i>
                            <span>Tutorial</span>
                        </div>
                        <i
                            class="fas fa-chevron-down transition-transform duration-300"
                            :class="{ 'rotate-180': isSubmenuOpen.tutorial }"
                        ></i>
                    </div>
                    <ul v-if="isSubmenuOpen.tutorial" class="submenu">
                        <li>
                            <NavLink
                                href="#"
                                class="submenu-item"
                                :class="{
                                    'text-black': isMobile,
                                    'text-white': !isMobile,
                                }"
                            >
                                <i class="fas fa-layer-group"></i>
                                Categorias
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                href="#"
                                class="submenu-item"
                                :class="{
                                    'text-black': isMobile,
                                    'text-white': !isMobile,
                                }"
                            >
                                <i class="fas fa-eye"></i>
                                Capacitación
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                href="#"
                                class="submenu-item"
                                :class="{
                                    'text-black': isMobile,
                                    'text-white': !isMobile,
                                }"
                            >
                                <i class="fas fa-bars"></i>
                                Comentarios
                            </NavLink>
                        </li>
                    </ul>
                </li>

                <!-- Repite el mismo patrón para los demás menús y submenús -->
                <!-- Usuarios -->
                <li>
                    <div
                        class="menu-header"
                        @click="toggleSubmenu('usuarios')"
                        :class="{
                            'text-black': isMobile,
                            'text-white': !isMobile,
                        }"
                    >
                        <div class="flex items-center gap-3">
                            <i class="fas fa-users"></i>
                            <span>Usuarios</span>
                        </div>
                        <i
                            class="fas fa-chevron-down transition-transform duration-300"
                            :class="{ 'rotate-180': isSubmenuOpen.usuarios }"
                        ></i>
                    </div>
                    <ul v-if="isSubmenuOpen.usuarios" class="submenu">
                        <li>
                            <NavLink
                                href="#"
                                class="submenu-item"
                                :class="{
                                    'text-black': isMobile,
                                    'text-white': !isMobile,
                                }"
                            >
                                <i class="fas fa-user-plus"></i>
                                Crear Usuario
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                href="#"
                                class="submenu-item"
                                :class="{
                                    'text-black': isMobile,
                                    'text-white': !isMobile,
                                }"
                            >
                                <i class="fas fa-user-edit"></i>
                                Editar Usuario
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                href="#"
                                class="submenu-item"
                                :class="{
                                    'text-black': isMobile,
                                    'text-white': !isMobile,
                                }"
                            >
                                <i class="fas fa-user-times"></i>
                                Eliminar Usuario
                            </NavLink>
                        </li>
                    </ul>
                </li>

                <!-- Configuracion -->
                <li>
                    <div
                        class="menu-header"
                        @click="toggleSubmenu('configuracion')"
                        :class="{
                            'text-black': isMobile,
                            'text-white': !isMobile,
                        }"
                    >
                        <div class="flex items-center gap-3">
                            <i class="fab fa-bootstrap"></i>
                            <span>Configuracion</span>
                        </div>
                        <i
                            class="fas fa-chevron-down transition-transform duration-300"
                            :class="{
                                'rotate-180': isSubmenuOpen.configuracion,
                            }"
                        ></i>
                    </div>
                    <ul v-if="isSubmenuOpen.configuracion" class="submenu">
                        <li>
                            <NavLink
                                href="/permisos"
                                class="submenu-item"
                                :class="{
                                    'text-black': isMobile,
                                    'text-white': !isMobile,
                                }"
                            >
                                <i class="fas fa-exclamation-circle"></i>
                                Permisos
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                href="/roles"
                                class="submenu-item"
                                :class="{
                                    'text-black': isMobile,
                                    'text-white': !isMobile,
                                }"
                            >
                                <i class="fas fa-user-shield"></i>
                                Roles
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                href="#"
                                class="submenu-item"
                                :class="{
                                    'text-black': isMobile,
                                    'text-white': !isMobile,
                                }"
                            >
                                <i class="fas fa-map-signs"></i>
                                Reportes
                            </NavLink>
                        </li>
                    </ul>
                </li>

                <!-- User Menu -->
                <li>
                    <div
                        class="menu-header"
                        @click="toggleSubmenu('userMenu')"
                        :class="{
                            'text-black': isMobile,
                            'text-white': !isMobile,
                        }"
                    >
                        <div class="flex items-center gap-3">
                            <i class="fas fa-user-circle text-lg"></i>
                            <span>Mi Cuenta</span>
                        </div>
                        <i
                            class="fas fa-chevron-down transition-transform duration-300"
                            :class="{ 'rotate-180': isSubmenuOpen.userMenu }"
                        ></i>
                    </div>
                    <ul v-if="isSubmenuOpen.userMenu" class="submenu">
                        <li>
                            <NavLink
                                :href="route('profile.show')"
                                class="submenu-item"
                                :class="{
                                    'text-black': isMobile,
                                    'text-white': !isMobile,
                                }"
                            >
                                <i class="fas fa-user text-lg"></i>
                                <span>Perfil</span>
                            </NavLink>
                        </li>
                        <li v-if="$page.props.jetstream.hasApiFeatures">
                            <NavLink
                                :href="route('api-tokens.index')"
                                class="submenu-item"
                                :class="{
                                    'text-black': isMobile,
                                    'text-white': !isMobile,
                                }"
                            >
                                <i class="fas fa-key text-lg"></i>
                                <span>API Tokens</span>
                            </NavLink>
                        </li>
                        <li>
                            <form @submit.prevent="logout">
                                <NavLink
                                    as="button"
                                    class="submenu-item"
                                    :class="{
                                        'text-black': isMobile,
                                        'text-white': !isMobile,
                                    }"
                                >
                                    <i
                                        class="fas fa-right-from-bracket text-lg"
                                    ></i>
                                    <span>Cerrar Sesión</span>
                                </NavLink>
                            </form>
                        </li>
                    </ul>
                </li>
                <!-- <UserMenu
                    :class="{
                        'hidden md:block': !isSidebarOpen,
                        block: isSidebarOpen,
                    }"
                /> -->
            </ul>
        </div>
    </aside>
</template>

<script setup>
import { ref } from "vue";
import NavLink from "@/Components/NavLink.vue";
import { router } from "@inertiajs/vue3";
import UserMenu from "./UserMenu.vue";

const isSubmenuOpen = ref({
    tutorial: false,
    usuarios: false,
    configuracion: false,
    userMenu: false,
});

const toggleSubmenu = (menu) => {
    isSubmenuOpen.value[menu] = !isSubmenuOpen.value[menu];
};

const logout = () => {
    router.post(route("logout"));
};

defineProps({
    isOpen: {
        type: Boolean,
        required: true,
    },
    isMobile: {
        type: Boolean,
        default: false,
    },
});

const navigateToRoles = () => {
    router.visit(route("roles"));
};
</script>

<style scoped>
.menu-item,
.submenu-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    transition: background-color 0.2s, color 0.2s;
}

.menu-item:hover,
.submenu-item:hover {
    background-color: #4caf50;
    color: white;
}

.menu-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.75rem;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: background-color 0.2s;
}

.menu-header:hover {
    background-color: #4caf50;
}

.submenu {
    padding-left: 1.5rem;
    margin-top: 0.5rem;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.rotate-180 {
    transform: rotate(180deg);
}
</style>
