/**
 * Sistema de Navegación Inteligente - Control Diabetes
 * Maneja la navegación según el estado de autenticación del usuario
 */

class NavigationManager {
    constructor() {
        this.isLoggedIn = this.checkLoginStatus();
        this.init();
    }

    /**
     * Verifica si el usuario está logueado
     * @returns {boolean}
     */
    checkLoginStatus() {
        // Usar la información de PHP si está disponible
        if (typeof window.authStatus !== 'undefined') {
            return window.authStatus.loggedIn;
        }
        
        // Fallback: verificar localStorage
        const userData = localStorage.getItem('userData');
        return !!userData;
    }

    /**
     * Obtiene una cookie específica
     * @param {string} name 
     * @returns {string|null}
     */
    getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    /**
     * Inicializa el sistema de navegación
     */
    init() {
        this.updateNavigation();
        this.setupEventListeners();
    }

    /**
     * Actualiza la navegación según el estado de login
     */
    updateNavigation() {
        const navList = document.querySelector('.nav-list');
        if (!navList) return;

        // Limpiar navegación actual
        navList.innerHTML = '';

        // Agregar enlace de inicio (siempre visible)
        this.addNavItem(navList, {
            href: 'index.html',
            icon: this.getHomeIcon(),
            text: 'Inicio',
            active: this.isCurrentPage('index.html')
        });

        if (this.isLoggedIn) {
            // Usuario logueado - mostrar enlaces de usuario
            this.addUserNavigation(navList);
        } else {
            // Usuario no logueado - mostrar enlaces de autenticación
            this.addAuthNavigation(navList);
        }
    }

    /**
     * Agrega navegación para usuarios autenticados
     * @param {HTMLElement} navList 
     */
    addUserNavigation(navList) {
        // Dropdown de Control
        this.addControlDropdown(navList);

        // Dropdown de Usuario
        this.addUserDropdown(navList);
    }

    /**
     * Agrega navegación para usuarios no autenticados
     * @param {HTMLElement} navList 
     */
    addAuthNavigation(navList) {
        // Registro
        this.addNavItem(navList, {
            href: 'php/registrarse.php',
            icon: this.getRegisterIcon(),
            text: 'Registro',
            active: this.isCurrentPage('registrarse.php')
        });

        // Iniciar sesión
        this.addNavItem(navList, {
            href: 'php/entrada.php',
            icon: this.getLoginIcon(),
            text: 'Iniciar Sesión',
            active: this.isCurrentPage('entrada.php')
        });
    }

    /**
     * Agrega dropdown de control
     * @param {HTMLElement} navList 
     */
    addControlDropdown(navList) {
        const dropdownItem = document.createElement('li');
        dropdownItem.className = 'nav-item dropdown';
        
        dropdownItem.innerHTML = `
            <a href="#" class="nav-link dropdown-toggle">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2"/>
                </svg>
                Control
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <ul class="dropdown-menu">
                <li><a href="php/tablaDiabetes.php">📅 Ver Datos</a></li>
                <li><a href="php/añadir.php">➕ Añadir Datos</a></li>
                <li><a href="php/modificar.php">✏️ Modificar</a></li>
                <li><a href="php/borrar.php">🗑️ Eliminar</a></li>
                <li><a href="php/estadisticas.php">📊 Estadísticas</a></li>
            </ul>
        `;

        navList.appendChild(dropdownItem);
    }

    /**
     * Agrega dropdown de usuario
     * @param {HTMLElement} navList 
     */
    addUserDropdown(navList) {
        const dropdownItem = document.createElement('li');
        dropdownItem.className = 'nav-item dropdown';
        
        const userName = this.getUserName() || 'Usuario';
        
        dropdownItem.innerHTML = `
            <a href="#" class="nav-link dropdown-toggle">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                </svg>
                ${userName}
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <ul class="dropdown-menu">
                <li><span class="welcome-text">👋 Bienvenido</span></li>
                <li><hr style="margin: 8px 0; border: none; border-top: 1px solid var(--gray-200);"></li>
                <li><a href="php/salida.php" class="logout-link">🚪 Salir</a></li>
            </ul>
        `;

        navList.appendChild(dropdownItem);
    }

    /**
     * Agrega un elemento de navegación
     * @param {HTMLElement} navList 
     * @param {Object} options 
     */
    addNavItem(navList, options) {
        const { href, icon, text, active } = options;
        
        const navItem = document.createElement('li');
        navItem.className = 'nav-item';
        
        const navLink = document.createElement('a');
        navLink.href = href;
        navLink.className = `nav-link ${active ? 'active' : ''}`;
        navLink.innerHTML = `${icon}${text}`;
        
        navItem.appendChild(navLink);
        navList.appendChild(navItem);
    }

    /**
     * Verifica si es la página actual
     * @param {string} pageName 
     * @returns {boolean}
     */
    isCurrentPage(pageName) {
        const currentPath = window.location.pathname;
        return currentPath.includes(pageName);
    }

    /**
     * Obtiene el nombre del usuario
     * @returns {string|null}
     */
    getUserName() {
        // Usar la información de PHP si está disponible
        if (typeof window.authStatus !== 'undefined' && window.authStatus.userData) {
            return window.authStatus.userData.usuario;
        }
        
        // Fallback: verificar localStorage
        const userData = localStorage.getItem('userData');
        if (userData) {
            try {
                const user = JSON.parse(userData);
                return user.usuario;
            } catch (e) {
                return null;
            }
        }
        return null;
    }

    /**
     * Configura los event listeners
     */
    setupEventListeners() {
        // Manejar logout
        document.addEventListener('click', (e) => {
            if (e.target.closest('.logout-link')) {
                e.preventDefault();
                this.handleLogout();
            }
        });

        // Actualizar navegación cuando cambie el estado de login
        window.addEventListener('storage', (e) => {
            if (e.key === 'userData') {
                this.isLoggedIn = this.checkLoginStatus();
                this.updateNavigation();
            }
        });
    }

    /**
     * Maneja el proceso de logout
     */
    handleLogout() {
        // Limpiar datos locales
        localStorage.removeItem('userData');
        
        // Redirigir a salida.php para limpiar sesión PHP
        window.location.href = 'php/salida.php';
    }

    // Iconos SVG
    getHomeIcon() {
        return `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`;
    }

    getCalendarIcon() {
        return `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke="currentColor" stroke-width="2"/>
            <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="2"/>
            <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="2"/>
            <line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="2"/>
        </svg>`;
    }

    getAddIcon() {
        return `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 5V19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`;
    }

    getRegisterIcon() {
        return `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="8.5" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
            <path d="M20 8V14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M23 11H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`;
    }

    getLoginIcon() {
        return `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 3H19C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10 17L15 12L10 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15 12H3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`;
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    new NavigationManager();
});
