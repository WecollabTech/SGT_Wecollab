<template>
    <header class="header">
        <div class="header-top">
            <div class="logo-container">
                <img src="/img/logo.png" alt="Atrápalo" class="logo" />
                <div class="logo-text">SISTEMAGT</div>
            </div>

            <!-- Barra de navegación superior -->
            <nav class="top-nav">
                <a href="#"><i class="fas fa-search"></i></a>
                <a href="#"><i class="fas fa-briefcase"></i> EMPRESAS</a>
                <a href="#"><i class="fas fa-lightbulb"></i> INSPÍRATE</a>
                <a href="#"><i class="fas fa-question-circle"></i> AYUDA</a>
                <a href="#"><i class="fas fa-user"></i></a>

                <!-- Opciones de login, registro y dashboard -->
                <div v-if="canLogin" class="auth-links">
                    <!-- Si el usuario está logueado, mostrar enlace al Dashboard -->
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </Link>

                    <!-- Si el usuario no está logueado, mostrar "Log in" y "Register" -->
                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            <i class="fas fa-sign-in-alt"></i> Log in
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            <i class="fas fa-user-plus"></i> Register
                        </Link>
                    </template>
                </div>
            </nav>

            <!-- Menú hamburguesa -->
            <div class="hamburger-menu" @click="toggleMenu">
                <i class="fas fa-bars"></i>
            </div>
        </div>

        <div class="header-bottom">
            <nav :class="{ 'main-nav': true, active: isMenuOpen }">
                <a href="#">Vuelos</a>
                <a href="#">Hoteles</a>
                <a href="#">Vuelo+Hotel</a>
                <a href="#">Paquetes</a>
                <a href="#">Cruceros</a>
                <a href="#">Autos</a>
                <a href="#">Entradas</a>
                <a href="#">Actividades</a>
                <a href="#">Giftcard</a>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
    data() {
        return {
            isMenuOpen: false,
            canLogin: true, // Puedes cambiar este valor dependiendo de si el usuario está autenticado
            canRegister: true, // Puedes agregar lógica para habilitar o deshabilitar el registro
        };
    },
    methods: {
        toggleMenu() {
            this.isMenuOpen = !this.isMenuOpen;
        },
    },
};
</script>

<style scoped>
.header {
    background-color: #e60012;
    color: white;
    font-family: Arial, sans-serif;
}

.header-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    flex-wrap: nowrap; /* Asegura que todo esté en una sola fila */
}

.logo-container {
    display: flex;
    align-items: center;
    margin-right: 20px;
}

.logo {
    height: 40px;
}

.logo-text {
    color: white;
    font-weight: bold;
    font-size: 25px;
    margin-left: 10px;
}

.top-nav {
    display: flex;
    gap: 20px;
    margin-right: 20px;
}

.top-nav a {
    color: white;
    text-decoration: none;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.auth-links {
    display: flex;
    align-items: center;
    gap: 15px;
}

.auth-links a {
    display: flex;
    align-items: center;
    gap: 5px;
}

.hamburger-menu {
    display: none;
    cursor: pointer;
    font-size: 30px;
    color: white;
}

.header-bottom {
    background-color: #d60010;
    padding: 10px 0;
}

.main-nav {
    display: flex;
    justify-content: flex-start;
    gap: 20px;
    margin-left: 20px;
}

.main-nav a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
}

/* Responsividad */
@media screen and (max-width: 768px) {
    .header-top {
        flex-direction: row; /* Asegura que todo se mantenga en una sola fila */
        align-items: center;
        text-align: center;
    }

    .logo-text {
        font-size: 20px;
        margin-left: 5px;
    }

    .top-nav {
        display: none; /* Ocultar los enlaces en pantallas pequeñas */
    }

    .hamburger-menu {
        display: block; /* Mostrar el icono del menú hamburguesa */
    }

    .main-nav {
        display: none; /* Escondemos el menú en pantallas pequeñas */
        flex-direction: column;
        gap: 10px;
        text-align: center;
        margin-left: 0;
    }

    .main-nav.active {
        display: flex; /* Mostrar el menú cuando el menú está abierto */
    }

    .main-nav a {
        font-size: 14px;
    }
}
</style>

<template>
    <header class="header">
        <div class="header-top">
            <div class="logo-container">
                <img src="/img/logo.png" alt="Atrápalo" class="logo" />
                <div class="logo-text">SISTEMAGT</div>
            </div>
            <nav class="top-nav">
                <a href="#"><i class="fas fa-search"></i></a>
                <a href="#"><i class="fas fa-briefcase"></i> EMPRESAS</a>
                <a href="#"><i class="fas fa-lightbulb"></i> INSPÍRATE</a>
                <a href="#"><i class="fas fa-question-circle"></i> AYUDA</a>

                <!-- Nuevas opciones basadas en la condición de login -->

                <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        <a href="#"
                            ><i class="fas fa-tachometer-alt"></i> DASHBOARD</a
                        >
                        <!-- Nueva opción -->
                    </Link>

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            <a href="#"
                                ><i class="fas fa-sign-in-alt"></i> INICIO DE
                                SESIÓN</a
                            >
                            <!-- Nueva opción -->
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            <a href="#"
                                ><i class="fas fa-user-plus"></i> REGISTRO</a
                            >
                            <!-- Nueva opción -->
                        </Link>
                    </template>
                </nav>
            </nav>
            <div class="hamburger-menu" @click="toggleMenu">
                <i class="fas fa-bars"></i>
            </div>
        </div>

        <div class="header-bottom">
            <nav :class="{ 'main-nav': true, active: isMenuOpen }">
                <a href="#">Vuelos</a>
                <a href="#">Hoteles</a>
                <a href="#">Vuelo+Hotel</a>
                <a href="#">Paquetes</a>
                <a href="#">Cruceros</a>
                <a href="#">Autos</a>
                <a href="#">Entradas</a>
                <a href="#">Actividades</a>
                <a href="#">Giftcard</a>
            </nav>
        </div>
    </header>
</template>

<!-- <style scoped>
.header {
    background-color: #e60012;
    color: white;
    font-family: Arial, sans-serif;
}

.header-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    flex-wrap: nowrap;
}

.logo-container {
    display: flex;
    align-items: center;
    margin-right: 20px;
}

.logo {
    height: 40px;
}

.logo-text {
    color: white;
    font-weight: bold;
    font-size: 25px;
    margin-left: 10px;
}

.top-nav {
    display: flex;
    gap: 20px;
    margin-right: 20px;
}

.top-nav a {
    color: white;
    text-decoration: none;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.hamburger-menu {
    display: none;
    cursor: pointer;
    font-size: 30px;
    color: white;
}

.header-bottom {
    background-color: #d60010;
    padding: 10px 0;
}

.main-nav {
    display: flex;
    justify-content: flex-start;
    gap: 20px;
    margin-left: 20px;
}

.main-nav a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
}

/* Responsividad */
@media screen and (max-width: 768px) {
    .nav-text {
        display: none; /* Oculta el texto en pantallas pequeñas */
    }

    .header-top {
        flex-direction: row;
        align-items: center;
        text-align: center;
    }

    .logo-text {
        font-size: 20px;
        margin-left: 5px;
    }

    .top-nav {
        display: none;
    }

    .hamburger-menu {
        display: block;
    }

    .main-nav {
        display: none;
        flex-direction: column;
        gap: 10px;
        text-align: center;
        margin-left: 0;
    }

    .main-nav.active {
        display: flex;
    }

    .main-nav a {
        font-size: 14px;
    }

    /* Botones de Login y Registro solo cuando el menú hamburguesa está abierto */
    .header-bottom .hamburger-nav {
        display: block;
        flex-direction: column;
        gap: 10px;
    }

    .header-bottom .hamburger-nav .nav-link {
        text-decoration: none;
        font-size: 14px;
        color: white;
    }
}

/* Estilos para pantallas grandes (mayores a 768px) */
@media screen and (min-width: 500px) {
    .hamburger-menu {
        display: none; /* Oculta el menú hamburguesa en pantallas grandes */
    }

    .main-nav {
        display: flex; /* Muestra las opciones de navegación */
    }

    .header-bottom .hamburger-nav {
        display: none; /* Asegura que los botones de login y registro no se muestren */
    }
}
</style> -->

<!-- <div class="header-bottom" v-show="!isMobile || isMenuOpen">
            <nav
                :class="{ 'main-nav': true, active: isMenuOpen }"
                class="flex space-x-8"
            >
                <a href="#" v-show="!isMobile" class="flex items-center">
                    <i class="fas fa-chalkboard-teacher text-white"></i>
                    <span class="ml-2">Curso de CRM</span>
                </a>
                <a href="#" v-show="!isMobile" class="flex items-center">
                    <i class="fas fa-bullhorn text-white"></i>
                    <span class="ml-2">Marketing Digital</span>
                </a>
                <a href="#" v-show="!isMobile" class="flex items-center">
                    <i class="fas fa-chart-line text-white"></i>
                    <span class="ml-2">Estrategias de Marketing</span>
                </a>
                <a href="#" v-show="!isMobile" class="flex items-center">
                    <i class="fas fa-users text-white"></i>
                    <span class="ml-2">Gestión de Clientes</span>
                </a>
                <a href="#" v-show="!isMobile" class="flex items-center">
                    <i class="fas fa-briefcase text-white"></i>
                    <span class="ml-2">Ventas y CRM</span>
                </a>

   
                <div
                    v-show="isMobile && isMenuOpen"
                    class="flex flex-col ml-4 space-y-6"
                >
                    <a href="#" class="flex items-center">
                        <i class="fas fa-chalkboard-teacher text-white"></i>
                        <span class="ml-2">Curso de CRM</span>
                    </a>
                    <a href="#" class="flex items-center">
                        <i class="fas fa-bullhorn text-white"></i>
                        <span class="ml-2">Marketing Digital</span>
                    </a>
                    <a href="#" class="flex items-center">
                        <i class="fas fa-chart-line text-white"></i>
                        <span class="ml-2">Estrategias de Marketing</span>
                    </a>
                    <a href="#" class="flex items-center">
                        <i class="fas fa-users text-white"></i>
                        <span class="ml-2">Gestión de Clientes</span>
                    </a>
                    <a href="#" class="flex items-center">
                        <i class="fas fa-briefcase text-white"></i>
                        <span class="ml-2">Ventas y CRM</span>
                    </a>

                    
                    <div class="flex items-center space-x-2 mt-4 ml-2">
                        <template v-if="isMobile && isMenuOpen">
                            <AuthButtons
                                :canLogin="canLogin"
                                :canRegister="canRegister"
                            />
                        </template>
                    </div>
                </div>
            </nav>
        </div> -->

<script setup>
import { ref } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import { Navigation, Pagination, Autoplay } from "swiper/modules";

// Importamos los componentes Header y Footer
import Header from "@/Vistas/Header.vue";
import Footer from "@/Vistas/Footer.vue";

// Datos para el formulario de búsqueda de hoteles
const destino = ref("");
const fechaEntrada = ref("");
const fechaSalida = ref("");
const huespedes = ref("1 habitación, 2 huéspedes");

const buscarHoteles = () => {
    console.log(
        "Buscando hoteles en:",
        destino.value,
        fechaEntrada.value,
        fechaSalida.value,
        huespedes.value
    );
};

// Lista de imágenes para el carrusel
const imagenes = [
    "https://assets.turismocity.com/hotelImages/1678977396639_000.jpg",
    "https://assets.turismocity.com/hotelImages/1678977396639_000.jpg",
    "https://assets.turismocity.com/hotelImages/1678977396639_000.jpg",
    "https://assets.turismocity.com/hotelImages/1678977396639_000.jpg",
];

// Datos para el carrusel de tutoriales destacados
const tutoriales = [
    {
        titulo: "Tutorial de Vue.js",
        descripcion: "Aprende los fundamentos de Vue.js",
        imagen: "https://via.placeholder.com/600x300",
    },
    {
        titulo: "Tutorial de React",
        descripcion: "Construye aplicaciones con React",
        imagen: "https://via.placeholder.com/600x300",
    },
    {
        titulo: "Tutorial de Node.js",
        descripcion: "Desarrolla aplicaciones con Node.js",
        imagen: "https://via.placeholder.com/600x300",
    },
];
</script>

<template>
    <div>
        <!-- Header -->
        <Header />

        <!-- Carrusel de imágenes -->
        <main class="relative w-full h-[60vh]">
            <Swiper
                :modules="[Navigation, Pagination, Autoplay]"
                :spaceBetween="0"
                :slidesPerView="1"
                :navigation="true"
                :pagination="{ clickable: true }"
                :autoplay="{ delay: 4000, disableOnInteraction: false }"
                class="w-full h-full"
            >
                <SwiperSlide v-for="(imagen, index) in imagenes" :key="index">
                    <div
                        class="relative w-full h-[60vh] bg-cover bg-center flex items-center justify-center"
                        :style="{ backgroundImage: `url(${imagen})` }"
                    >
                        <div class="absolute inset-0 bg-black/40"></div>

                        <div class="relative z-10 text-center text-white">
                            <h1 class="text-3xl font-bold">
                                BIENVENIDOS A WE COLLAB
                            </h1>
                            <p class="mt-2 text-xl font-semibold">
                                Disfruta de nuestros tutoriales en línea
                            </p>
                        </div>
                    </div>
                </SwiperSlide>
            </Swiper>
        </main>

        <!-- Carrusel de tutoriales destacados -->
        <section class="mt-10">
            <h2 class="text-center text-2xl font-bold mb-6">
                Tutoriales Destacados
            </h2>
            <Swiper
                :modules="[Navigation, Pagination, Autoplay]"
                :spaceBetween="20"
                :slidesPerView="3"
                :navigation="true"
                :pagination="{ clickable: true }"
                :autoplay="{ delay: 4000, disableOnInteraction: false }"
                class="w-full h-full"
            >
                <SwiperSlide
                    v-for="(tutorial, index) in tutoriales"
                    :key="index"
                >
                    <div
                        class="relative w-full bg-white rounded-lg shadow-lg overflow-hidden"
                    >
                        <img
                            :src="tutorial.imagen"
                            alt="Tutorial"
                            class="w-full h-40 object-cover"
                        />
                        <div class="p-4">
                            <h3 class="text-xl font-semibold">
                                {{ tutorial.titulo }}
                            </h3>
                            <p class="mt-2 text-lg">
                                {{ tutorial.descripcion }}
                            </p>
                        </div>
                    </div>
                </SwiperSlide>
            </Swiper>
        </section>

        <!-- Formulario de búsqueda de hoteles -->
        <section class="mt-10 bg-gray-100 p-6 rounded-lg">
            <h3 class="text-center text-xl font-semibold mb-4">
                Buscar Hoteles
            </h3>
        </section>

        <!-- Footer -->
        <Footer />
    </div>
</template>

<!-- <template v-else>
                <div
                    class="flex flex-col sm:flex-row items-center gap-4 ml-[0px]"
                >
                 
                    <Link
                        :href="route('login')"
                        class="flex items-center justify-center text-white sm:border sm:border-white px-4 py-2 rounded-full transition duration-300 ease-in-out hover:bg-green-500 hover:text-white text-lg sm:text-xl space-x-2"
                    >
                        <i class="fas fa-sign-in-alt text-xl"></i>
                        <span class="ml-2 sm:inline-block text-sm sm:text-base"
                            >Iniciar Sesión</span
                        >
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="flex items-center justify-center text-white sm:border sm:border-white px-4 py-2 rounded-full transition duration-300 ease-in-out hover:bg-green-500 hover:text-white text-xl sm:text-xl space-x-2"
                    >
                        <i class="fas fa-user-plus text-xl"></i>
                        <span class="ml-2 sm:inline-block text-sm sm:text-base"
                            >Registrarse</span
                        >
                    </Link>
                </div>
            </template> -->

<!-- <template v-else>
                <div
                    class="flex flex-col sm:flex-row items-center gap-2 ml-[0px]"
                >
                    <Link
                        :href="route('login')"
                        class="flex items-center justify-center text-white sm:border sm:border-white px-3 py-1 rounded-full transition duration-300 ease-in-out hover:bg-green-500 hover:text-white text-sm sm:text-base"
                    >
                        <i class="fas fa-sign-in-alt"></i>
                        <span class="ml-1 sm:inline-block">Iniciar Sesión</span>
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="flex items-center justify-center text-white sm:border sm:border-white px-3 py-1 rounded-full transition duration-300 ease-in-out hover:bg-green-500 hover:text-white text-sm sm:text-base"
                    >
                        <i class="fas fa-user-plus"></i>
                        <span class="ml-1 sm:inline-block">Registrarse</span>
                    </Link>
                </div>
            </template> -->

<!-- <template v-else>
                <Link
                    :href="route('login')"
                    class="flex items-center text-white sm:border sm:border-white px-1 py-1 rounded-full transition duration-300 ease-in-out hover:bg-green-500 hover:text-white text-sm sm:text-base"
                >
                    <i class="fas fa-sign-in-alt"></i>
                    <span class="ml-1 sm:inline-block">Iniciar Sesión</span>
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="sm:border sm:border-white p-2 rounded-full text-white flex items-center space-x-0 transition duration-300 ease-in-out hover:bg-green-500 hover:text-white text-sm sm:text-base"
                >
                    <i class="fas fa-user-plus"></i>
                    <span class="ml-2 sm:inline-block">Registrarse</span>
                </Link>
            </template> -->
<!-- <template v-else>
              
                <Link
                    :href="route('login')"
                    class="flex items-center text-white sm:border sm:border-white px-3 py-1 rounded-full transition duration-300 ease-in-out hover:bg-green-500 hover:text-white text-sm sm:text-base sm:ml-1"
                >
                    <i class="fas fa-sign-in-alt"></i>
                    <span class="ml-2 sm:inline-block">INICIO DE SESIÓN</span>
                </Link>

               
                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="sm:border sm:border-white p-2 rounded-full text-white flex items-center space-x-2 transition duration-300 ease-in-out hover:bg-green-500 hover:text-white text-sm sm:text-base sm:ml-1"
                >
                    <i class="fas fa-user-plus"></i>
                    <span class="ml-2 sm:inline-block">REGISTRARSE</span>
                </Link>
            </template> -->

<!-- layouts  -->
<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/ApplicationMark.vue";
import Banner from "@/Components/Banner.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import Sidebar from "@/Componentes/Sidebar.vue"; // Importa el componente Sidebar

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

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
                                <!-- Logo -->
                                <!-- <div class="shrink-0 flex items-center">
                                    <Link :href="route('dashboard')">
                                        <ApplicationMark class="block h-9 w-auto" />
                                    </Link>
                                </div> -->
                                <div
                                    class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"
                                >
                                    <!-- <NavLink
                                        :href="route('dashboard')"
                                        :active="route().current('dashboard')"
                                    >
                                        Dashboard
                                    </NavLink> -->
                                </div>
                            </div>

                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                                <div class="ms-3 relative">
                                    <!-- Teams Dropdown -->
                                    <Dropdown
                                        v-if="
                                            $page.props.jetstream
                                                .hasTeamFeatures
                                        "
                                        align="right"
                                        width="60"
                                    >
                                        <template #trigger>
                                            <span
                                                class="inline-flex rounded-md"
                                            >
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
                                                            $page.props.auth
                                                                .user
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
                                                    :href="
                                                        route('teams.create')
                                                    "
                                                >
                                                    Create New Team
                                                </DropdownLink>

                                                <!-- Team Switcher -->
                                                <template
                                                    v-if="
                                                        $page.props.auth.user
                                                            .all_teams.length >
                                                        1
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
                                                        v-for="team in $page
                                                            .props.auth.user
                                                            .all_teams"
                                                        :key="team.id"
                                                    >
                                                        <form
                                                            @submit.prevent="
                                                                switchToTeam(
                                                                    team
                                                                )
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
                                </div>

                                <!-- Texto "HOLA BIENVENIDO" al lado del botón del nombre del usuario -->
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
                                <!-- <div class="ms-3 relative">
                                    <Dropdown align="right" width="48">
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
                                           
                                            <div
                                                class="block px-4 py-2 text-xs text-gray-400"
                                            >
                                                Manage Account
                                            </div>

                                            <DropdownLink
                                                :href="route('profile.show')"
                                            >
                                                Profile
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
                                                    Log Out
                                                </DropdownLink>
                                            </form>
                                        </template>
                                    </Dropdown>
                                </div> -->

                                <div class="ms-3 relative">
                                    <Dropdown align="right" width="48">
                                        <template #trigger>
                                            <!-- Profile Picture or Name Button -->
                                            <button
                                                v-if="
                                                    $page.props.jetstream
                                                        .managesProfilePhotos
                                                "
                                                class="flex items-center justify-center p-1 bg-gray-200 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all"
                                            >
                                                <img
                                                    class="h-10 w-10 rounded-full object-cover"
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
                                                    class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white border border-gray-300 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-all"
                                                >
                                                    {{
                                                        $page.props.auth.user
                                                            .name
                                                    }}

                                                    <svg
                                                        class="ms-2 -me-0.5 h-4 w-4"
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
                                                Account Management
                                            </div>

                                            <DropdownLink
                                                :href="route('profile.show')"
                                                class="text-sm text-gray-600 hover:text-gray-800"
                                            >
                                                Profile
                                            </DropdownLink>

                                            <DropdownLink
                                                v-if="
                                                    $page.props.jetstream
                                                        .hasApiFeatures
                                                "
                                                :href="
                                                    route('api-tokens.index')
                                                "
                                                class="text-sm text-gray-600 hover:text-gray-800"
                                            >
                                                API Tokens
                                            </DropdownLink>

                                            <div
                                                class="border-t border-gray-200"
                                            ></div>

                                            <!-- Authentication -->
                                            <form @submit.prevent="logout">
                                                <DropdownLink
                                                    as="button"
                                                    class="text-sm text-red-600 hover:text-red-800"
                                                >
                                                    Log Out
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
                        class="sm:hidden"
                    >
                        <div class="pt-2 pb-3 space-y-1">
                            <ResponsiveNavLink
                                :href="route('dashboard')"
                                :active="route().current('dashboard')"
                            >
                                Dashboard
                            </ResponsiveNavLink>
                        </div>

                        <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="flex items-center px-4">
                                <div
                                    v-if="
                                        $page.props.jetstream
                                            .managesProfilePhotos
                                    "
                                    class="shrink-0 me-3"
                                >
                                    <img
                                        class="size-10 rounded-full object-cover"
                                        :src="
                                            $page.props.auth.user
                                                .profile_photo_url
                                        "
                                        :alt="$page.props.auth.user.name"
                                    />
                                </div>

                                <div>
                                    <div
                                        class="font-medium text-base text-gray-800"
                                    >
                                        {{ $page.props.auth.user.name }}
                                    </div>
                                    <div
                                        class="font-medium text-sm text-gray-500"
                                    >
                                        {{ $page.props.auth.user.email }}
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 space-y-1">
                                <ResponsiveNavLink
                                    :href="route('profile.show')"
                                    :active="route().current('profile.show')"
                                >
                                    Profile
                                </ResponsiveNavLink>

                                <ResponsiveNavLink
                                    v-if="$page.props.jetstream.hasApiFeatures"
                                    :href="route('api-tokens.index')"
                                    :active="
                                        route().current('api-tokens.index')
                                    "
                                >
                                    API Tokens
                                </ResponsiveNavLink>

                                <!-- Authentication -->
                                <form method="POST" @submit.prevent="logout">
                                    <ResponsiveNavLink as="button">
                                        Log Out
                                    </ResponsiveNavLink>
                                </form>

                                <!-- Team Management -->
                                <template
                                    v-if="$page.props.jetstream.hasTeamFeatures"
                                >
                                    <div class="border-t border-gray-200" />

                                    <div
                                        class="block px-4 py-2 text-xs text-gray-400"
                                    >
                                        Manage Team
                                    </div>

                                    <!-- Team Settings -->
                                    <ResponsiveNavLink
                                        :href="
                                            route(
                                                'teams.show',
                                                $page.props.auth.user
                                                    .current_team
                                            )
                                        "
                                        :active="route().current('teams.show')"
                                    >
                                        Team Settings
                                    </ResponsiveNavLink>

                                    <ResponsiveNavLink
                                        v-if="
                                            $page.props.jetstream.canCreateTeams
                                        "
                                        :href="route('teams.create')"
                                        :active="
                                            route().current('teams.create')
                                        "
                                    >
                                        Create New Team
                                    </ResponsiveNavLink>

                                    <!-- Team Switcher -->
                                    <template
                                        v-if="
                                            $page.props.auth.user.all_teams
                                                .length > 1
                                        "
                                    >
                                        <div class="border-t border-gray-200" />

                                        <div
                                            class="block px-4 py-2 text-xs text-gray-400"
                                        >
                                            Switch Teams
                                        </div>

                                        <template
                                            v-for="team in $page.props.auth.user
                                                .all_teams"
                                            :key="team.id"
                                        >
                                            <form
                                                @submit.prevent="
                                                    switchToTeam(team)
                                                "
                                            >
                                                <ResponsiveNavLink as="button">
                                                    <div
                                                        class="flex items-center"
                                                    >
                                                        <svg
                                                            v-if="
                                                                team.id ==
                                                                $page.props.auth
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
                                                            {{ team.name }}
                                                        </div>
                                                    </div>
                                                </ResponsiveNavLink>
                                            </form>
                                        </template>
                                    </template>
                                </template>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Page Heading -->
                <header
                    v-if="$slots.header"
                    class="shadow bg-blue-500 border-none -mt-1"
                >
                    <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                        <slot name="header" />
                    </div>
                </header>

                <!-- Page Content -->
                <main
                    class="fixed top-16 left-0 md:left-64 right-0 bottom-0 overflow-y-auto p-4 z-40"
                >
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>

<template>
    <aside
        :class="{
            'bg-white text-gray-800': isMobile,
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

            <hr class="border-gray-500 opacity-50 my-2" />

            <ul class="mt-6 space-y-2">
                <!-- Dashboard -->
                <li>
                    <NavLink
                        :href="route('dashboard')"
                        :active="route().current('dashboard')"
                        class="menu-item"
                    >
                        <i class="fas fa-tachometer-alt text-lg"></i>
                        <span>Dashboard</span>
                    </NavLink>
                </li>

                <!-- Profile -->
                <li>
                    <NavLink
                        :href="route('profile.show')"
                        :active="route().current('profile.show')"
                        class="menu-item"
                    >
                        <i class="fas fa-user text-lg"></i>
                        <span>Profile</span>
                    </NavLink>
                </li>

                <hr class="border-gray-500 opacity-50 my-4" />

                <!-- Tutoriales -->
                <li>
                    <div class="menu-header" @click="toggleSubmenu('tutorial')">
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
                            <NavLink href="#" class="submenu-item">
                                <i class="fas fa-layer-group"></i>
                                Default Layout
                            </NavLink>
                        </li>
                        <li>
                            <NavLink href="#" class="submenu-item">
                                <i class="fas fa-eye"></i>
                                Transparent Sidebar
                            </NavLink>
                        </li>
                        <li>
                            <NavLink href="#" class="submenu-item">
                                <i class="fas fa-bars"></i>
                                Top Navigation
                            </NavLink>
                        </li>
                    </ul>
                </li>

                <hr class="border-gray-500 opacity-50 my-4" />

                <!-- Usuarios -->
                <li>
                    <div class="menu-header" @click="toggleSubmenu('usuarios')">
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
                            <NavLink href="#" class="submenu-item">
                                <i class="fas fa-user-plus"></i>
                                Crear Usuario
                            </NavLink>
                        </li>
                        <li>
                            <NavLink href="#" class="submenu-item">
                                <i class="fas fa-user-edit"></i>
                                Editar Usuario
                            </NavLink>
                        </li>
                        <li>
                            <NavLink href="#" class="submenu-item">
                                <i class="fas fa-user-times"></i>
                                Eliminar Usuario
                            </NavLink>
                        </li>
                    </ul>
                </li>

                <hr class="border-gray-500 opacity-50 my-4" />

                <!-- Configuracion -->
                <li>
                    <div
                        class="menu-header"
                        @click="toggleSubmenu('configuracion')"
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
                            <NavLink href="#" class="submenu-item">
                                <i class="fas fa-exclamation-circle"></i>
                                Alert
                            </NavLink>
                        </li>
                        <li>
                            <NavLink href="#" class="submenu-item">
                                <i class="fas fa-certificate"></i>
                                Badge
                            </NavLink>
                        </li>
                        <li>
                            <NavLink href="#" class="submenu-item">
                                <i class="fas fa-map-signs"></i>
                                Breadcrumb
                            </NavLink>
                        </li>
                    </ul>
                </li>

                <hr class="border-gray-500 opacity-50 my-4" />

                <!-- User Menu (Integrado en el Sidebar) -->
                <li>
                    <div class="menu-header" @click="toggleSubmenu('userMenu')">
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
                            >
                                <i class="fas fa-user text-lg"></i>
                                <span>Perfil</span>
                            </NavLink>
                        </li>
                        <li v-if="$page.props.jetstream.hasApiFeatures">
                            <NavLink
                                :href="route('api-tokens.index')"
                                class="submenu-item"
                            >
                                <i class="fas fa-key text-lg"></i>
                                <span>API Tokens</span>
                            </NavLink>
                        </li>
                        <li>
                            <form @submit.prevent="logout">
                                <NavLink as="button" class="submenu-item">
                                    <i
                                        class="fas fa-right-from-bracket text-lg"
                                    ></i>
                                    <span>Cerrar Sesión</span>
                                </NavLink>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script setup>
import { ref } from "vue";
import NavLink from "@/Components/NavLink.vue";
import { router } from "@inertiajs/vue3";

const isSubmenuOpen = ref({
    tutorial: false,
    usuarios: false,
    configuracion: false,
    userMenu: false, // Nuevo estado para el menú de usuario
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
                            <div class="pt-2 pb-3 space-y-1">
                                <ResponsiveNavLink
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard')"
                                >
                                    Dashboard
                                </ResponsiveNavLink>
                            </div>

                            <!-- Responsive Settings Options -->
                            <div class="pt-4 pb-1 border-t border-gray-200">
                                <div class="flex items-center px-4">
                                    <div
                                        v-if="
                                            $page.props.jetstream
                                                .managesProfilePhotos
                                        "
                                        class="shrink-0 me-3"
                                    >
                                        <img
                                            class="size-10 rounded-full object-cover"
                                            :src="
                                                $page.props.auth.user
                                                    .profile_photo_url
                                            "
                                            :alt="$page.props.auth.user.name"
                                        />
                                    </div>

                                    <div>
                                        <div
                                            class="font-medium text-base text-gray-800"
                                        >
                                            {{ $page.props.auth.user.name }}
                                        </div>
                                        <div
                                            class="font-medium text-sm text-gray-500"
                                        >
                                            {{ $page.props.auth.user.email }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 space-y-1">
                                    <ResponsiveNavLink
                                        :href="route('profile.show')"
                                        :active="
                                            route().current('profile.show')
                                        "
                                    >
                                        <div class="flex items-center gap-x-2">
                                            <i class="fas fa-user text-lg"></i>
                                            <span
                                                class="font-sans font-bold text-[15px]"
                                                >Perfil</span
                                            >
                                        </div>
                                    </ResponsiveNavLink>

                                    <ResponsiveNavLink
                                        v-if="
                                            $page.props.jetstream.hasApiFeatures
                                        "
                                        :href="route('api-tokens.index')"
                                        :active="
                                            route().current('api-tokens.index')
                                        "
                                    >
                                        API Tokens
                                    </ResponsiveNavLink>

                                    <!-- Authentication -->
                                    <form
                                        method="POST"
                                        @submit.prevent="logout"
                                    >
                                        <ResponsiveNavLink as="button">
                                            Log Out
                                        </ResponsiveNavLink>
                                    </form>
                                    <Sidebar
                                        :isOpen="true"
                                        :isMobile="false"
                                        class="hidden lg:block"
                                    />
                                </div>
                            </div>
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

<!-- Registro -->

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
    <div class="container">
        <!-- Header -->
        <Header :isLoginPage="true" :canLogin="true" :canRegister="true" />
        <Head title="Register" />

        <!-- Contenido del formulario -->
        <div class="content">
            <AuthenticationCard>
                <template #logo>
                    <AuthenticationCardLogo />
                </template>

                <form @submit.prevent="submit">
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"
                    >
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
                            <InputError
                                class="mt-2"
                                :message="form.errors.name"
                            />
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
                            <InputError
                                class="mt-2"
                                :message="form.errors.apellido"
                            />
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
                            <InputError
                                class="mt-2"
                                :message="form.errors.status"
                            />
                        </div>

                        <!-- Correo Electrónico -->
                        <div>
                            <InputLabel
                                for="email"
                                value="Correo Electrónico"
                            />
                            <TextInput
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="mt-1 block w-full"
                                required
                                autocomplete="username"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <!-- Dirección -->
                        <div>
                            <InputLabel for="direccion" value="Dirección" />
                            <TextInput
                                id="direccion"
                                v-model="form.direccion"
                                type="text"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.direccion"
                            />
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
                            <InputError
                                class="mt-2"
                                :message="form.errors.telefono"
                            />
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
                            <InputError
                                class="mt-2"
                                :message="form.errors.password"
                            />
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

                        <!-- Foto de Perfil -->
                        <div>
                            <InputLabel
                                for="fotoperfil"
                                value="Subir Foto de Perfil"
                            />
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

                        <!-- Nuevo Dato -->
                        <div>
                            <InputLabel for="nuevo1" value="Nuevo 1" />
                            <TextInput
                                id="nuevo1"
                                v-model="form.nuevo1"
                                type="text"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.nuevo1"
                            />
                        </div>

                        <!-- Nuevo Dato -->
                        <div>
                            <InputLabel for="nuevo2" value="Nuevo 2" />
                            <TextInput
                                id="nuevo2"
                                v-model="form.nuevo2"
                                type="text"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.nuevo2"
                            />
                        </div>

                        <!-- Términos y Política de Privacidad -->
                        <div
                            v-if="
                                $page.props.jetstream
                                    .hasTermsAndPrivacyPolicyFeature
                            "
                            class="col-span-1 sm:col-span-2 lg:col-span-3"
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
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.terms"
                                />
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
        </div>

        <!-- Footer -->
        <Footer class="footer" />
    </div>
</template>

<style scoped>
/* Estilos para el contenedor principal */
.container {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Asegura que el contenedor ocupe al menos el 100% de la altura de la ventana */
}

/* Estilos para el contenido del formulario */
.content {
    flex: 1; /* Hace que el contenido ocupe el espacio restante */
    margin-top: 60px; /* Margen superior para separar del header */
    margin-bottom: 40px; /* Margen inferior para separar del footer */
}

/* Estilos para el footer */
.footer {
    margin-top: auto; /* Asegura que el footer esté en la parte inferior */
}
</style>
