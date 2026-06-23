<div x-data="{ darkMode: true }" 
     :class="darkMode ? 'bg-gray-900 text-white' : 'bg-gray-200 text-gray-900'" 
     class="p-6 min-h-screen transition-colors duration-200 flex flex-col">
    
    <div class="max-w-7xl w-full mx-auto flex flex-col flex-grow">
        
        <div class="flex justify-end items-center mb-12">
            <button @click="darkMode = !darkMode" 
                type="button"
                class="flex items-center gap-2 px-4 py-2 rounded-full font-medium shadow transition duration-150"
                :class="darkMode ? 'bg-gray-800 hover:bg-gray-700 text-yellow-400' : 'bg-white hover:bg-gray-100 text-indigo-600 border border-gray-200'">
                <span x-show="!darkMode">☀️ </span>
                <span x-show="darkMode">🌙 </span>
            </button>
        </div>

        <div class="flex-grow flex items-center justify-center -mt-12">
            <div class="max-w-md w-full rounded-xl p-8 border shadow-xl transform transition-all"
                 :class="darkMode ? 'bg-gray-800 border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900'">
                
                <h2 class="text-2xl font-bold mb-2 text-center">¡Bienvenido de nuevo!</h2>
                <p class="text-sm text-center mb-6 text-gray-400">Ingresa tus credenciales para acceder al sistema.</p>
                
                <form wire:submit="login" method="POST">
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Usuario</label>
                        <input wire:model="alias" type="text" required placeholder="alias"
                               class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-150"
                               :class="darkMode ? 'bg-gray-700 border-gray-600 text-white placeholder-gray-500' : 'bg-gray-50 border-gray-300 text-gray-900 placeholder-gray-400'">
                    </div>

                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-1">
                            <label class="block text-sm font-medium">Contraseña</label>
                            <a href="#" class="text-xs text-indigo-500 hover:underline">¿La olvidaste?</a>
                        </div>
                        <input wire:model="password" type="password" required placeholder="••••••••"
                               class="w-full h-[50px] px-4 py-2  rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-150"
                               :class="darkMode ? 'bg-gray-700 border-gray-600 text-white placeholder-gray-500' : 'bg-gray-50 border-gray-300 text-gray-900 placeholder-gray-400'">
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-lg transition duration-150 shadow-md">
                        Iniciar Sesión
                    </button>
                </form>

                <p class="text-sm text-center mt-6 text-gray-400">
                    ¿No tienes una cuenta? 
                    <a href="#" class="text-indigo-500 font-medium hover:underline">Regístrate</a>
                </p>
            </div>
        </div>

    </div>
</div>