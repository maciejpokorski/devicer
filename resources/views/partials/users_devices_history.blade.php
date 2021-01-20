  <table class="w-full whitespace-pre-wrap table-auto overflow-x-auto">
      <thead>
          <tr class="bg-gray-100">
              <th class="px-4 py-2">Device</th>
              <th class="px-4 py-2">User</th>
              <th class="px-4 py-2">Millage before</th>
              <th class="px-4 py-2">Millage after</th>
              <th class="px-4 py-2">Start</th>
              <th class="px-4 py-2">End</th>
              <th class="px-4 py-2">Action</th>
          </tr>
      </thead>
      <tbody>

          @foreach($history as $h)
          <tr>
              <td class="border px-4 py-2">
                  <a href="{{ route('devices.edit', $h->device->id) }}" class="float-left underline text-blue-600 hover:text-blue-800 visited:text-purple-600">{{$h->device->name}}</a>
              </td>
              <td class="border px-4 py-2">
                  <a href="{{ route('users.edit', $h->user->id) }}" class="float-left underline text-blue-600 hover:text-blue-800 visited:text-purple-600">{{$h->user->name }}</a>
              </td>
              <td class="border px-4 py-2"> {{ $h->millage_old}} </td>
              <td class="border px-4 py-2"> {{ $h->millage_new }} </td>
              <td class="border px-4 py-2"> {{ $h->created_at }} </td>
              <td class="border px-4 py-2"> {{ $h->updated_at }} </td>
              <td class="border px-4 py-2">
                  <form action="{{ route('histories.destroy', $h->id) }}" method="POST">
                      <a href="{{route('histories.edit', $h->id)}}" class="float-left bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" title="delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  </table>