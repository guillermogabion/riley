import Main from '../pages/Main.vue'
import Login from '../pages/Login.vue'
import Register from '../pages/register.vue'
import Dashboard from '../pages/Admin/Dashboard.vue'
// User
import User from '../pages/Users/index.vue'

// Reservations
import Reservation from '../pages/Reservations/index.vue'

import Chat from '../layouts/includes/chat/index.vue'
import Settings from '../pages/settings'

// event 

// settings 
import NavSetting from '../pages/settings/navsetting.vue'
import Items from '../pages/settings/includes/item.vue'
import Delivery from '../pages/settings/includes/delivery.vue'
import Category from '../pages/settings/includes/category.vue'

import Attendance from '../pages/Attendance.vue'

import AllItems from '../pages/Items/index.vue'

// user part 

import Home from '../userspart/home.vue'
import Services from '../userspart/services.vue'
import Menu from '../userspart/menu.vue'

// rentals 
import Rents from '../pages/Rentals/rental.vue'

// foodtray 

import Foodtray from '../pages/FoodTray/foodtray.vue'


export default [{
    path: '/',
    component: Main,
    meta: { authOnly: true },
    children: [
        {
            path: '/',
            component: Dashboard,
            meta: { authOnly: true },
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: { authOnly: true },
        },
        // reservations
        {
            path: '/reservations',
            name: 'reservations',
            component: Reservation,
            meta: { authOnly: true },
        },

    
        // user
      
        {
            path: '/users',
            name: 'users',
            component: User,
            meta: { authOnly: true },
        },
    
        {
            path: '/chat',
            name: 'chat',
            component: Chat,
            meta: { authOnly: true }
        },
        {
            path: '/setting',
            component: Settings,
            meta: { authOnly: true },
            children: [
                {
                    path: '/setting',
                    name: 'items',
                    meta: { authOnly: true },
                    component : Items
                },
                {
                    path: '/setting/item',
                    name: 'items',
                    meta: { authOnly: true },
                    component : Items
                },
                {
                    path: '/setting/delivery',
                    name: 'delivery',
                    component: Delivery,
                    meta: { authOnly: true }
                },
                {
                    path: '/setting/category',
                    name: 'category',
                    component: Category,
                    meta: { authOnly: true }
                },

            ]
        },

        // user part 
        {
            path: '/home',
            name: 'home',
            component: Home,
            meta: { authOnly: true },
        },
        {
            path: '/services',
            name: 'services',
            component: Services,
            meta: { authOnly: true },
        },
        {
            path: '/menu',
            name: 'menu',
            component: Menu,
            meta: { authOnly: true },
        },
        {
            path: '/rentals',
            name: 'rentals',
            component: Rents,
            meta: { authOnly: true },
        },
        {
            path: '/foodtray',
            name: 'foodtray',
            component: Foodtray,
            meta: { authOnly: true },
        },
       


    ]
},
{
    path: '/login',
    name: 'login',
    component: Login,
    meta: { authOnly: false },
},
{
    path: '/register',
    name: 'register',
    component: Register,
    meta: { authOnly: false },
},
{
    path: '/attendance',
    name: 'attendance',
    component: Attendance,
    meta: {authOnly: true}
},
{
    path: '/design',
    name: 'origin',
    meta: {authOnly: false},
    beforeEnter() {location.href = 'http://localhost/design'}
}
]

