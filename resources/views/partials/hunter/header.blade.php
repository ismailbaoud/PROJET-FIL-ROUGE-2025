  <header class="flex items-center justify-between border-b border-gray-200 px-6 py-4 ">
      <div class="w-64"></div>
      <div class="flex items-center gap-3">
          <span class="text-sm text-white">{{ Auth::user()->userName}}</span>
          <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">
            {{ strtoupper(Auth::user()->username[0] . Auth::user()->username[1]) }}
        </div>
      </div>
  </header>
