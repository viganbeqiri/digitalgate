<template>
    <nav class="navbar fixed-top navbar-expand-lg center-nav navbar-light navbar-bg-light border-bottom border-secondary"
        style="z-index: 1031;">
        <div class="container flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-50">
                <Link :href="route('home')">
                <img src="@/img/digital-gate-logo.png" srcset="@/img/digital-gate-logo.png 2x" alt="logo"
                    style="height: 1rem" />
                </Link>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                <div class="offcanvas-header d-lg-none">
                    <h3 class="text-white fs-30 mb-0">Digital Gate</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item" v-for="menuItem in menuItems">
                            <Link class="nav-link pb-1 pt-1 "
                                :class="route().current() === menuItem.link || route().current().split('.')[0] === menuItem.link.split('.')[0] ? 'bg-pale-ash text-primary rounded-pill' : ''"
                                v-if="!menuItem.link.startsWith('#')" :href="route(menuItem.link)"
                                @click="subMenuHide(menuItem, $event)">{{
                                    menuItem.label }} </Link>

                            <a href="#" class="nav-link pb-1 pt-1 "
                                :class="route().current().split('.')[0] == menuItem.link.split('#')[1] ? 'bg-pale-ash text-primary rounded-pill' : (route().current().split('.')[0] == menuItem.link.split('#')[1] ? 'bg-pale-ash text-primary rounded-pill' : '')"
                                v-else @click="showSubMenu(menuItem.subMenu)">{{
                                    menuItem.label }}</a>
                        </li>
                    </ul>
                    <!-- /.offcanvas-footer -->

                </div>

                <!-- /.offcanvas-body -->
            </div>

            <div class="navbar-other w-100 d-flex ms-auto p-2">
                <ul class="navbar-nav flex-row align-items-center ms-auto w-75">
                    <li class="nav-item dropdown language-select w-100">
                        <!-- search form -->
                        <form id="search" class="search-form" action="/search" method="get">
                            <div class="form-group">
                                <input id="search-form" type="text" name="keyword" class="form-control form-control-rounded"
                                    placeholder="Search Here">

                            </div>
                        </form>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-collapse -->
            <div class="navbar-other w-100 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item dropdown language-select ">
                        <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">English</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="dropdown-item" href="#">English</a></li>
                        </ul>
                    </li>
                    <li class="nav-item d-none d-md-block" v-if="!auth.user">
                        <a href="/sign-up" class="btn btn-sm btn-primary rounded-pill pt-1 pb-1">Sign up</a>
                    </li>

                    <li class="nav-item" v-if="auth.user">
                        <a href="#" class="text-ash pt-1 pb-1">{{ auth.user.name }}</a>
                    </li>

                    <li class="nav-item dropdown user-select " v-if="auth.user">
                        <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="uil uil-user-circle"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <Link class="dropdown-item" :href="route('order.index')">Orders</Link>
                                <a class="dropdown-item" @click="logout()" href="#">Logout</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-other -->
        </div>


        <!-- /.container -->
    </nav>
    <nav class="navbar fixed-top pt-12  navbar-expand-lg center-nav navbar-light navbar-bg-light seconday-nav-header">
        <div class="container flex-lg-row flex-nowrap align-items-center justify-content-center">
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                <div class="offcanvas-body d-flex justify-content-center align-items-center"
                    style="margin-left: 8vw; height: 40px;" v-if="subMenu">
                    <ul class="navbar-nav secondary-nav">
                        <li class="nav-item" v-for="subMenu in subMenu">
                            <Link class="nav-link weight-200 fs-16" v-if="subMenu.link != '#'" :href="route(subMenu.link)"
                                :class="route().current().split('.')[1] == subMenu.link.split('.')[1] ? 'text-primary' : ''">
                            {{
                                subMenu.label }}</Link>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->
    <div class="offcanvas offcanvas-end text-inverse" id="offcanvas-info" data-bs-scroll="true">
        <div class="offcanvas-header">
            <h3 class="text-white fs-30 mb-0">Sandbox</h3>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pb-6">
            <div class="widget mb-8">
                <p>Sandbox is a multipurpose HTML5 template with various layouts which will be a great solution for your
                    business.</p>
            </div>
            <!-- /.widget -->
            <div class="widget mb-8">
                <h4 class="widget-title text-white mb-3">Contact Info</h4>
                <address> Moonshine St. 14/05 <br /> Light City, London </address>
                <a href="/cdn-cgi/l/email-protection#b3d5dac1c0c79ddfd2c0c7f3d6ded2dadf9dd0dcde"><span class="__cf_email__"
                        data-cfemail="7b12151d143b1e161a121755181416">[email&#160;protected]</span></a><br /> 00 (123) 456
                78 90
            </div>
            <!-- /.widget -->
            <div class="widget mb-8">
                <h4 class="widget-title text-white mb-3">Learn More</h4>
                <ul class="list-unstyled">
                    <li><a href="#">Our Story</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <!-- /.widget -->
            <div class="widget">
                <h4 class="widget-title text-white mb-3">Follow Us</h4>
                <nav class="nav social social-white">
                    <a href="#"><i class="uil uil-twitter"></i></a>
                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                    <a href="#"><i class="uil uil-dribbble"></i></a>
                    <a href="#"><i class="uil uil-instagram"></i></a>
                    <a href="#"><i class="uil uil-youtube"></i></a>
                </nav>
                <!-- /.social -->
            </div>
            <!-- /.widget -->
        </div>
        <!-- /.offcanvas-body -->
    </div>
    <!-- /.offcanvas -->
</template>

<script>
import { Link, usePage } from '@inertiajs/vue3'

export default {
    components: {
        Link
    },
    inheritAttrs: false,
    data() {
        return {
            menuItems: [
                {
                    id: 1,

                    label: 'Overview',
                    link: 'home'
                },
                {
                    id: 2,

                    label: 'Services',
                    link: 'services.desktop-app-development',
                    subMenu: [
                        {
                            id: 1,
                            label: 'Desktop App Development',
                            link: 'services.desktop-app-development'
                        },
                        {
                            label: 'Web Development',
                            link: 'services.web-development'
                        },
                        {
                            label: 'Cross-Platform Development',
                            link: 'services.cross-platform-development'
                        },
                        {
                            label: 'Mobile App Development',
                            link: 'services.mobile-app-development'
                        },
                        {
                            label: 'Design Service',
                            link: 'services.design-service'
                        }
                    ]
                },
                {
                    id: 3,

                    label: 'Outsourcing',
                    link: 'outsourcing.index',
                    subMenu: [
                        {
                            label: 'Team as a Service',
                            link: 'outsourcing.team-as-a-service'
                        },
                        {
                            label: 'IT Outsourcing Services',
                            link: 'outsourcing.it-outsourcing-service'
                        },
                        {
                            label: 'Cyber Security Services',
                            link: 'outsourcing.cybersecurity-service'
                        }
                    ]
                },
                {
                    id: 4,

                    label: 'Portfolio',
                    link: 'portfolio'
                },
                {
                    id: 5,
                    label: 'Incubator',
                    link: 'incubator.why-us',
                    subMenu: [
                        {
                            label: 'Why us?',
                            link: 'incubator.why-us'
                        },
                        {
                            label: 'Cohort',
                            link: 'incubator.cohort'
                        },
                        {
                            label: 'Incubation',
                            link: 'incubator.incubation'
                        },
                        {
                            label: 'Acceleration',
                            link: 'incubator.acceleration'
                        }
                    ]
                }
            ],
            subMenu: null
        }
    },
    setup() {
        const auth = usePage().props.auth
        const active = usePage().props.active
        return {
            auth, active
        }
    },
    mounted() {
        console.log(this.auth)
        const currentRoute = route().current().split('.')
        const menuItems = this.menuItems.map(item => {
            const mainMenu = item.link.startsWith('#') ? item.link.split('#')[1] : item.link.split('.')[0]
            return {
                ...item,
                mainMenu: mainMenu
            }
        })
        const currentMenu = menuItems.find(item => item.mainMenu === currentRoute[0])
        try {
            this.showSubMenu(currentMenu.subMenu)

        } catch (error) {
        }
    },
    methods: {
        showSubMenu(item) {
            this.subMenu = item
        },
        subMenuHide(menuItem, event) {
            console.log(menuItem)
            const link = event.target

            this.subMenu = null
            if (menuItem.subMenu) {
                this.showSubMenu(menuItem.subMenu)
            }
        },
        checkIfIsLogged() {
            let token = this.$localStorage.get('access_token')
            if (token) {
                return true
            } else {
                return false
            }
        },

        logout() {
            this.$inertia.post(route('auth.logout'), {
                onSuccess: () => {
                            toast.success('Logout Successful');
                            localStorage.clear();
                            router.visit('/', {
                                onSuccess: () => {
                                    location.reload();
                                }
                            });}
            })
        }
    },
    computed() {
        console.log(active)

    },
    onMounted() {
        console.log(usePage().props)
    }
}
</script>

<style>
.form-group .form-control-icon {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
    right: 0;
    top: 0px;
}

.form-control-rounded {
    border-radius: 50px;
}

.secondary-nav>.nav-item>.nav-link {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
    /* --bs-nav-link-padding-y: 0 !important; */
}

.secondary-nav>a {
    font-weight: 100 !important;
}

.weight-100 {
    font-weight: 100 !important;
    font-size: small;
}

.seconday-nav-header {
    background: var(--bs-gray-200) !important;
}

.nav-link {
    /* color: #9dafbe !important; */
}
</style>
