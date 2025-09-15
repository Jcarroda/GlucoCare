# 🩺 GlucoCare - Tu Compañero Digital para el Control de la Diabetes

![Control Diabetes](https://img.shields.io/badge/Control-Diabetes-blue?style=for-the-badge&logo=medical-cross)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

## 📋 Descripción

**GlucoCare** es una aplicación web completa diseñada específicamente para personas con diabetes tipo 1 y tipo 2. Permite un control detallado y organizado de todos los aspectos relacionados con el manejo de la diabetes, desde el registro de niveles de glucosa hasta el seguimiento de episodios de hipoglucemia e hiperglucemia.

## ✨ Características Principales

### 🗓️ **Calendario Inteligente**
- Visualización mensual de todos los datos de control
- Navegación entre meses con flechas intuitivas
- Filtrado automático por mes y año
- Indicadores visuales para diferentes tipos de datos
- Tooltips informativos al pasar el mouse

### 📊 **Registro Completo de Datos**
- **Control de Glucosa**: Niveles basales y actividad física
- **Registro de Comidas**: Glucosa pre/post, raciones e insulina
- **Episodios de Hipoglucemia**: Niveles, horarios y tipos de comida
- **Episodios de Hiperglucemia**: Niveles, correcciones y seguimiento

### 📈 **Estadísticas y Análisis**
- Resumen de episodios por mes
- Promedios de glucosa por tipo de comida
- Ranking de mayor administración de insulina
- Gráficos mensuales interactivos
- Análisis de patrones y tendencias

### 🔐 **Sistema de Autenticación Seguro**
- Registro de usuarios con validación
- Inicio de sesión seguro con hash de contraseñas
- Navegación inteligente según estado de autenticación
- Sesiones persistentes y seguras

### 📱 **Diseño Responsive**
- Interfaz moderna y profesional
- Adaptable a todos los dispositivos (móvil, tablet, desktop)
- Navegación intuitiva y accesible
- Sistema de diseño consistente

## 🛠️ Tecnologías Utilizadas

### **Backend**
- **PHP 7.4+** - Lógica del servidor
- **MySQL** - Base de datos relacional
- **Sesiones PHP** - Manejo de autenticación

### **Frontend**
- **HTML5** - Estructura semántica
- **CSS3** - Estilos modernos con variables CSS
- **JavaScript ES6+** - Interactividad y validaciones
- **SVG** - Iconografía vectorial

### **Características Técnicas**
- **Arquitectura MVC** - Separación de responsabilidades
- **Consultas Preparadas** - Seguridad contra SQL injection
- **Hash de Contraseñas** - Encriptación segura con `password_hash()`
- **CSS Modular** - Organización de estilos por componentes
- **Responsive Design** - Media queries y diseño flexible

## 📁 Estructura del Proyecto

```
glucocare/
├── 📄 index.html                 # Página principal
├── 📁 php/                       # Lógica del servidor
│   ├── 🔐 autenticacion.php      # Verificación de sesión
│   ├── 🔗 conexion.php           # Conexión a base de datos
│   ├── 👤 registrarse.php        # Registro de usuarios
│   ├── 🔑 entrada.php            # Inicio de sesión
│   ├── 🚪 salida.php             # Cerrar sesión
│   ├── 📊 tablaDiabetes.php      # Calendario principal
│   ├── ➕ añadir.php             # Formularios de registro
│   ├── ✏️ modificar.php          # Edición de datos
│   ├── 🗑️ borrar.php             # Eliminación de datos
│   ├── 📈 estadisticas.php       # Análisis y estadísticas
│   ├── 💾 guardar_añadir.php     # Procesamiento de nuevos datos
│   ├── 💾 guardar_modificaciones.php # Procesamiento de ediciones
│   ├── 💾 guardar_borrar.php     # Procesamiento de eliminaciones
│   └── 🔍 check_auth.php         # Verificación de autenticación
├── 📁 css/                       # Estilos modulares
│   ├── 🎨 variables.css          # Variables CSS globales
│   ├── 🔧 base.css               # Estilos base y reset
│   ├── 🧩 components.css         # Componentes reutilizables
│   ├── 📐 layout.css             # Estructura y layout
│   ├── 📄 pages.css              # Estilos específicos de páginas
│   ├── 📊 calendar.css           # Estilos del calendario
│   ├── 📈 stats.css              # Estilos de estadísticas
│   ├── 🔐 auth.css               # Estilos de autenticación
│   ├── 📝 forms.css              # Estilos de formularios
│   └── 📱 responsive.css         # Media queries responsive
├── 📁 js/                        # JavaScript
│   └── ⚡ index.js               # Funcionalidades principales
├── 📁 articulos/                 # Contenido educativo
│   ├── 📖 luna-miel-diabetes.html
│   └── 📖 conteo-raciones.html
├── 📁 multimedia/                # Recursos multimedia
└── 🎯 favicon.svg                # Icono de la aplicación
```

## 🗄️ Base de Datos

### **Esquema de Base de Datos**

La aplicación utiliza una base de datos MySQL con las siguientes tablas principales:

#### **Tablas del Sistema**
- **`usuario`** - Información de usuarios registrados
- **`control_glucosa`** - Registros de glucosa basal y actividad física
- **`comida`** - Datos de comidas, glucosa post-prandial e insulina
- **`hipoglucemia`** - Episodios de hipoglucemia
- **`hiperglucemia`** - Episodios de hiperglucemia

### **Instalación de la Base de Datos**

1. **Crear la base de datos:**
   ```sql
   CREATE DATABASE control_diabetes;
   ```

2. **Importar el esquema:**
   ```bash
   mysql -u tu_usuario -p control_diabetes < database/schema.sql
   ```

3. **Configurar conexión:**
   - Copia `php/conexion.example.php` como `php/conexion.php`
   - Configura tus credenciales de base de datos

### **Estructura Detallada**

El archivo `database/schema.sql` contiene:
- ✅ Creación de todas las tablas
- ✅ Índices optimizados para consultas
- ✅ Relaciones con integridad referencial
- ✅ Vistas para consultas complejas
- ✅ Datos de ejemplo para testing
- ✅ Comentarios y documentación

## 🚀 Instalación y Configuración

### **Requisitos del Sistema**
- PHP 7.4 o superior
- MySQL 5.7 o superior
- Servidor web (Apache/Nginx)
- Extensiones PHP: PDO, Intl, JSON

### **Pasos de Instalación**

1. **Clonar el repositorio**
   ```bash
   git clone [URL_DEL_REPOSITORIO]
   cd glucocare
   ```

2. **Configurar la base de datos**
   ```bash
   # Crear la base de datos
   mysql -u root -p -e "CREATE DATABASE glucocare;"
   
   # Importar el esquema
   mysql -u root -p glucocare < database/schema.sql
   ```

3. **Configurar la conexión**
   ```bash
   # Copiar archivo de configuración
   cp php/conexion.example.php php/conexion.php
   
   # Editar con tus credenciales
   nano php/conexion.php
   ```

4. **Configurar permisos (Linux/Mac)**
   ```bash
   chmod 755 -R .
   chmod 644 php/*.php
   chmod 755 php/
   ```

5. **Configurar servidor web**
   - **Apache**: Configurar Virtual Host
   - **Nginx**: Configurar server block
   - **XAMPP/WAMP**: Copiar a carpeta htdocs

6. **Acceder a la aplicación**
   ```
   http://localhost/glucocare/
   ```

### **Configuración Adicional**

#### **Archivos de Configuración**
- `php/conexion.example.php` → `php/conexion.php` (Base de datos)
- `config.example.php` → `config.php` (Configuración general)

#### **Variables de Entorno**
```bash
# Copiar archivo de ejemplo
cp .env.example .env

# Configurar variables
nano .env
```

#### **Permisos de Carpetas**
```bash
# Crear carpetas necesarias
mkdir -p logs uploads cache backups

# Configurar permisos
chmod 755 logs uploads cache backups
```

## 📖 Guía de Uso

### **Para Nuevos Usuarios**

1. **Registro**
   - Accede a "Registro" desde la página principal
   - Completa el formulario con tus datos
   - Crea una contraseña segura

2. **Primer Uso**
   - Inicia sesión con tus credenciales
   - Accede al "Control" desde el menú
   - Comienza registrando tus datos diarios

### **Funcionalidades Principales**

#### **📅 Calendario de Control**
- Visualiza todos tus datos en formato calendario
- Navega entre meses con las flechas
- Haz clic en cualquier día para ver detalles

#### **➕ Añadir Datos**
- **Control de Glucosa**: Registra niveles basales y actividad
- **Comidas**: Anota glucosa pre/post, raciones e insulina
- **Episodios**: Documenta hipoglucemias e hiperglucemias

#### **📊 Estadísticas**
- Revisa resúmenes mensuales
- Analiza patrones y tendencias
- Identifica áreas de mejora

## 🔒 Seguridad

- **Contraseñas Encriptadas**: Uso de `password_hash()` y `password_verify()`
- **Consultas Preparadas**: Prevención de SQL injection
- **Validación de Entrada**: Sanitización de datos del usuario
- **Sesiones Seguras**: Manejo seguro de autenticación
- **HTTPS Recomendado**: Para producción

## 🎨 Sistema de Diseño

### **Paleta de Colores**
- **Primario**: Azul (#2563eb)
- **Secundario**: Verde (#059669)
- **Neutros**: Escala de grises
- **Estados**: Rojo (error), Verde (éxito), Amarillo (advertencia)

### **Tipografía**
- **Fuente Principal**: Inter (Google Fonts)
- **Tamaños**: Escala modular de 12px a 48px
- **Pesos**: 300, 400, 500, 600, 700

### **Componentes**
- **Botones**: Primarios, secundarios, outline
- **Formularios**: Inputs, selects, textareas
- **Cards**: Contenedores de información
- **Navegación**: Header, menús, breadcrumbs

## 📱 Responsive Design

- **Mobile First**: Diseño optimizado para móviles
- **Breakpoints**: 480px, 768px, 1024px, 1200px
- **Grid System**: CSS Grid y Flexbox
- **Touch Friendly**: Botones y elementos táctiles

## 🧪 Testing

### **Funcionalidades Probadas**
- ✅ Registro e inicio de sesión
- ✅ CRUD completo de datos
- ✅ Navegación entre meses
- ✅ Cálculos de estadísticas
- ✅ Responsive design
- ✅ Validaciones de formularios

## 🚀 Despliegue

### **Producción**
1. Configurar servidor web
2. Instalar PHP y MySQL
3. Configurar SSL/HTTPS
4. Optimizar base de datos
5. Configurar backups automáticos

### **Optimizaciones**
- Minificación de CSS/JS
- Compresión de imágenes
- Cache de consultas
- CDN para recursos estáticos

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.
