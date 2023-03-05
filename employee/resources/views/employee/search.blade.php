<x-app-layout>
  <a href="{{ route('index') }}" class="text-xl border-4 w-20 bg-blue-300">戻る</a>
  <div class="d-flex justify-center">
    <div class="text-3xl">データ検索</div>
  </div>
  <div class="d-flex justify-center">
    <div class="w-full sm:max-w-2xl mt-4 px-4 py-3 bg-white shadow-md overflow-hidden sm:rounded-lg">
      <form action="/employee/search" method="get">
        @csrf
        <div class="[&>div]:mb-3">
          <div>
            <label>id</label>
            <input type="text" name="id" value="@if (isset( $workers )){{$id}}@endif"
              class="w-full py-2 border-b focus:outline-none focus:border-b-4 border-green-300">
          </div>
          <div>
            <label>氏名</label>
            <input type="text" name="name" value="@if (isset( $workers )){{$name}}@endif"
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
          <input class="mb-3 text-xl border-8 bg-blue-300" type="submit" value="社員検索">
        </div>
      </form>
    </div>
  </div>

  <div class="d-flex justify-center">
    <div class="text-3xl pt-4">社員一覧</div>
  </div>
  <div class="d-flex justify-center">
    <div class="text-xl w-full sm:max-w-7xl mt-8 px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
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
          <th class="w-[60px]">更新</th>
          <th class="w-[60px]">削除</th>
        </tr>
        @foreach ($workers as $worker)
          <tr class="[&>td]:border border-slate-300">
            <td>{{ $worker->id }}</td>
            <td>{{ $worker->name }}</td>
            <td>{{ $worker->sex }}</td>
            <td>{{ $worker->age }}</td>
            <td>{{ $worker->address }}</td>
            <td>{{ $worker->department }}</td>
            <td>{{ $worker->division }}</td>
            <td>{{ $worker->hire_date }}</td>
            <td><a class="bg-indigo-700 text-white px-1 rounded" href="">更新</td>
            <td><a class="bg-indigo-700 text-white px-1 rounded" href="">削除</td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
  <div class="d-flex justify-center py-3">
    {{ $workers->appends(request()->query())->links()}}
  </div>
</x-app-layout>
