<x-app-layout>
  @if (Session::has('message'))
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
      $(window).load(function() {
        $('#modal_box').modal('show');
      });
    </script>
    <div class="modal fade modal-lg" id="modal_box" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body fs-3">
            {{ session('message') }}
          </div>
          <div class="modal-footer">
            <a href="{{ route('index') }}" class="btn btn-outline-dark">OK</a>
          </div>
        </div>
      </div>
    </div>
  @endif

  <div class="text-xl">社員登録</div>
  <a href="{{ route('index') }}" class="text-xl border-4 w-20 bg-blue-300">戻る</a>
  <div class="d-flex justify-center">
    <div class="w-full sm:max-w-4xl mt-8 px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
      <form action="/employee/create" method="post">
        @csrf

        <div class="mb-5 text-xl">
          <label>氏名</label>
          @if ($errors->has('name'))
            <div class="text-sm text-red-400">{{ $errors->first('name') }}</div>
          @endif
          <input type="text" name="name" value="{{ old('name') }}"
            class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300"></label>
        </div>

        <div class="mb-5 text-xl">
          <label>パスワード ※8文字以上必要です。</label>
          @if ($errors->has('password'))
            <div class="text-sm text-red-400">{{ $errors->first('password') }}</div>
          @endif
          <input type="text" name="password" value="{{ old('password') }}"
            class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300"></label>
        </div>

        <div class="mb-5 text-xl">
          <label>性別</label>
          @if ($errors->has('sex'))
            <div class="text-sm text-red-400">{{ $errors->first('sex') }}</div>
          @endif
          <input type="text" name="sex" value="{{ old('sex') }}"
            class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300"></label>
        </div>

        <div class="mb-5 text-xl">
          <label>年齢</label>
          @if ($errors->has('age'))
            <div class="text-sm text-red-400">{{ $errors->first('age') }}</div>
          @endif
          <input type="text" name="age" value="{{ old('age') }}"
            class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300"></label>
        </div>

        <div class="mb-5 text-xl">
          <label>住所</label>
          @if ($errors->has('address'))
            <div class="text-sm text-red-400">{{ $errors->first('address') }}</div>
          @endif
          <input type="text" name="address" value="{{ old('address') }}"
            class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300"></label>
        </div>

        <div class="mb-5 text-xl">
          <label>所属部署</label>
          @if ($errors->has('department'))
            <div class="text-sm text-red-400">{{ $errors->first('department') }}</div>
          @endif
          <input type="text" name="department" value="{{ old('department') }}"
            class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300"></label>
        </div>

        <div class="mb-5 text-xl">
          <label>所属課</label>
          @if ($errors->has('division'))
            <div class="text-sm text-red-400">{{ $errors->first('division') }}</div>
          @endif
          <input type="text" name="division" value="{{ old('division') }}"
            class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300"></label>
        </div>

        <div class="mb-5 text-xl">
          <label>入社日</label>
          @if ($errors->has('hire_date'))
            <div class="text-sm text-red-400">{{ $errors->first('hire_date') }}</div>
          @endif
          <input type="date" name="hire_date" value="{{ old('hire_date') }}"
            class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300"></label>
        </div>

        <div class="d-flex justify-center">
          <input class="mb-5 text-xl border-8 bg-blue-300" type="submit" value="社員登録">
        </div>

      </form>
    </div>
  </div>
</x-app-layout>
