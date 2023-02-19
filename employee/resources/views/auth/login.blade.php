<x-guest-layout>
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}">
  @csrf
    {{-- id --}}
    <div>
      <x-input-label for="id" :value="__('id')" />
      <x-text-input id="id" class="block mt-1 w-full" type="number" name="id" :value="old('id')" required autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('id')" class="mt-2" />

    {{-- password --}}
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
      <x-primary-button class="ml-3">
        {{ __('Log in') }}
        </x-primary-button>
    </div>
  </form>
</x-guest-layout>
