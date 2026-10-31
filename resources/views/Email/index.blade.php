<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Enviar correo electrónico
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Redacta y envía mensajes desde el sistema.
                </p>
            </div>

            <div class="hidden sm:flex items-center gap-2 text-sm text-gray-500">
                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                Servicio de correo
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-5 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-5 p-4 bg-red-100 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-5 p-4 bg-red-100 text-red-700 rounded-lg">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-xl border border-gray-200">

                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="p-3 bg-indigo-100 rounded-lg">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H3a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="font-semibold text-gray-800">
                                Nuevo mensaje
                            </h3>
                            <p class="text-sm text-gray-500">
                                Completa los datos del destinatario.
                            </p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('emails.send') }}" method="POST">
                    @csrf

                    <div class="p-6 space-y-5">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Destinatario *
                            </label>
                            <input type="email" name="to" value="{{ old('to') }}"
                                placeholder="destinatario@correo.com" required
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    CC
                                </label>
                                <input type="email" name="cc" value="{{ old('cc') }}"
                                    placeholder="copia@correo.com"
                                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    CCO
                                </label>
                                <input type="email" name="bcc" value="{{ old('bcc') }}"
                                    placeholder="copiaoculta@correo.com"
                                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Asunto *
                            </label>
                            <input type="text" name="subject" value="{{ old('subject') }}"
                                placeholder="Asunto del correo" required
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Mensaje *
                            </label>
                            <textarea name="message" rows="10" required placeholder="Escribe aquí el contenido de tu mensaje..."
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('message') }}</textarea>

                            <p class="text-xs text-gray-400 mt-2">
                                Máximo 10,000 caracteres.
                            </p>
                        </div>

                    </div>

                    <!-- BARRA INFERIOR DE BOTONES CORREGIDA (FUERA DEL CONTENEDOR ANTERIOR) -->
                    <div
                        class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-xl flex flex-col sm:flex-row justify-end gap-3">

                        <button type="reset"
                            class="px-5 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100">
                            Limpiar
                        </button>

                        <button type="submit"
                            class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center justify-center gap-2 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" />
                            </svg>
                            Enviar correo
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
