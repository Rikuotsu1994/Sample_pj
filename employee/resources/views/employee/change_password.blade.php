<x-app-layout>
  <x-dialog>
    <x-slot name="btnlink">
      {{ route('index') }}
    </x-slot>
  </x-dialog>

  <a href="{{ route('index') }}" class="bg-indigo-700 text-white rounded mb-5 text-xl px-1">戻る</a>
  <div class="d-flex justify-center">
    <div class="text-3xl">パスワード更新</div>
  </div>
  <div class="d-flex justify-center">
    <div class="w-full sm:max-w-4xl mt-8 px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
      <div class="[&_div]:mb-5 text-xl">
        <form action="/employee/change/password" method="post">
          @csrf

          <div>
            <label>現在のパスワード</label>
              @if ($errors->has('current_password'))
                <div class="text-sm text-red-400">{{ $errors->first('current_password') }}</div>
              @endif
              <input type="text" name="current_password"
                class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300">
          </div>

          <div>
            <label>新しいパスワード ※8文字以上必要です。</label>
              @if ($errors->has('password'))
                <div class="text-sm text-red-400">{{ $errors->first('password') }}</div>
              @endif
              <input type="text" name="password"
                class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300">
          </div>

          <div>
            <label>新しいパスワード（確認用）</label>
              @if ($errors->has('password_confirmation'))
                <div class="text-sm text-red-400">{{ $errors->first('password_confirmation') }}</div>
              @endif
              <input type="text" name="password_confirmation"
                class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300">
          </div>

          <div class="d-flex justify-center">
            <input class="mb-5 text-xl border-8 bg-blue-300" type="submit" value="パスワード更新">
          </div>

        </form>
      </div>
    </div>
  </div>
</x-app-layout>