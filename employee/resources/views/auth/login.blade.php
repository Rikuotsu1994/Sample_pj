<x-guest-layout>
  <x-auth-session-status class="mb-4" :status="session('status')" />
  <script>
    window.addEventListener('pageshow',()=>{
	    if(window.performance.getEntriesByType("navigation")[0].type === 'back_forward')
        location.reload();
    });
  </script>
  @if (Session::has('message'))
    <div class="fs-5 text-danger fw-bold">
      {{ session('message') }}
    </div>
  @endif

  <form method="POST" action="{{ route('login') }}">
  @csrf
    {{-- id --}}
    <div>
      <x-input-label for="workersId" :value="__('id')" />
      <x-text-input id="workersId" class="block mt-1 w-full p-3 text-xl" type="text" name="id" :value="old('id')" required autofocus/>
      <x-input-error :messages="$errors->get('id')" class="mt-2" />

    {{-- password --}}
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" class="block mt-1 w-full p-3 text-xl" type="password" name="password" required/>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
      @if (Auth::check())
        <x-primary-button class="ml-3" disabled>
          ログイン済み
        </x-primary-button>
      @else
        <x-primary-button class="ml-3">
          {{ __('Log in') }}
        </x-primary-button>
      @endif
    </div>
  </form>
</x-guest-layout>
