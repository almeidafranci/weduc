<x-app-layout>
  <x-slot name="header">
    <div class="w-full flex flex-row justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Linguagens de Programação') }}
      </h2>
    </div>


  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <a href="{{route('languages.view', '1')}}" class="w-full flex flex-col justify-between items-start p-4 md:flex-row md:items-center">
          <div class="w-full flex flex-row items-center mb-3 md:mb-0">
            <img class="h-11 w-h-11 rounded-full object-cover" src="https://ui-avatars.com/api/?name=Csharp&color=C7D2FE&background=4F46E5">
            <div class="px-3">
              <h4 class="text-indigo-500 font-bold text-lg">Csharp</h4>
              <h5 class="text-gray-500 text-sm">Linguagem de programação usada no simuador</h5>
            </div>
          </div>
          <div>
            <svg class="hidden h-4 text-gray-600 md:block" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <button class="inline-flex items-center justify-center px-4 py-2 border text-sm leading-5 font-semibold rounded-md transition ease-in-out duration-150 border-transparent text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:bg-indigo-500 focus:border-indigo-700 focus:shadow-outline active:bg-indigo-700 md:hidden">
              Ver Linguagem de Programação
            </button>
          </div>
        </a>
        <hr>
        <a href="#" class="w-full flex flex-col justify-between items-start p-4 md:flex-row md:items-center">
          <div class="mb-3 md:mb-0">
            <h4 class="text-indigo-500 font-bold text-lg">Csharp</h4>
            <h5 class="text-gray-500 text-sm">Linguagem de programação usada no simuador</h5>
          </div>
          <div>
            <svg class="hidden h-4 text-gray-600 md:block" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <button class="inline-flex items-center justify-center px-4 py-2 border text-sm leading-5 font-semibold rounded-md transition ease-in-out duration-150 border-transparent text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:bg-indigo-500 focus:border-indigo-700 focus:shadow-outline active:bg-indigo-700 md:hidden">
              Ver Linguagem de Programação
            </button>
          </div>
        </a>
        <hr>
        <a href="#" class="w-full flex flex-col justify-between items-start p-4 bg-indigo-600 md:flex-row md:items-center">
          <div class="mb-3 md:mb-0">
            <h4 class="text-white font-bold text-lg">Não achou a linguagem desejada?</h4>
            <h5 class="text-white">Crie agora a compatibilidade para a linguagem desejada</h5>
          </div>
          <div>
            <svg class="hidden h-4 text-white md:block" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <button class="inline-flex items-center justify-center px-4 py-2 border text-sm leading-5 font-semibold rounded-md transition ease-in-out duration-150 border-transparent text-white border-white hover:bg-white hover:text-indigo-600 focus:outline-none focus:bg-indigo-500 focus:border-indigo-700 focus:shadow-outline active:bg-indigo-700 md:hidden">
              Criar Linguagem de Programação
            </button>
          </div>
        </a>
      </div>
    </div>
  </div>
</x-app-layout>