<x-app-layout>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script>
    function resetbtn(id) {
      $('#password_reset').modal('show');
      {{-- document.getElementById('yes').innerHTML = id; --}}
      document.getElementById('yes').innerHTML = "<a class=\"btn btn-outline-dark\" href=" + id + ">OK</a>";
    };
  </script>
  <div class="modal fade modal-lg" id="password_reset" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body fs-3">
          パスワードリセットしますか？
        </div>
        <div class="modal-footer">
          <a id="yes"></a>
          <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">閉じる</button>
        </div>
      </div>
    </div>
  </div>
  <x-dialog>
    <x-slot name="btnlink">
      {{ route('search') }}
    </x-slot>
  </x-dialog>

  <a href="{{ route('index') }}" class="bg-indigo-700 text-white rounded mb-5 text-xl px-1">戻る</a>
  <div class="d-flex justify-center">
    <div class="text-3xl">社員検索</div>
  </div>
  <div class="d-flex justify-center">
    <div class="w-full sm:max-w-2xl mt-4 px-4 py-3 bg-white shadow-md overflow-hidden sm:rounded-lg">
      <form action="/employee/search" method="get">
        @csrf
        <div class="[&>div]:mb-3">
          <div>
            <label>ID</label>
            <input type="text" name="worker_id" value="@if (isset( $workers )){{$worker_id}}@endif"
              class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300">
          </div>
          <div>
            <label>氏名</label>
            <input type="text" name="worker_name" value="@if (isset( $workers )){{$worker_name}}@endif"
              class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300">
          </div>
          <div>
            <label>所属部署</label>
            <input type="text" name="department" value="@if (isset( $workers )){{$department}}@endif"
              class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300">
          </div>
          <div>
            <label>所属課</label>
            <input type="text" name="division" value="@if (isset( $workers )){{$division}}@endif"
              class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300">
          </div>
        </div>
        <div class="d-flex justify-center">
          <input class="mb-5 text-xl border-8 bg-blue-300" type="submit" value="社員検索">
        </div>
      </form>
    </div>
  </div>

  <div class="d-flex justify-center">
    <div class="text-lg w-full sm:max-w-7xl mt-8 px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
      <table class="table-fixed border-collapse border border-slate-400">
        <tr class="[&>th]:border border-slate-300">
          <th class="w-[60px]">id</th>
          <th class="w-[140px]">氏名</th>
          <th class="w-[60px]">性別</th>
          <th class="w-[60px]">年齢</th>
          <th class="w-[300px]">住所</th>
          <th class="w-[240px]">所属部署</th>
          <th class="w-[240px]">所属課</th>
          <th class="w-[140px]">入社日</th>
          <th class="w-[55px]">更新</th>
          <th class="w-[55px]">削除</th>
          @if (Auth()->user()->worker_id === 1)
            <th class="w-[120px]">パスワードリセット</th>
          @endif
        </tr>
        @if (!empty($workers))
        @foreach ($workers as $worker)
          <tr class="[&>td]:border border-slate-300">
            <td>{{ $worker->worker_id }}</td>
            <td>{{ $worker->worker_name }}</td>
            <td>{{ $worker->sex }}</td>
            <td>{{ $worker->age }}</td>
            <td>{{ $worker->address }}</td>
            <td>{{ $worker->department }}</td>
            <td>{{ $worker->division }}</td>
            <td>{{ $worker->hire_date }}</td>
            <td><a class="bg-indigo-700 text-white px-1 rounded" href="{{ route('update',[$worker->worker_id]) }}">更新</td>
            <td><a class="bg-indigo-700 text-white px-1 rounded" href="{{ route('delete',[$worker->worker_id]) }}">削除</td>
            @if (Auth()->user()->worker_id === 1)
              <td><a class="bg-indigo-700 text-base text-white px-1 rounded inline-block mx-auto text-center" onclick="resetbtn(this.id)" id="{{ route('password/reset',[$worker->worker_id]) }}">パスワード<br>リセット</td>
            @endif
          </tr>
        @endforeach
        @endif
      </table>
    </div>
  </div>
  <div class="d-flex justify-center py-3">
    {{ $workers->appends(request()->query())->links()}}
  </div>
</x-app-layout>
