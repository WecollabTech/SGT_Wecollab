<template>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li>
                    <a
                        href="#"
                        data-toggle="sidebar"
                        class="nav-link nav-link-lg"
                        ><i class="fas fa-bars"></i
                    ></a>
                </li>
                <li>
                    <a
                        href="#"
                        data-toggle="search"
                        class="nav-link nav-link-lg d-sm-none"
                        ><i class="fas fa-search"></i
                    ></a>
                </li>
            </ul>
            <div class="search-element">
                <input
                    class="form-control"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                    data-width="250"
                />
                <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                <div class="search-backdrop"></div>
                <div class="search-result">
                    <!-- Resultados de búsqueda -->
                </div>
            </div>
        </form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown dropdown-list-toggle">
                <a
                    href="#"
                    data-toggle="dropdown"
                    class="nav-link nav-link-lg message-toggle beep"
                    ><i class="far fa-envelope"></i
                ></a>
                <!-- Dropdown de mensajes -->
            </li>
            <li class="dropdown dropdown-list-toggle">
                <a
                    href="#"
                    data-toggle="dropdown"
                    class="nav-link notification-toggle nav-link-lg beep"
                    ><i class="far fa-bell"></i
                ></a>
                <!-- Dropdown de notificaciones -->
            </li>
            <li class="dropdown">
                <a
                    href="#"
                    data-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user"
                >
                    <img
                        alt="image"
                        src="assets/img/avatar/avatar-1.png"
                        class="rounded-circle mr-1"
                    />
                    <div class="d-sm-none d-lg-inline-block">
                        Hi, Ujang Maman
                    </div>
                </a>
                <!-- Dropdown de usuario -->
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Navbar",
};
</script>

<style scoped>
/* Estilos específicos para el Navbar */
</style>
