<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Linguagem de Programação') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex flex-row items-center">
          <img class="h-11 w-h-11 rounded-full object-cover" src="https://ui-avatars.com/api/?name=Csharp&color=C7D2FE&background=4F46E5">
          <div class="px-3">
            <h3 class="leading-6 text-indigo-500 font-bold text-lg">
              Csharp
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
              Linguagem de programação usada no simuador
            </p>
          </div>
        </div>
        <div class="border-t border-gray-200">
          <dl>

            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Nome
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                Csharp
              </dd>
            </div>

            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Descrição
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                Linguagem de programação usada no simuador
              </dd>
            </div>

            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Main Function
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="w-full h-10" id="MONACO_MAINCODE"></div>
              </dd>
            </div>

            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Other Function
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="w-full h-10" id="MONACO_FUNCTIONCODE"></div>
              </dd>
            </div>

            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Separador de Instrução
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <code>;\r\n</code>
              </dd>
            </div>

            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Funções da Linguagem
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">

                  <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm cursor-pointer hover:bg-gray-100">
                    <div class="w-0 flex-1 flex items-center">
                      <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                      </svg>
                      <span class="ml-2 flex-1 w-0 truncate font-medium">
                        escrever
                      </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                      <a href="#">
                        <svg class="h-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                      </a>
                    </div>
                  </li>
                  <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm cursor-pointer hover:bg-gray-100">
                    <div class="w-0 flex-1 flex items-center">
                      <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                      </svg>
                      <span class="ml-2 flex-1 w-0 truncate font-medium">
                        esperar
                      </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                      <a href="#">
                        <svg class="h-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                      </a>
                    </div>
                  </li>

                </ul>
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </div>
  <script>
    var require = {
      paths: {
        vs: "https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.26.1/min/vs",
      },
    };
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.26.1/min/vs/loader.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.26.1/min/vs/editor/editor.main.nls.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.26.1/min/vs/editor/editor.main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.27.0/min/vs/language/json/jsonMode.min.js" integrity="sha512-aQrzmemT0LpBxaZ5ThtMfQ8XqtCeys7Nl7Iy6zfVGdtgdliA375gCzrirVyPpwfUaMxNtPV7/plfFzAz3mXOGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="https://unpkg.com/monaco-themes/dist/monaco-themes.js"></script>

  <script>
    monaco.editor.create(document.getElementById("MONACO_MAINCODE"), {
      value: `void Main(){ comandos }`,
      lineNumbers: "on",
      readOnly: false,
      theme: "vs-dark",
      language: "csharp",
    });
    monaco.editor.create(document.getElementById("MONACO_FUNCTIONCODE"), {
      value: `void funcao() { comandos }`,
      lineNumbers: "on",
      readOnly: false,
      theme: "vs-dark",
      language: "csharp",
    });
  </script>

</x-app-layout>